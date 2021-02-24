<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

if (isset($_POST['create'])) {

    $EVENT = new Event(NULL);

    $EVENT->title = $_POST['title'];
    $EVENT->category = $_POST['category'];
    $EVENT->startDate = $_POST['start_date'];
    $EVENT->endDate = $_POST['end_date'];
    $EVENT->district = $_POST['district'];
    $EVENT->city = $_POST['city'];
    $EVENT->description = $_POST['description'];

    $dir_dest = '../../upload/event/';
    $dir_dest_thumb = '../../upload/event/thumb/';
    $dir_dest_thumb1 = '../../upload/event/thumb1/';
    $img = Helper::randamId();
    $handle = new Upload($_FILES['image']);

    $imgName = null;

    if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_ext = 'jpg';
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = $img;
        $handle->image_x = 900;
        $handle->image_y = 500;

        $handle->Process($dir_dest);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgName = $handle->file_dst_name;
        }
        $handle->image_resize = true;
        $handle->file_new_name_ext = 'jpg';
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = $img;
        $handle->image_x = 400;
        $handle->image_y = 346;

        $handle->Process($dir_dest_thumb);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgName = $handle->file_dst_name;
        }
        $handle->image_resize = true;
        $handle->file_new_name_ext = 'jpg';
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = $img;
        $handle->image_x = 100;
        $handle->image_y = 75;

        $handle->Process($dir_dest_thumb1);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgName = $handle->file_dst_name;
        }
    }

    $EVENT->image_name = $imgName;
    $EVENT->create();

    $result = ["id" => $EVENT->id];
    echo json_encode($result);
    exit();
}

if (isset($_POST['update'])) {
    $dir_dest = '../../upload/event/';
    $dir_dest_thumb = '../../upload/event/thumb/';
    $dir_dest_thumb1 = '../../upload/event/thumb1/';

    $handle = new Upload($_FILES['image']);

    $imgName = null;

    if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_body = TRUE;
        $handle->file_overwrite = TRUE;
        $handle->file_new_name_ext = FALSE;
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = $_POST["oldImageName"];
        $handle->image_x = 900;
        $handle->image_y = 500;

        $handle->Process($dir_dest);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgName = $handle->file_dst_name;
        }
        $handle->image_resize = true;
        $handle->file_new_name_body = TRUE;
        $handle->file_overwrite = TRUE;
        $handle->file_new_name_ext = FALSE;
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = $_POST["oldImageName"];
        $handle->image_x = 400;
        $handle->image_y = 346;

        $handle->Process($dir_dest_thumb);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgName = $handle->file_dst_name;
        }
        $handle->image_resize = true;
        $handle->file_new_name_body = TRUE;
        $handle->file_overwrite = TRUE;
        $handle->file_new_name_ext = FALSE;
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = $_POST["oldImageName"];
        $handle->image_x = 100;
        $handle->image_y = 75;

        $handle->Process($dir_dest_thumb1);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgName = $handle->file_dst_name;
        }
    }

    $EVENT = new Event($_POST['id']);

    $EVENT->image_name = $_POST['oldImageName'];
    $EVENT->title = $_POST['title'];
    $EVENT->startDate = $_POST['start_date'];
    $EVENT->endDate = $_POST['end_date'];
    $EVENT->district = $_POST['district'];
    $EVENT->city = $_POST['city'];
    $EVENT->description = $_POST['description'];
    $EVENT->category = $_POST['category'];
    $EVENT->update();
    $result = ["id" => $_POST['id']];
    echo json_encode($result);
    exit();
}

if (isset($_POST['arrange'])) {

    foreach ($_POST['sort'] as $key => $img) {
        $key = $key + 1;
        $event = Event::arrange($key, $img);
    }
    $result = ["status" => 'success'];
    echo json_encode($result);
    exit();
}
