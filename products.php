<?php
include_once(dirname(__FILE__) . '/class/include.php');
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$PRODUCT_CATEGORY = new ProductCategory($id);
$PRODUCT = new Product(NULL);
$products = $PRODUCT->getProductsByCategory($id);
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Products || <?= $PRODUCT_CATEGORY->name; ?> || Clean & Green Polymers</title>
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
                        <h1>Products of <?= $PRODUCT_CATEGORY->name; ?></h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 d-flex justify-content-start justify-content-md-end align-items-center">
                    <div class="page-breadcumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb ">
                                <li class="breadcrumb-item"> <a href="./">Home</a> </li>
                                <li class="breadcrumb-item"> <a href="product-categories.php">Categories</a> </li>
                                <li class="breadcrumb-item active" aria-current="page">Products</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Sec End -->
    <!-- Inner Content area Start -->
    <section class="blog-sec inner-content-wrapper">
        <div class="container">
            <div class="row">
                <?php
                if (count($products) > 0) {
                    foreach ($products as $product) {
                ?>
                        <div class="col-lg-4 col-md-6">
                            <!-- Single Product Sec -->
                            <div class="single-blog-post">
                                <div class="post-image">
                                    <a href="view-product.php?id=<?= $product['id']; ?>">
                                        <img src="upload/product/<?= $product['image_name']; ?>" alt="<?= $product['name']; ?>" title="<?= $product['name']; ?>">
                                    </a>
                                </div>
                                <div class="post-content">
                                    <div class="date"><span>Rs. <?= number_format($product['price'], 2); ?> </span> </div>
                                    <h3> <a href="view-product.php?id=<?= $product['id']; ?>"><?= $product['name']; ?></a> </h3>
                                    <p><?= substr($product['description'], 0, 250) . '...'; ?></p>
                                    <a href="view-product.php?id=<?= $product['id']; ?>" class="btn">Read More</a>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo 'No any products.';
                }
                ?>
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