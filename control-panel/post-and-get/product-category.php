<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

if (isset($_POST['create'])) {

    $PRODUCT_CATEGORY = new ProductCategory(NULL);
    $VALID = new Validator();

    $PRODUCT_CATEGORY->name = $_POST['name'];

    $PRODUCT_CATEGORY->create();
    $result = ["id" => $PRODUCT_CATEGORY->id];
    echo json_encode($result);
    exit();
}

if (isset($_POST['update'])) {

    $PRODUCT_CATEGORY = new ProductCategory($_POST['id']);

    $PRODUCT_CATEGORY->name = $_POST['name'];
    $PRODUCT_CATEGORY->update();

    $result = ["id" => $_POST['id']];
    echo json_encode($result);
    exit();
}

if (isset($_POST['arrange'])) {

    foreach ($_POST['sort'] as $key => $img) {
        $key = $key + 1;
        $PRODUCT_CATEGORY = ProductCategory::arrange($key, $img);
    }
    $result = ["status" => 'success'];
    echo json_encode($result);
    exit();
}
