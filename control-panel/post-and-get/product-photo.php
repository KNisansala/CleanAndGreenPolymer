<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

if (isset($_POST['create'])) {

    $PRODUCT_PHOTO = new ProductPhoto(NULL);

    $PRODUCT_PHOTO->product = $_POST['id'];
    $PRODUCT_PHOTO->caption = $_POST['caption'];
    $PRODUCT_PHOTO->queue = 0;

    $dir_dest = '../../upload/product/gallery/';
    $dir_dest_thumb = '../../upload/product/gallery/thumb/';

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
        $image_dst_x = $handle->image_dst_x;
        $image_dst_y = $handle->image_dst_y;
        if ($image_dst_y > 500) {
            $newSize = Helper::calImgResize(500, $image_dst_x, $image_dst_y);

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

        $handle->image_resize = true;
        $handle->file_new_name_body = TRUE;
        $handle->file_overwrite = TRUE;
        $handle->file_new_name_ext = 'jpg';
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = $img;
        if ($image_dst_y > 200) {
            $newSize = Helper::calImgResize(200, $image_dst_x, $image_dst_y);

            $image_x = (int) $newSize[0];
            $image_y = (int) $newSize[1];

            $handle->image_x = $image_x;
            $handle->image_y = $image_y;
        } else {
            $handle->image_x = $image_dst_x;
            $handle->image_y = $image_dst_y;
        }

        $handle->Process($dir_dest_thumb);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $imgName = $handle->file_dst_name;
        }
    }

    $PRODUCT_PHOTO->image_name = $imgName;
    $PRODUCT_PHOTO->create();

    $result = ["id" => $PRODUCT_PHOTO->id];
    echo json_encode($result);
    exit();
}

if (isset($_POST['update'])) {

    $dir_dest = '../../upload/product/gallery/';
    $dir_dest_thumb = '../../upload/product/gallery/thumb/';

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
        $image_dst_x = $handle->image_dst_x;
        $image_dst_y = $handle->image_dst_y;
        if ($image_dst_y > 500) {
            $newSize = Helper::calImgResize(500, $image_dst_x, $image_dst_y);

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
            $img = $handle->file_dst_name;
        }

        $handle->image_resize = true;
        $handle->file_new_name_body = TRUE;
        $handle->file_overwrite = TRUE;
        $handle->file_new_name_ext = FALSE;
        $handle->image_ratio_crop = 'C';
        $handle->file_new_name_body = $img;
        if ($image_dst_y > 200) {
            $newSize = Helper::calImgResize(200, $image_dst_x, $image_dst_y);

            $image_x = (int) $newSize[0];
            $image_y = (int) $newSize[1];

            $handle->image_x = $image_x;
            $handle->image_y = $image_y;
        } else {
            $handle->image_x = $image_dst_x;
            $handle->image_y = $image_dst_y;
        }

        $handle->Process($dir_dest_thumb);

        if ($handle->processed) {
            $info = getimagesize($handle->file_dst_pathname);
            $img = $handle->file_dst_name;
        }
    }

    $PRODUCT_PHOTO = new ProductPhoto($_POST['id']);
    $PRODUCT_PHOTO->image_name = $_POST['oldImageName'];
    $PRODUCT_PHOTO->caption = $_POST['caption'];

    $PRODUCT_PHOTO->update();

    $result = ["id" => $_POST['id']];
    echo json_encode($result);
    exit();
}

if (isset($_POST['arrange'])) {

    foreach ($_POST['sort'] as $key => $img) {
        $key = $key + 1;
        $product_photos = ProductPhoto::arrange($key, $img);
    }
    $result = ["status" => 'success'];
    echo json_encode($result);
    exit();
}
