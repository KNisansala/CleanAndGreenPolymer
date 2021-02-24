<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

if (isset($_POST['create'])) {

    $BANNER = new Banner(NULL);
    $VALID = new Validator();

    $BANNER->title = $_POST['title'];
    $BANNER->description = $_POST['description'];
    $BANNER->url = $_POST['url'];

    $dir_dest = '../../upload/banner/';

    $handle = new Upload($_FILES['image']);

    $imgName = null;

    if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_ext = 'jpg';
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = Helper::randamId();
        $handle->image_x = 750;
        $handle->image_y = 360;

        $handle->Process($dir_dest);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgName = $handle->file_dst_name;
        }
    }

    $BANNER->image_name = $imgName;

    if ($BANNER->create()) {
        $result = ["status" => 'success'];
    } else {
        $result = ["status" => 'error'];
    }

    echo json_encode($result);
    exit();
}

if (isset($_POST['update'])) {
    $dir_dest = '../../upload/banner/';

    $handle = new Upload($_FILES['image']);

    $imgName = null;

    if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_body = TRUE;
        $handle->file_overwrite = TRUE;
        $handle->file_new_name_ext = FALSE;
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = $_POST ["oldImageName"];
        $handle->image_x = 750;
        $handle->image_y = 360;

        $handle->Process($dir_dest);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgName = $handle->file_dst_name;
        }
    }

    $BANNER = new Banner($_POST['id']);

    $BANNER->image_name = $_POST['oldImageName'];
    $BANNER->title = $_POST['title'];
    $BANNER->description = $_POST['description'];
    $BANNER->url = $_POST['url'];
    $BANNER->update();

    $result = ["id" => $_POST['id']];
    echo json_encode($result);
    exit();
}


if (isset($_POST['arrange'])) {

    foreach ($_POST['sort'] as $key => $img) {
        $key = $key + 1;
        $banner = Banner::arrange($key, $img);
    }
    $result = ["status" => 'success'];
    echo json_encode($result);
    exit();
}