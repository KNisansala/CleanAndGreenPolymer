<?php

/**
 * Description of Banner
 *
 * @author W j K n``
 */
class Banner
{

    public $id;
    public $title;
    public $description;
    public $url;
    public $image_name;
    public $sort;

    public function __construct($id)
    {
        if ($id) {

            $query = "SELECT `id`,`title`,`description`,`url`,`image_name`,`sort` FROM `banner` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->title = $result['title'];
            $this->description = $result['description'];
            $this->url = $result['url'];
            $this->image_name = $result['image_name'];
            $this->sort = $result['sort'];


            return $this;
        }
    }

    public function create()
    {

        $query = "INSERT INTO `banner` (`title`,`description`,`url`,`image_name`) VALUES  ('"
            . $this->title . "','"
            . $this->description . "','"
            . $this->url . "','"
            . $this->image_name . "')";


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

        $query = "SELECT * FROM `banner` ORDER BY `sort` ASC";
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

        $query = "UPDATE  `banner` SET "
            . "`title` ='" . $this->title . "', "
            . "`description` ='" . $this->description . "', "
            . "`url` ='" . $this->url . "', "
            . "`image_name` ='" . $this->image_name . "' "
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

        $query = 'DELETE FROM `banner` WHERE id="' . $this->id . '"';

        unlink(Helper::getSitePath() . "upload/banner/" . $this->image_name);

        $db = new Database();

        return $db->readQuery($query);
    }
    public function arrange($key, $img)
    {

        $query = "UPDATE `banner` SET `sort` = '" . $key . "'  WHERE id = '" . $img . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }
}
