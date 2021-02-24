<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

if (isset($_POST['create'])) {

    $LISTING_PHOTO = new ListingPhoto(NULL);

    $LISTING_PHOTO->listing = $_POST['id'];
    $LISTING_PHOTO->caption = $_POST['caption'];
    $LISTING_PHOTO->sort = 0;

    $dir_dest = '../../upload/listing/gallery/';
    $dir_dest_thumb = '../../upload/listing/gallery/thumb/';

    $handle = new Upload($_FILES['image']);
    $imgName = null;
    $img = Helper::randamId();


    if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_body = TRUE;
        $handle->file_overwrite = TRUE;
        $handle->file_new_name_ext = 'jpg';
        $handle->image_ratio_crop = 'C';
        $handle->image_watermark = '../../img/logo/logo-watermark.png';
        $handle->file_new_name_body = $img;
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
        $handle->file_new_name_ext = 'jpg';
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = $img;
        $handle->image_x = 300;
        $handle->image_y = 200;

        $handle->Process($dir_dest_thumb);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgName = $handle->file_dst_name;
        }
    }

    $LISTING_PHOTO->image_name = $imgName;
    $LISTING_PHOTO->create();

    $result = ["id" => $LISTING_PHOTO->id];
    echo json_encode($result);
    exit();
}

if (isset($_POST['update'])) {

    $dir_dest = '../../upload/listing/gallery/';
    $dir_dest_thumb = '../../upload/listing/gallery/thumb/';

    $handle = new Upload($_FILES['image']);

    $img = $_POST["oldImageName"];

    if ($handle->uploaded) {
        $handle->image_resize = true;
        $handle->file_new_name_body = TRUE;
        $handle->file_overwrite = TRUE;
        $handle->file_new_name_ext = FALSE;
        $handle->image_ratio_crop = 'C';
        $handle->image_watermark = '../../img/logo/logo-watermark.png';
        $handle->file_new_name_body = $img;
        $handle->image_x = 900;
        $handle->image_y = 500;

        $handle->Process($dir_dest);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $img = $handle->file_dst_name;
        }

        $handle->image_resize = true;
        $handle->file_new_name_body = TRUE;
        $handle->file_overwrite = TRUE;
        $handle->file_new_name_ext = FALSE;
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = $img;
        $handle->image_x = 300;
        $handle->image_y = 200;

        $handle->Process($dir_dest_thumb);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $img = $handle->file_dst_name;
        }
    }

    $LISTING_PHOTO = new ListingPhoto($_POST['id']);
    $LISTING_PHOTO->image_name = $_POST['oldImageName'];
    $LISTING_PHOTO->caption = $_POST['caption'];

    $LISTING_PHOTO->update();

    $result = ["id" => $_POST['id']];
    echo json_encode($result);
    exit();
}

if (isset($_POST['arrange'])) {

    foreach ($_POST['sort'] as $key => $img) {
        $key = $key + 1;
        $listing_photos = ListingPhoto::arrange($key, $img);
    }
    $result = ["status" => 'success'];
    echo json_encode($result);
    exit();
}
