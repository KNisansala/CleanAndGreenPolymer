<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

if (isset($_POST['create'])) {

    $LISTING_CATEGORY = new ListingCategory(NULL);
    $VALID = new Validator();

    $LISTING_CATEGORY->name = $_POST['name'];

    $LISTING_CATEGORY->create();
    $result = ["id" => $LISTING_CATEGORY->id];
    echo json_encode($result);
    exit();
}

if (isset($_POST['update'])) {

    $LISTING_CATEGORY = new ListingCategory($_POST['id']);

    $LISTING_CATEGORY->name = $_POST['name'];
    $LISTING_CATEGORY->update();

    $result = ["id" => $_POST['id']];
    echo json_encode($result);
    exit();
}

if (isset($_POST['arrange'])) {

    foreach ($_POST['sort'] as $key => $img) {
        $key = $key + 1;
        $category = ListingCategory::arrange($key, $img);
    }
    $result = ["status" => 'success'];
    echo json_encode($result);
    exit();
}
