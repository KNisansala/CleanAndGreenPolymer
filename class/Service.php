<?php
/**
 * Description of Service
 *
 * @author W j K n``
 */
class Service
{

    public $id;
    public $title;
    public $image_name;
    public $description;
    public $sort;

    public function __construct($id)
    {
        if ($id) {

            $query = "SELECT * FROM `service` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->title = $result['title'];
            $this->image_name = $result['image_name'];
            $this->description = $result['description'];
            $this->sort = $result['sort'];

            return $this;
        }
    }

    public function create()
    {
        date_default_timezone_set('Asia/Colombo');
        $createdAt = date('Y-m-d H:i:s');
        $query = "INSERT INTO `service` (`title`,`image_name`,`description`,`sort`) VALUES  ('"
            . $this->title . "', '"
            . $this->image_name . "', '"
            . $this->description . "', '"
            . $this->sort . "')";


        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            $last_id = mysql_insert_id();

            return $this->__construct($last_id);
        } else {
            return FALSE;
        }
    }

    public function all()
    {

        $query = "SELECT * FROM `service` ORDER BY `id` ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function getAllWithLimit($pageLimit, $setLimit)
    {

        $query = "SELECT * FROM `service` ORDER BY sort ASC LIMIT " . $pageLimit . " , " . $setLimit . "";

        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update()
    {

        $query = "UPDATE  `service` SET "
            . "`title` ='" . $this->title . "', "
            . "`image_name` ='" . $this->image_name . "', "
            . "`description` ='" . $this->description . "', "
            . "`sort` ='" . $this->sort . "' "
            . "WHERE `id` = '" . $this->id . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return $this->__construct($this->id);
        } else {
            return FALSE;
        }
    }

    public function delete()
    {
        
        $this->deletePhotos();

        unlink(Helper::getSitePath() . "upload/service/" . $this->image_name);

        $query = 'DELETE FROM `service` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function deletePhotos()
    {
        $allPhotos = ServicePhoto::getServicePhotosByService($this->id);

        foreach ($allPhotos as $photo) {
            $PHOTO = new ServicePhoto($photo["id"]);
            $PHOTO->id = $photo["id"];
            $PHOTO->delete();
        }
    }

    public function arrange($key, $img)
    {

        $query = "UPDATE `service` SET `sort` = '" . $key . "'  WHERE id = '" . $img . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }

    public function search($category, $keyword, $pageLimit, $setLimit)
    {

        $w = array();
        $where = '';


        if (!empty($category)) {
            $w[] = "`category` = '" . $category . "' ";
        }
        if (!empty($keyword)) {
            $w[] = "`title` LIKE '%" . $keyword . "%' ";
        }

        if (count($w)) {
            $where = "WHERE " . implode(' AND ', $w);
        }

        $query = "SELECT * FROM `service` $where ORDER BY `sort` ASC LIMIT " . $pageLimit . " , " . $setLimit . "";


        $db = new Database();

        $result = $db->readQuery($query);

        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }

    public function showPagination($category, $keyword, $per_page, $page)
    {
        $w = array();
        $where = '';

        if (!empty($category)) {
            $w[] = "`category` = '" . $category . "' ";
        }
        if (!empty($keyword)) {
            $w[] = "`title` LIKE '%" . $keyword . "%' ";
        }

        if (count($w)) {
            $where = "WHERE " . implode(' AND ', $w);
        }

        $page_url = "?";
        $query = "SELECT COUNT(*) as totalCount FROM `service`  $where  ORDER BY `sort` asc";
        $rec = mysql_fetch_array(mysql_query($query));

        $total = $rec['totalCount'];

        $adjacents = "2";

        $page = ($page == 0 ? 1 : $page);
        $start = ($page - 1) * $per_page;

        $prev = $page - 1;
        $next = $page + 1;

        $setLastpage = ceil($total / $per_page);

        $lpm1 = $setLastpage - 1;
        $setPaginate = "";
        if ($setLastpage > 1) {
            $setPaginate .= "<ul class='pagination justify-content-center mb-0 mt-4'>";
            // $setPaginate .= "<li class='setPage'>Page $page of $setLastpage</li>";
            if ($page > 1) {
                $setPaginate .= "<li class='page-item'><a href='{$page_url}page=$prev&id=$category&keyword=$keyword' class='page-link'>Previous</a></li>";
            } else {
                $setPaginate .= "<li class='page-item disabled'><a class='page-link'>Previous</a></li>";
            }
            if ($setLastpage < 7 + ($adjacents * 2)) {

                for ($counter = 1; $counter <= $setLastpage; $counter++) {

                    if ($counter == $page)
                        $setPaginate .= "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                    else
                        $setPaginate .= "<li class='page-item'><a href='{$page_url}page=$counter&id=$category&keyword=$keyword' class='page-link'>$counter</a></li>";
                }
            } elseif ($setLastpage > 5 + ($adjacents * 2)) {
                if ($page < 1 + ($adjacents * 2)) {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                        if ($counter == $page)
                            $setPaginate .= "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                        else
                            $setPaginate .= "<li class='page-item'><a href='{$page_url}page=$counter&id=$category&keyword=$keyword' class='page-link'>$counter</a></li>";
                    }
                    $setPaginate .= "<li class='page-item dot'><a class='page-link'>...</a></li>";
                    $setPaginate .= "<l class='page-item'i><a href='{$page_url}page=$lpm1&id=$category&keyword=$keyword class='page-link'$lpm1</a></l>";
                    $setPaginate .= "<li class='page-item'><a href='{$page_url}page=$setLastpage&id=$category&keyword=$keyword' class='page-link'>$setLastpage</a></li>";
                } elseif ($setLastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                    $setPaginate .= "<li class='page-item'><a href='{$page_url}page=1&id=$category&keyword=$keyword' class='page-link'>1</a></li>";
                    $setPaginate .= "<li class='page-item'><a href='{$page_url}page=2&id=$category&keyword=$keyword' class='page-link'>2</a></li>";
                    $setPaginate .= "<li class='dot'>...</li>";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                        if ($counter == $page)
                            $setPaginate .= "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                        else
                            $setPaginate .= "<li class='page-item'><a href='{$page_url}page=$counter&id=$category&keyword=$keyword' class='page-link'>$counter</a></li>";
                    }
                    $setPaginate .= "<li class='page-item dot'><a class='page-link'>...</a></li>";
                    $setPaginate .= "<li class='page-item'><a href='{$page_url}page=$lpm1&id=$category&keyword=$keyword' class='page-link'>$lpm1</a></li>";
                    $setPaginate .= "<li class='page-item'><a href='{$page_url}page=$setLastpage&id=$category&keyword=$keyword' class='page-link'>$setLastpage</a></li>";
                } else {
                    $setPaginate .= "<li class='page-item'><a href='{$page_url}page=1&id=$category&keyword=$keyword' class='page-link'>1</a></li>";
                    $setPaginate .= "<li class='page-item'><a href='{$page_url}page=2&id=$category&keyword=$keyword' class='page-link'>2</a></li>";
                    $setPaginate .= "<li class='dot'>..</li>";
                    for ($counter = $setLastpage - (2 + ($adjacents * 2)); $counter <= $setLastpage; $counter++) {
                        if ($counter == $page)
                            $setPaginate .= "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                        else
                            $setPaginate .= "<li class='page-item'><a href='{$page_url}page=$counter&id=$category&keyword=$keyword' class='page-link'>$counter</a></li>";
                    }
                }
            }

            if ($page < $counter - 1) {
                $setPaginate .= "<li class='page-item'><a href='{$page_url}page=$next&id=$category&keyword=$keyword' class='page-link'>Next</a></li>";
            } else {
                $setPaginate .= "<li class='page-item disabled'><a class='page-link current_page'>Next</a></li>";
            }

            $setPaginate .= "</ul>\n";
        }

        echo $setPaginate;
    }
}
