<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

if (isset($_POST['create'])) {

    $LISTING = new Listing(NULL);

    $LISTING->name = $_POST['name'];
    $LISTING->category = $_POST['category'];
    $LISTING->subCategory = $_POST['sub_category'];
    $LISTING->description = $_POST['description'];
    $LISTING->address = $_POST['address'];
    $LISTING->district = $_POST['district'];
    $LISTING->city = $_POST['city'];
    $LISTING->phone = $_POST['phone'];
    $LISTING->email = $_POST['email'];
    $LISTING->web = $_POST['web'];

    $dir_dest = '../../upload/listing/';

    $handle = new Upload($_FILES['image']);

    $imgName = null;

    if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_ext = 'jpg';
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = Helper::randamId();
        $handle->image_x = 300;
        $handle->image_y = 370;

        $handle->Process($dir_dest);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgName = $handle->file_dst_name;
        }
    }

    $LISTING->imageName = $imgName;
    $LISTING->create();

    $result = ["id" => $LISTING->id];
    echo json_encode($result);
    exit();
}

if (isset($_POST['update'])) {
    $dir_dest = '../../upload/listing/';

    $handle = new Upload($_FILES['image']);

    $imgName = null;

    if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_body = TRUE;
        $handle->file_overwrite = TRUE;
        $handle->file_new_name_ext = FALSE;
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = $_POST["oldImageName"];
        $handle->image_x = 300;
        $handle->image_y = 370;

        $handle->Process($dir_dest);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgName = $handle->file_dst_name;
        }
    }

    $LISTING = new Listing($_POST['id']);

    $LISTING->imageName = $_POST['oldImageName'];
    $LISTING->name = $_POST['name'];
    $LISTING->category = $_POST['category'];
    $LISTING->subCategory = $_POST['sub_category'];
    $LISTING->description = $_POST['description'];
    $LISTING->address = $_POST['address'];
    $LISTING->district = $_POST['district'];
    $LISTING->city = $_POST['city'];
    $LISTING->phone = $_POST['phone'];
    $LISTING->email = $_POST['email'];
    $LISTING->web = $_POST['web'];
    $LISTING->update();
    $result = ["id" => $_POST['id']];
    echo json_encode($result);
    exit();
}

if (isset($_POST['arrange'])) {

    foreach ($_POST['sort'] as $key => $img) {
        $key = $key + 1;
        $listing = Listing::arrange($key, $img);
    }
    $result = ["status" => 'success'];
    echo json_encode($result);
    exit();
}
