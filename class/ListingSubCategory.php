<?php

/**
 * Description of ListingSubCategory
 *
 * @author W j K n``
 */
class ListingSubCategory
{

    public $id;
    public $category;
    public $name;
    public $sort;

    public function __construct($id)
    {
        if ($id) {

            $query = "SELECT * FROM `listing_sub_category` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->category = $result['category'];
            $this->name = $result['name'];
            $this->sort = $result['sort'];

            return $this;
        }
    }

    public function create()
    {

        $query = "INSERT INTO `listing_sub_category` (`category`,`name`,`sort`) VALUES  ('"
            . $this->category . "', '"
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
        $query = "SELECT * FROM `listing_sub_category` ORDER BY sort ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }

    public function getSubCategoriesByCategory($id)
    {
        $query = "SELECT * FROM `listing_sub_category` WHERE `category` = $id ORDER BY sort ASC";
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

        $query = "UPDATE  `listing_sub_category` SET "
            . "`category` ='" . $this->category . "', "
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
        $this->deleteListings();
        $query = 'DELETE FROM `listing_sub_category` WHERE id="' . $this->id . '"';
        $db = new Database();
        return $db->readQuery($query);
    }

    public function deleteListings()
    {

        $listings = Listing::getListingsBySubCategory($this->id);

        foreach ($listings as $listing) {
            $LISTING = new Listing($listing["id"]);
            $LISTING->delete();
        }
    }
    public function arrange($key, $img)
    {

        $query = "UPDATE `listing_sub_category` SET `sort` = '" . $key . "'  WHERE id = '" . $img . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }
}
