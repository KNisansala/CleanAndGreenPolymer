<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

if (isset($_POST['create'])) {

    $EVENT_CATEGORY = new EventCategory(NULL);
    $VALID = new Validator();

    $EVENT_CATEGORY->name = $_POST['name'];

    $EVENT_CATEGORY->create();
    $result = ["id" => $EVENT_CATEGORY->id];
    echo json_encode($result);
    exit();
}

if (isset($_POST['update'])) {

    $EVENT_CATEGORY = new EventCategory($_POST['id']);

    $EVENT_CATEGORY->name = $_POST['name'];
    $EVENT_CATEGORY->update();

    $result = ["id" => $_POST['id']];
    echo json_encode($result);
    exit();
}

if (isset($_POST['arrange'])) {

    foreach ($_POST['sort'] as $key => $img) {
        $key = $key + 1;
        $EVENT_CATEGORY = EventCategory::arrange($key, $img);
    }
    $result = ["status" => 'success'];
    echo json_encode($result);
    exit();
}
