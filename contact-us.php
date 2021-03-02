<?php
include_once(dirname(__FILE__) . '/class/include.php');
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Contact Us || Clean & Green Polymers</title>
    <!-- Plugins CSS -->
    <link href="css/plugins.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="contact-form/style.css">
</head>

<body>
    <!-- Pre Loader -->
    <div id="dvLoading"></div>
    <!-- Header Sec Start -->
    <?php include './header.php'; ?>
    <!-- Header Sec End -->
    <!-- Quote Section -->
    <div class="quote-part mfp-hide" id="quote-popup">
        <div class="container">
            <div class="section-title"> <span class="section-span">Get A Quote</span> </div>
            <div class="row">
                <div class="col-lg-12">
                    <form class="quote-form">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Name" >
                            </div>
                            <div class="col-md">
                                <input type="text" class="form-control" placeholder="Email" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <input type="text" class="form-control" placeholder="Subject" >
                            </div>
                            <div class="col-md">
                                <input type="text" class="form-control" placeholder="Job Tittle" >
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Message" rows="4" ></textarea>
                        </div>
                        <button type="submit" class="btn">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Sec Start -->
    <section class="breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9">
                    <div class="page-title">
                        <h1>Contact Us</h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 d-flex justify-content-start justify-content-md-end align-items-center">
                    <div class="page-breadcumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb ">
                                <li class="breadcrumb-item"> <a href="./">Home</a> </li>
                                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Sec End -->
    <!-- Inner Content area Start -->
    <section class="contact-area inner-content-wrapper">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="contact-wrap">
                        <div class="contact-form">
                            <div class="contact-title">
                                <h2>Drop us Message for Any Query</h2>
                            </div>
                            <div id="contactForm">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" id="txtFullName" class="form-control"  data-error="Please enter your name">
                                            <span id="spanFullName"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input type="email" name="email" id="txtEmail" class="form-control"  data-error="Please enter your email">
                                            <span id="spanEmail"></span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" name="phone" id="txtPhone" class="form-control"  data-error="Please enter your phone number">
                                            <span id="spanPhone"></span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Message</label>
                                            <textarea name="message" class="form-control" id="txtMessage" cols="30" rows="10"  data-error="Write your message"></textarea>
                                            <span id="spanMessage"></span>
                                        </div>
                                    </div>
                                    <div class="row col-12">
                                        <div class="form-group col-md-8">
                                            <div class="form-col">
                                                <input type="text" name="captchacode" class="form-control" id="captchacode" placeholder="Captcha Code">
                                                <span id="capspan"></span>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4 refresh-res code-i mb-0">
                                            <div class="form-col">
                                                <div style="margin-left: -15px;" class="mrg code-m">
                                                    <?php include("./contact-form/captchacode-widget.php"); ?>
                                                </div>
                                                <img id="checking" src="contact-form/img/checking.gif" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="btn" id="submit"> Send </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-info">
                        <h3>Our Contact Details</h3>
                        <p>Get in touch with us.</p>
                        <ul class="address">
                            <li class="location"> <i class="bx bxs-location-plus"></i> <span>Address</span> No. 55, Isipathanarama Rd, Nawinna, Maharagama. </li>
                            <li> <i class="bx bxs-phone-call"></i> <span>Phone</span> <a href="tel:+(94) 11 366 3500">+(94) 11 366 3500</a></li>
                            <li> <i class="bx bxs-envelope"></i> <span>Email</span> <a href="mailto:info@cleanandgreenpolymer.com">info@cleanandgreenpolymer.com</a> </li>
                        </ul>
                        <div class="sidebar-follow-us">
                            <h3>Follow us:</h3>
                            <ul class="social-wrap">
                                <li> <a href="#" target="_blank"> <i class="bx bxl-twitter"></i> </a> </li>
                                <li> <a href="#" target="_blank"> <i class="bx bxl-instagram"></i> </a> </li>
                                <li> <a href="#" target="_blank"> <i class="bx bxl-facebook"></i> </a> </li>
                                <li> <a href="#" target="_blank"> <i class="bx bxl-youtube"></i> </a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Inner Content Area End -->
    <!-- Footer Sec Start -->
    <?php include './footer.php'; ?>
    <!-- Footer Sec End -->
    <!--jquery js -->
    <script src="js/jquery-min.js"></script>
    <script src="js/popper.min.js"></script>
    <!--jquery js -->
    <script src="js/bootstrap.min.js"></script>
    <!--jquery js -->
    <script src="js/plugins.js"></script>
    <!--Fontawesome js -->
    <script src="js/fontawesome.js"></script>
    <!--Owl js -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- MagnificPopup JS -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <!--Meanmenu js -->
    <script src="js/jquery.meanmenu.min.js"></script>
    <!--Slick js -->
    <script src="js/slick.min.js"></script>
    <!--jquery js -->
    <script src="js/custom.js"></script>
    <script src="contact-form/scripts.js"></script>
</body>

</html>