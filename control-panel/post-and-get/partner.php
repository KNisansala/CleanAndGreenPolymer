<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

if (isset($_POST['create'])) {

    $PARTNER = new Partner(NULL);

    $PARTNER->name = $_POST['name'];
    $PARTNER->category = $_POST['category'];
    // $PARTNER->experience = $_POST['experience'];
    // $PARTNER->district = $_POST['district'];
    // $PARTNER->city = $_POST['city'];
    // $PARTNER->phone = $_POST['phone'];
    // $PARTNER->email = $_POST['email'];

    $dir_dest = '../../upload/partner/';

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

    $PARTNER->imageName = $imgName;
    $PARTNER->create();

    $result = ["id" => $PARTNER->id];
    echo json_encode($result);
    exit();
}

if (isset($_POST['update'])) {
    $dir_dest = '../../upload/partner/';

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

    $PARTNER = new Partner($_POST['id']);

    $PARTNER->imageName = $_POST['oldImageName'];
    $PARTNER->name = $_POST['name'];
    $PARTNER->category = $_POST['category'];
    // $PARTNER->experience = $_POST['experience'];
    // $PARTNER->district = $_POST['district'];
    // $PARTNER->city = $_POST['city'];
    // $PARTNER->phone = $_POST['phone'];
    // $PARTNER->email = $_POST['email'];
    $PARTNER->update();
    $result = ["id" => $_POST['id']];
    echo json_encode($result);
    exit();
}

if (isset($_POST['arrange'])) {

    foreach ($_POST['sort'] as $key => $img) {
        $key = $key + 1;
        $partner = Partner::arrange($key, $img);
    }
    $result = ["status" => 'success'];
    echo json_encode($result);
    exit();
}
