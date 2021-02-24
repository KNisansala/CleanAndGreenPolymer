<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

if (isset($_POST['create'])) {

    $LISTING_SUB_CATEGORY = new ListingSubCategory(NULL);
    $VALID = new Validator();

    $LISTING_SUB_CATEGORY->category = $_POST['category'];
    $LISTING_SUB_CATEGORY->name = $_POST['name'];

    $LISTING_SUB_CATEGORY->create();
    $result = ["id" => $LISTING_SUB_CATEGORY->id];
    echo json_encode($result);
    exit();
}

if (isset($_POST['update'])) {

    $LISTING_SUB_CATEGORY = new ListingSubCategory($_POST['id']);

    $LISTING_SUB_CATEGORY->category = $_POST['category'];
    $LISTING_SUB_CATEGORY->name = $_POST['name'];
    $LISTING_SUB_CATEGORY->update();

    $result = ["id" => $_POST['id']];
    echo json_encode($result);
    exit();
}

if (isset($_POST['arrange'])) {

    foreach ($_POST['sort'] as $key => $img) {
        $key = $key + 1;
        $LISTING_SUB_CATEGORY = ListingSubCategory::arrange($key, $img);
    }
    $result = ["status" => 'success'];
    echo json_encode($result);
    exit();
}
