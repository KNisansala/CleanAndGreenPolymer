<?php

/**

 * Description of ListingPhoto

 *

 * @author W j K n``

 */
class ListingPhoto
{

    public $id;
    public $listing;
    public $image_name;
    public $caption;
    public $sort;

    public function __construct($id)
    {

        if ($id) {
            $query = "SELECT * FROM `listing_photo` WHERE `id`=" . $id;
            $db = new Database();
            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->listing = $result['listing'];
            $this->image_name = $result['image_name'];
            $this->caption = $result['caption'];
            $this->sort = $result['sort'];
            return $this;
        }
    }

    public function create()
    {

        $query = "INSERT INTO `listing_photo` (`listing`,`image_name`,`caption`,`sort`) VALUES  ('"
            . $this->listing . "','"
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

        $query = "SELECT * FROM `listing_photo` ORDER BY sort ASC";

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

        $query = "UPDATE  `listing_photo` SET "
            . "`listing` ='" . $this->listing . "', "
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
        unlink(Helper::getSitePath() . "upload/listing/gallery/" . $this->image_name);
        unlink(Helper::getSitePath() . "upload/listing/gallery/thumb/" . $this->image_name);
        $query = 'DELETE FROM `listing_photo` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function getListingPhotosByListing($listing)
    {

        $query = "SELECT * FROM `listing_photo` WHERE `listing`= $listing ORDER BY sort ASC";

        $db = new Database();
        $result = $db->readQuery($query);

        $array_res = array();

        while ($row = mysql_fetch_array($result)) {

            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function arrange($key, $img)
    {

        $query = "UPDATE `listing_photo` SET `sort` = '" . $key . "'  WHERE id = '" . $img . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        return $result;
    }
}
