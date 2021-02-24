<?php

/**
 * Description of PartnerCategory
 *
 * @author W j K n``
 */
class PartnerCategory
{

    public $id;
    public $name;
    public $sort;

    public function __construct($id)
    {
        if ($id) {

            $query = "SELECT * FROM `partner_category` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->name = $result['name'];
            $this->sort = $result['sort'];

            return $this;
        }
    }

    public function create()
    {

        $query = "INSERT INTO `partner_category` (`name`,`sort`) VALUES  ('"
            . $this->name . "', '"
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
        $query = "SELECT * FROM `partner_category` ORDER BY sort ASC";
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

        $query = "UPDATE  `partner_category` SET "
            . "`name` ='" . $this->name . "' "
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
        $this->deletePartners();
        $query = 'DELETE FROM `partner_category` WHERE id="' . $this->id . '"';
        $db = new Database();
        return $db->readQuery($query);
    }

    public function deletePartners()
    {

        $partners = Partner::getPartnersByCategory($this->id);

        foreach ($partners as $partner) {
            $INSTRUCTOR = new Partner($partner["id"]);
            $INSTRUCTOR->delete();
        }
    }
    public function arrange($key, $img)
    {

        $query = "UPDATE `partner_category` SET `sort` = '" . $key . "'  WHERE id = '" . $img . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }
}
