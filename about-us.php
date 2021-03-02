<?php
include_once(dirname(__FILE__) . '/class/include.php');
$ABOUT = new Page(1);
$VISION = new Page(2);
$MISSION = new Page(3);
$VALUES = new Page(4);
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>About Us || Clean & Green Polymers</title>
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
                        <h1>About Us</h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 d-flex justify-content-start justify-content-md-end align-items-center">
                    <div class="page-breadcumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb ">
                                <li class="breadcrumb-item"> <a href="./">Home</a> </li>
                                <li class="breadcrumb-item active" aria-current="page">About</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Sec End -->
    <!-- About Area area Start -->
    <section class="about-sec pt-120">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="about-img">
                        <img src="upload/page/<?= $ABOUT->image_name; ?>" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="about-txt">
                        <h3>Clean & Green Polymer</h3>
                        <p><?= $ABOUT->description; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Area area End -->
    <!-- Teatimonials Sec Start -->
    <section class="testimonial-sec">
        <div class="container">
            <div class="sec-title">
                <h2>Company <span>Importance</span></h2>
            </div>
            <div class="indurance-testimonial-slider1 row">
                <div class="single-testimonial-slide col-sm-4">
                    <div class="testimonial-item">
                        <div class="testimonial-content"> <span><?= $VISION->description; ?></span> </div>
                        <div class="testimonial-author">
                            <div class="author-image"> <img src="images/vision.jpg" alt=""> </div>
                            <div class="author-name">
                                <h6 class="title">Our Vision</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-testimonial-slide col-sm-4">
                    <div class="testimonial-item">
                        <div class="testimonial-content"> <span><?= $MISSION->description; ?></span> </div>
                        <div class="testimonial-author">
                            <div class="author-image"> <img src="images/mission.jpg" alt=""> </div>
                            <div class="author-name">
                                <h6 class="title">Our Mission</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-testimonial-slide col-sm-4">
                    <div class="testimonial-item">
                        <div class="testimonial-content"> <span><?= $VALUES->description; ?></span> </div>
                        <div class="testimonial-author">
                            <div class="author-image"> <img src="images/value.jpg" alt=""> </div>
                            <div class="author-name">
                                <h6 class="title">Our Values</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Teatimonials Sec End -->
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