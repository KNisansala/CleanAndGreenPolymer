<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

if (isset($_POST['create'])) {

    $PARTNER_CATEGORY = new PartnerCategory(NULL);
    $VALID = new Validator();

    $PARTNER_CATEGORY->name = $_POST['name'];

    $PARTNER_CATEGORY->create();
    $result = ["id" => $PARTNER_CATEGORY->id];
    echo json_encode($result);
    exit();
}

if (isset($_POST['update'])) {

    $PARTNER_CATEGORY = new PartnerCategory($_POST['id']);

    $PARTNER_CATEGORY->name = $_POST['name'];
    $PARTNER_CATEGORY->update();

    $result = ["id" => $_POST['id']];
    echo json_encode($result);
    exit();
}

if (isset($_POST['arrange'])) {

    foreach ($_POST['sort'] as $key => $img) {
        $key = $key + 1;
        $category = PartnerCategory::arrange($key, $img);
    }
    $result = ["status" => 'success'];
    echo json_encode($result);
    exit();
}
