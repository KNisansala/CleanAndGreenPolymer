<?php
include_once(dirname(__FILE__) . '/class/include.php');
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$PRODUCT = new Product($id);
$PRO_PHOTO = new ProductPhoto(NULL);
$photos = $PRO_PHOTO->getProductPhotosByProduct($id);
$PRODUCT_CATEGORY = new ProductCategory($PRODUCT->category);
$related_products = $PRODUCT->getProductsByCategory($PRODUCT->category);
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?= $PRODUCT->name; ?> || Products || Clean & Green Polymers</title>
    <!-- Plugins CSS -->
    <link href="css/plugins.css" rel="stylesheet">
    <link href="css/slick.css" rel="stylesheet">
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
                        <h1><?= $PRODUCT->name; ?></h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 d-flex justify-content-start justify-content-md-end align-items-center">
                    <div class="page-breadcumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb ">
                                <li class="breadcrumb-item"> <a href="./">Home</a> </li>
                                <li class="breadcrumb-item"> <a href="products.php?id=<?= $PRODUCT->category; ?>">Products</a> </li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $PRODUCT->name; ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Sec End -->
    <!-- Inner Content area Start -->
    <section class="blog-sec blog-details-area inner-content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details-content">
                        <div class="blog-details-img">
                            <div class="view-photo-slider">
                                <?php
                                if (count($photos) > 0) {
                                    foreach ($photos as $photo) {
                                ?>
                                        <div><img src="upload/product/gallery/<?= $photo['image_name']; ?>" alt=""></div>
                                <?php
                                    }
                                } else {
                                    echo 'No any product photos.';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="blog-top-content">
                            <div class="news-content">
                                <ul class="admin">
                                    <li> <a href="javascript:void(0)"> <i class="fa fa-list"></i> <?= $PRODUCT_CATEGORY->name; ?> </a> </li>
                                    <li> <a href="javascript:void(0)"> <i class="bx bx-money"></i> Rs. <?= number_format($PRODUCT->price, 2); ?> </a> </li>
                                </ul>
                                <h3><?= $PRODUCT->name; ?></h3>
                                <p><?= $PRODUCT->description; ?></p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget-sidebar">
                        <div class="sidebar-widget categories">
                            <h3>Related Products</h3>
                            <ul>
                                <?php
                                if (count($related_products) > 1) {
                                    foreach ($related_products as $product) {
                                        if ($product['id'] != $id) {
                                ?>
                                            <li><a href="view-product.php?id=<?= $product['id']; ?>"><?= $product['name']; ?></a></li>
                                <?php
                                        }
                                    }
                                } else {
                                    echo 'No any related products.';
                                }
                                ?>
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