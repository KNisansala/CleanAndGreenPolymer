<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

if (isset($_POST['create'])) {

    $INSTRUCTOR = new Instructor(NULL);

    $INSTRUCTOR->name = $_POST['name'];
    $INSTRUCTOR->category = $_POST['category'];
    $INSTRUCTOR->experience = $_POST['experience'];
    $INSTRUCTOR->district = $_POST['district'];
    $INSTRUCTOR->city = $_POST['city'];
    $INSTRUCTOR->phone = $_POST['phone'];
    $INSTRUCTOR->email = $_POST['email'];

    $dir_dest = '../../upload/instructor/';

    $handle = new Upload($_FILES['image']);

    $imgName = null;

    if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_ext = 'jpg';
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = Helper::randamId();
        $image_dst_x = $handle->image_dst_x;
        $image_dst_y = $handle->image_dst_y;
        if ($image_dst_y > 900) {
            $newSize = Helper::calImgResize(900, $image_dst_x, $image_dst_y);

            $image_x = (int) $newSize[0];
            $image_y = (int) $newSize[1];

            $handle->image_x = $image_x;
            $handle->image_y = $image_y;
        } else {
            $handle->image_x = $image_dst_x;
            $handle->image_y = $image_dst_y;
        }

        $handle->Process($dir_dest);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgName = $handle->file_dst_name;
        }
    }

    $INSTRUCTOR->imageName = $imgName;
    $INSTRUCTOR->create();

    $result = ["id" => $INSTRUCTOR->id];
    echo json_encode($result);
    exit();
}

if (isset($_POST['update'])) {
    $dir_dest = '../../upload/instructor/';

    $handle = new Upload($_FILES['image']);

    $imgName = null;

    if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_body = TRUE;
        $handle->file_overwrite = TRUE;
        $handle->file_new_name_ext = FALSE;
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = $_POST["oldImageName"];
        $image_dst_x = $handle->image_dst_x;
        $image_dst_y = $handle->image_dst_y;
        if ($image_dst_y > 900) {
            $newSize = Helper::calImgResize(900, $image_dst_x, $image_dst_y);

            $image_x = (int) $newSize[0];
            $image_y = (int) $newSize[1];

            $handle->image_x = $image_x;
            $handle->image_y = $image_y;
        } else {
            $handle->image_x = $image_dst_x;
            $handle->image_y = $image_dst_y;
        }

        $handle->Process($dir_dest);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgName = $handle->file_dst_name;
        }
    }

    $INSTRUCTOR = new Instructor($_POST['id']);

    $INSTRUCTOR->imageName = $_POST['oldImageName'];
    $INSTRUCTOR->name = $_POST['name'];
    $INSTRUCTOR->category = $_POST['category'];
    $INSTRUCTOR->experience = $_POST['experience'];
    $INSTRUCTOR->district = $_POST['district'];
    $INSTRUCTOR->city = $_POST['city'];
    $INSTRUCTOR->phone = $_POST['phone'];
    $INSTRUCTOR->email = $_POST['email'];
    $INSTRUCTOR->update();
    $result = ["id" => $_POST['id']];
    echo json_encode($result);
    exit();
}

if (isset($_POST['arrange'])) {

    foreach ($_POST['sort'] as $key => $img) {
        $key = $key + 1;
        $instructor = Instructor::arrange($key, $img);
    }
    $result = ["status" => 'success'];
    echo json_encode($result);
    exit();
}
