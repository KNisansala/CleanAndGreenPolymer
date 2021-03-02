<?php
/**
 * Description of ProductCategory
 *
 * @author W j K n``
 */
class ProductCategory
{

    public $id;
    public $name;
    public $imageName;
    public $sort;

    public function __construct($id)
    {
        if ($id) {

            $query = "SELECT * FROM `product_category` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->name = $result['name'];
            $this->imageName = $result['image_name'];
            $this->sort = $result['sort'];

            return $this;
        }
    }

    public function create()
    {

        $query = "INSERT INTO `product_category` (`name`,`image_name`,`sort`) VALUES  ('"
            . $this->name . "', '"
            . $this->imageName . "', '"
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

        $query = "SELECT * FROM `product_category` ORDER BY sort ASC";
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

        $query = "UPDATE  `product_category` SET "
            . "`name` ='" . $this->name . "', "
            . "`image_name` ='" . $this->imageName . "' "
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
        $this->deleteProducts();
        unlink(Helper::getSitePath() . "upload/product-category/" . $this->imageName);
        $query = 'DELETE FROM `product_category` WHERE id="' . $this->id . '"';
        $db = new Database();
        return $db->readQuery($query);
    }

    public function deleteProducts()
    {
        $products = Product::getProductsByCategory($this->id);

        foreach ($products as $product) {
            $PRODUCT = new Product($product["id"]);
            $PRODUCT->id = $product["id"];
            $PRODUCT->delete();
        }
    }

    public function arrange($key, $img)
    {

        $query = "UPDATE `product_category` SET `sort` = '" . $key . "'  WHERE id = '" . $img . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }
}
