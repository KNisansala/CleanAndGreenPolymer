<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

if (isset($_POST['create'])) {

    $INSTRUCTOR_CATEGORY = new InstructorCategory(NULL);
    $VALID = new Validator();

    $INSTRUCTOR_CATEGORY->name = $_POST['name'];

    $INSTRUCTOR_CATEGORY->create();
    $result = ["id" => $INSTRUCTOR_CATEGORY->id];
    echo json_encode($result);
    exit();
}

if (isset($_POST['update'])) {

    $INSTRUCTOR_CATEGORY = new InstructorCategory($_POST['id']);

    $INSTRUCTOR_CATEGORY->name = $_POST['name'];
    $INSTRUCTOR_CATEGORY->update();

    $result = ["id" => $_POST['id']];
    echo json_encode($result);
    exit();
}

if (isset($_POST['arrange'])) {

    foreach ($_POST['sort'] as $key => $img) {
        $key = $key + 1;
        $category = InstructorCategory::arrange($key, $img);
    }
    $result = ["status" => 'success'];
    echo json_encode($result);
    exit();
}
