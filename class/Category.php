<?php
/**
 * Description of Category
 *
 * @author Suharshana DsW
 */
class Category {

    public $id;
    public $name;
    public $short_description;
    public $image_name;
    public $queue;
    

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`name`,`short_description`,`image_name`,`queue` FROM `category` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->name = $result['name'];
            $this->short_description = $result['short_description'];
            $this->image_name = $result['image_name'];
            $this->queue = $result['queue'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `category` (`name`,`short_description`,`image_name`) VALUES ('$this->name','$this->short_description', '$this->image_name')";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            $last_id = mysql_insert_id();

            return $this->__construct($last_id);
        } else {
            return FALSE;
        }
    }

    public function all() {

        $query = "SELECT * FROM `category` ORDER BY queue ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function getCategoryWithoutThisID($id) {
        $query = "SELECT * FROM `category` WHERE `id` <> $id ORDER BY queue ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }
    
    public function update() {

        $query = "UPDATE  `category` SET "
                . "`name` ='" . $this->name . "', "
                . "`short_description` ='" . $this->short_description . "', "
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
    
    public function delete() {
        $query = 'DELETE FROM `category` WHERE id="' . $this->id . '"';
        unlink(Helper::getSitePath() . "upload/category/" . $this->image_name);
        $db = new Database();
        return $db->readQuery($query);
    }

    public function arrange($key, $id) {
        $query = "UPDATE `category` SET `queue` = '" . $key . "'  WHERE id = '" . $id . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }

}
