<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

if (isset($_POST['create'])) {

    $BLOG_CATEGORY = new BlogCategory(NULL);
    $VALID = new Validator();

    $BLOG_CATEGORY->name = $_POST['name'];

    $BLOG_CATEGORY->create();
    $result = ["id" => $BLOG_CATEGORY->id];
    echo json_encode($result);
    exit();
}

if (isset($_POST['update'])) {

    $BLOG_CATEGORY = new BlogCategory($_POST['id']);

    $BLOG_CATEGORY->name = $_POST['name'];
    $BLOG_CATEGORY->update();

    $result = ["id" => $_POST['id']];
    echo json_encode($result);
    exit();
}

if (isset($_POST['arrange'])) {

    foreach ($_POST['sort'] as $key => $img) {
        $key = $key + 1;
        $BLOG_CATEGORY = BlogCategory::arrange($key, $img);
    }
    $result = ["status" => 'success'];
    echo json_encode($result);
    exit();
}
