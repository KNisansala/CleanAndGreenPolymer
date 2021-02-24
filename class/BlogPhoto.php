<?php

/**

 * Description of BlogPhoto

 *

 * @author W j K n``

 */
class BlogPhoto
{

    public $id;
    public $post;
    public $image_name;
    public $caption;
    public $sort;

    public function __construct($id)
    {

        if ($id) {
            $query = "SELECT * FROM `blog_post_photo` WHERE `id`=" . $id;
            $db = new Database();
            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->post = $result['post'];
            $this->image_name = $result['image_name'];
            $this->caption = $result['caption'];
            $this->sort = $result['sort'];
            return $this;
        }
    }

    public function create()
    {

        $query = "INSERT INTO `blog_post_photo` (`post`,`image_name`,`caption`,`sort`) VALUES  ('"
            . $this->post . "','"
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

        $query = "SELECT * FROM `blog_post_photo` ORDER BY sort ASC";

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

        $query = "UPDATE  `blog_post_photo` SET "
            . "`post` ='" . $this->post . "', "
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
        unlink(Helper::getSitePath() . "upload/blog-post/gallery/" . $this->image_name);
        unlink(Helper::getSitePath() . "upload/blog-post/gallery/thumb/" . $this->image_name);
        $query = 'DELETE FROM `blog_post_photo` WHERE id="' . $this->id . '"';
        
        $db = new Database();

        return $db->readQuery($query);
    }

    public function getBlogPhotosByBlog($post)
    {

        $query = "SELECT * FROM `blog_post_photo` WHERE `post`= $post ORDER BY sort ASC";
       
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

        $query = "UPDATE `blog_post_photo` SET `sort` = '" . $key . "'  WHERE id = '" . $img . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        return $result;
    }
}
