<?php

/**
 * Description of InstructorCategory
 *
 * @author W j K n``
 */
class InstructorCategory
{

    public $id;
    public $name;
    public $sort;

    public function __construct($id)
    {
        if ($id) {

            $query = "SELECT * FROM `instructor_category` WHERE `id`=" . $id;

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

        $query = "INSERT INTO `instructor_category` (`name`,`sort`) VALUES  ('"
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
        $query = "SELECT * FROM `instructor_category` ORDER BY sort ASC";
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

        $query = "UPDATE  `instructor_category` SET "
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
        $this->deleteInstructors();
        $query = 'DELETE FROM `instructor_category` WHERE id="' . $this->id . '"';
        $db = new Database();
        return $db->readQuery($query);
    }

    public function deleteInstructors()
    {

        $instructors = Instructor::getInstructorsByCategory($this->id);

        foreach ($instructors as $instructor) {
            $INSTRUCTOR = new Instructor($instructor["id"]);
            $INSTRUCTOR->delete();
        }
    }
    public function arrange($key, $img)
    {

        $query = "UPDATE `instructor_category` SET `sort` = '" . $key . "'  WHERE id = '" . $img . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }
}
