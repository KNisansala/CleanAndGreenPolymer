<?php
include_once(dirname(__FILE__) . '/class/include.php');
$SERVICE = new Service(NULL);
$PRODUCT_CATEGORY = new ProductCategory(NULL);
$COMMENT = new Comments(NULL);
$services = $SERVICE->all();
$categories = $PRODUCT_CATEGORY->all();
$comments = $COMMENT->all();
$ABOUT = new Page(1);
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Clean & Green Polymers</title>
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
    <!-- Slider area Start -->
    <?php include './slider.php'; ?>
    <!-- End Slider End -->
    <!-- Service area Start -->
    <section class="feature-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-feature-sec text-center">
                        <div class="service-icon"> <i class="icon mbri-mobile"></i> </div>
                        <div class="service-content">
                            <h2>Mobile Service</h2>
                            <p>Lorem ipsum dolor sit amet csectetur adipiscing elit sed do eiusmod tem incididunt</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-feature-sec text-center">
                        <div class="service-icon"> <i class="icon mbri-laptop"></i> </div>
                        <div class="service-content">
                            <h2>Computer Service</h2>
                            <p>Lorem ipsum dolor sit amet csectetur adipiscing elit sed do eiusmod tem incididunt</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-feature-sec text-center sst-10">
                        <div class="service-icon"> <i class="icon mbri-desktop"></i> </div>
                        <div class="service-content">
                            <h2>Television Service</h2>
                            <p>Lorem ipsum dolor sit amet csectetur adipiscing elit sed do eiusmod tem incididunt</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Area End -->
    <!-- About Area area Start -->
    <section class="about-sec">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="about-img">
                        <img src="upload/page/<?= $ABOUT->image_name; ?>" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="about-txt">
                        <h3>Who We Are?</h3>
                        <p><?= substr($ABOUT->description, 0, 800) . '...'; ?></p>
                        <a href="about-us.php" class="btn mt-3">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Area area End -->
    <!-- CTA Sec Start -->
    <section class="cta-section">
        <div class="container">
            <div class="row">
                <div class="column col-xl-9  col-md-12">
                    <h2>Need To Computer Repair & Mobile Repair Services</h2>
                </div>
                <div class="btn-column col-xl-3 col-md-12 col-sm-5">
                    <a href="contact-us.php" class="btn">Contact Us</a>
                </div>
            </div>
        </div>
    </section>
    <!-- CTA Sec End -->
    <!-- Service Sec Start -->
    <section class="service-sec">
        <div class="container">
            <div class="sec-title mb-0">
                <h2>Our <span>Services</span></h2>
            </div>
            <div class="row">
                <?php
                if (count($services) > 0) {
                    foreach ($services as $key => $service) {
                        if ($key < 3) {
                ?>
                            <div class="col-lg-4 col-md-6">
                                <!-- Single Product Sec -->
                                <div class="single-blog-post">
                                    <div class="post-image">
                                        <a href="view-service.php?id=<?= $service['id']; ?>">
                                            <img src="upload/service/<?= $service['image_name']; ?>" alt="<?= $service['title']; ?>" title="<?= $service['title']; ?>">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <h3> <a href="view-service.php?id=<?= $service['id']; ?>"><?= $service['title']; ?></a> </h3>
                                        <p><?= substr($service['description'], 0, 250) . '...'; ?></p>
                                        <a href="view-service.php?id=<?= $service['id']; ?>" class="btn">Read More</a>
                                    </div>
                                </div>
                            </div>
                <?php
                        }
                    }
                } else {
                    echo 'No any services.';
                }
                ?>
            </div>
        </div>
    </section>
    <!--  Service Sec End -->
    <!-- Our Team Sec Start -->
    <section class="our-team-sec">
        <div class="container">
            <div class="sec-title mb-0">
                <h2>Product <span>Categories</span></h2>
            </div>
            <div class="row">
                <?php
                if (count($categories) > 0) {
                    foreach ($categories as $key => $category) {
                        if ($key < 4) {
                ?>
                            <div class="col-lg-3 col-md-6">
                                <!-- Single Our Team Sec -->
                                <div class="team">
                                    <div class="team-image">
                                        <img src="upload/product-category/<?= $category['image_name']; ?>" alt="">
                                    </div>
                                    <div class="team-info">
                                        <h5><a href="products.php?id=<?= $category['id']; ?>"><?= $category['name']; ?></a></h5>
                                        <span><a href="products.php?id=<?= $category['id']; ?>">View Products</a></span>
                                    </div>
                                </div>
                            </div>
                <?php
                        }
                    }
                } else {
                    echo 'No any product categories.';
                }
                ?>
            </div>
        </div>
    </section>
    <!-- Our Team Sec End -->
    <!-- Teatimonials Sec Start -->
    <section class="testimonial-sec">
        <div class="container">
            <div class="sec-title">
                <h2>Client <span>Testimonials</span></h2>
            </div>
            <div class="indurance-testimonial-slider">
                <?php
                if (count($comments) > 0) {
                    foreach ($comments as $comment) {
                ?>
                        <div class="single-testimonial-slide">
                            <div class="testimonial-item">
                                <div class="testimonial-content"> <span><?= $comment['comment']; ?></span> </div>
                                <div class="testimonial-author">
                                    <div class="author-image"> <img src="upload/comments/<?= $comment['image_name']; ?>" alt=""> </div>
                                    <div class="author-name">
                                        <h6 class="title"><?= $comment['name']; ?></h6>
                                        <span><?= $comment['title']; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo 'No any customer feedbacks.';
                }
                ?>
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