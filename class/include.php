<?php

include_once(dirname(__FILE__) . '/Banner.php');
include_once(dirname(__FILE__) . '/Blog.php');
include_once(dirname(__FILE__) . '/BlogCategory.php');
include_once(dirname(__FILE__) . '/BlogPhoto.php');
include_once(dirname(__FILE__) . '/City.php');
include_once(dirname(__FILE__) . '/Comments.php');
include_once(dirname(__FILE__) . '/Database.php');
include_once(dirname(__FILE__) . '/District.php');
include_once(dirname(__FILE__) . '/Event.php');
include_once(dirname(__FILE__) . '/EventCategory.php');
include_once(dirname(__FILE__) . '/Helper.php');
include_once(dirname(__FILE__) . '/Instructor.php');
include_once(dirname(__FILE__) . '/InstructorCategory.php');
include_once(dirname(__FILE__) . '/Partner.php');
include_once(dirname(__FILE__) . '/PartnerCategory.php');
include_once(dirname(__FILE__) . '/Listing.php');
include_once(dirname(__FILE__) . '/ListingCategory.php');
include_once(dirname(__FILE__) . '/ListingPhoto.php');
include_once(dirname(__FILE__) . '/ListingSubCategory.php');
include_once(dirname(__FILE__) . '/Message.php');
include_once(dirname(__FILE__) . '/Page.php');
include_once(dirname(__FILE__) . '/Product.php');
include_once(dirname(__FILE__) . '/ProductCategory.php');
include_once(dirname(__FILE__) . '/ProductPhoto.php');
include_once(dirname(__FILE__) . '/Setting.php');
include_once(dirname(__FILE__) . '/Slider.php');
include_once(dirname(__FILE__) . '/Upload.php');
include_once(dirname(__FILE__) . '/User.php');
include_once(dirname(__FILE__) . '/Validator.php');

function dd($data) {
    var_dump($data);
    exit();
}
function redirect($url) {
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' . $url . '"';
    $string .= '</script>';

    echo $string;
    exit();
}
