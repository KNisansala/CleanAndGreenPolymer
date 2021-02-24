<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Contact Us || Clean & Green Polymer</title>
    <!-- Plugins CSS -->
    <link href="css/plugins.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
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
                                <input type="text" class="form-control" placeholder="Name" required>
                            </div>
                            <div class="col-md">
                                <input type="text" class="form-control" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <input type="text" class="form-control" placeholder="Subject" required>
                            </div>
                            <div class="col-md">
                                <input type="text" class="form-control" placeholder="Job Tittle" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Message" rows="4" required></textarea>
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
                            <form id="contactForm">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Subject</label>
                                            <input type="text" name="msg_subject" id="msg_subject" class="form-control" required data-error="Please enter your subject">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Message</label>
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="10" required data-error="Write your message"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="btn"> Send message </button>
                                    </div>
                                </div>
                            </form>
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
</body>

</html>