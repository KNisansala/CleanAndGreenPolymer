<?php
/**
 * Description of SubCategory
 *
 * @author Suharshana DsW
 */
class SubCategory {

    public $id;
    public $name;
    public $category;
    public $queue;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`name`,`category`,`queue` FROM `sub_category` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->name = $result['name'];
            $this->category = $result['category'];
            $this->queue = $result['queue'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `sub_category` (`name`,`category`,`queue`) VALUES  ('"
                . $this->name . "','"
                . $this->category . "','"
                . $this->queue . "')"
                ;
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

        $query = "SELECT * FROM `sub_category` ORDER BY queue ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function getSubCategoryWithoutThisID($id) {
        $query = "SELECT * FROM `sub_category` WHERE `id` <> $id ORDER BY queue ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }
    
    public function update() {

        $query = "UPDATE  `sub_category` SET "
                . "`name` ='" . $this->name . "', "
                . "`category` ='" . $this->category . "', "
                . "`queue` ='" . $this->queue . "' "
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
        $query = 'DELETE FROM `sub_category` WHERE id="' . $this->id . '"';
        $db = new Database();
        return $db->readQuery($query);
       
    }

    public function arrange($key, $id) {
        $query = "UPDATE `sub_category` SET `queue` = '" . $key . "'  WHERE id = '" . $id . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }

    public function getSubCategoriesByCategory($category) {

        $query = "SELECT * FROM `sub_category` WHERE `category` = $category ORDER BY queue ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

}
