<?php

//------------------------- IMPORTANT -------------------------

require_once "../include.php";

date_default_timezone_set('Asia/Colombo');
$todayis = date("l, F j, Y, g:i a");
$site_link = "https://" . $_SERVER['HTTP_HOST'];

//----------------------- DISPLAY STRINGS ---------------------
$comany_name = "Clean & Green Polymer";
$website_name = "www.cleanandgreenpolymer.com";
$comConNumber = "(+94) 91 222 8869";
$comEmail = "info@cleanandgreenpolymer.com";
$comOwner = "Team Clean & Green Polymer";
$customer_msg = 'Hello, and thank you for your interest in ' . $comany_name . '. We have received your enquiry, and we will get back to you as soon as possible.';

//----------------------- LOGO ---------------------------------

$logo = $site_link . '/contact-form/img/logo.png';
// $logo = 'https://ci4.googleusercontent.com/proxy/lz0tSijRTHwJ3I7PQ1iXA67lYFfULG0evRbR_St785VeiABNukQPJl-JGBcLKTkZz1q4pG6g25P1uxTW4dYkOznHHNV3f-zB=s0-d-e1-ft#http://romaya.galle.website/contact-form/img/logo.png';

// ----------------------- POST VARIABLES --------------------------

$visitor_name = $_POST['visitor_name'];
$visitor_email = $_POST['visitor_email'];
$visitor_phone = $_POST['visitor_phone'];
//$visitor_subject = $_POST['subject'];
$message = $_POST['message'];


//------------------------ MAIL ESSENTIALS --------------------------------

$webmail = "info@cleanandgreenpolymer.com";
$visitorSubject = "Thank You " . $visitor_name . " - Clean & Green Polymer";
$companySubject = "Contact Inquiry - " . $visitor_name;

//----------------------CAPTCHACODE---------------------

session_start();
$response = array();

if ($_SESSION['CAPTCHACODE'] != $_POST['captchacode']) {
    $response['status'] = 'wrong_code';
    $response['msg'] = 'Security Code is invalid';
    echo json_encode($response);
    exit();
}

include("mail-template.php");

$HELPER = new Helper();
$visitorMail = $HELPER->PHPMailer($webmail, $comany_name, $comEmail, $comOwner, $visitor_email, $visitor_name, $visitorSubject, $visitor_message);

$companyMail = $HELPER->PHPMailer($webmail, $visitor_name, $visitor_email, $visitor_name, $comEmail, $comOwner, $companySubject, $company_message);

if ($visitorMail && $companyMail) {
    $response['status'] = 'correct';
    $response['msg'] = "Your message has been sent successfully";
    echo json_encode($response);
    exit();
} else {
    $response['status'] = 'correct';
    $response['msg'] = "Your message has not been sent";
    echo json_encode($response);
    exit();
}
