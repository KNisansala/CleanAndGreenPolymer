<?php

/**

 * Description of ServicePhoto

 *

 * @author W j K n``

 */
class ServicePhoto
{

    public $id;
    public $service;
    public $image_name;
    public $caption;
    public $sort;

    public function __construct($id)
    {

        if ($id) {
            $query = "SELECT * FROM `service_photo` WHERE `id`=" . $id;
            $db = new Database();
            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->service = $result['service'];
            $this->image_name = $result['image_name'];
            $this->caption = $result['caption'];
            $this->sort = $result['sort'];
            return $this;
        }
    }

    public function create()
    {

        $query = "INSERT INTO `service_photo` (`service`,`image_name`,`caption`,`sort`) VALUES  ('"
            . $this->service . "','"
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

        $query = "SELECT * FROM `service_photo` ORDER BY sort ASC";

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

        $query = "UPDATE  `service_photo` SET "
            . "`service` ='" . $this->service . "', "
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
        unlink(Helper::getSitePath() . "upload/service/gallery/" . $this->image_name);
        unlink(Helper::getSitePath() . "upload/service/gallery/thumb/" . $this->image_name);
        $query = 'DELETE FROM `service_photo` WHERE id="' . $this->id . '"';
        
        $db = new Database();

        return $db->readQuery($query);
    }

    public function getServicePhotosByService($service)
    {

        $query = "SELECT * FROM `service_photo` WHERE `service`= $service ORDER BY sort ASC";
       
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

        $query = "UPDATE `service_photo` SET `sort` = '" . $key . "'  WHERE id = '" . $img . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        return $result;
    }
}
