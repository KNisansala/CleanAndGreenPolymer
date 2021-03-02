<?php

/**

 * Description of Gallery

 *

 * @author W j K n``

 */
class Gallery
{

    public $id;
    public $image_name;
    public $caption;
    public $sort;

    public function __construct($id)
    {

        if ($id) {
            $query = "SELECT * FROM `gallery` WHERE `id`=" . $id;
            $db = new Database();
            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->image_name = $result['image_name'];
            $this->caption = $result['caption'];
            $this->sort = $result['sort'];
            return $this;
        }
    }

    public function create()
    {

        $query = "INSERT INTO `gallery` (`image_name`,`caption`,`sort`) VALUES  ('"
            . $this->image_name . "', '"
            . $this->caption . "', '"
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

        $query = "SELECT * FROM `gallery` ORDER BY sort ASC";

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

        $query = "UPDATE  `gallery` SET "
            . "`image_name` ='" . $this->image_name . "', "
            . "`caption` ='" . $this->caption . "', "
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
        unlink(Helper::getSitePath() . "upload/gallery/" . $this->image_name);
        unlink(Helper::getSitePath() . "upload/gallery/thumb/" . $this->image_name);
        $query = 'DELETE FROM `gallery` WHERE id="' . $this->id . '"';
        
        $db = new Database();

        return $db->readQuery($query);
    }

    public function arrange($key, $img)
    {

        $query = "UPDATE `gallery` SET `sort` = '" . $key . "'  WHERE id = '" . $img . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        return $result;
    }
}
