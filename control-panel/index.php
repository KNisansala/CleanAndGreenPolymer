<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$COUNT_PRODUCT_CATEGORIES = count(ProductCategory::all());
$COUNT_PRODUCTS = count(Product::all());
$COUNT_SERVICES = count(Service::all());
$COUNT_PHOTOS = count(Gallery::all());
$COUNT_COMMENTS = count(Comments::all());
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Dashbord - www.synotec.lk</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>
<style>
    .list-group a:hover {
        text-decoration: none;
    }

    .list-group-item {
        text-align: center !important;
    }
</style>

<body class="theme-red">
    <?php
    include './navigation-and-header.php';
    ?>
    <section class="content">
        <div class="container-fluid">

            <?php
            if (isset($_GET['message'])) {

                $MESSAGE = new Message($_GET['message']);
            ?>
                <div class="alert alert-<?php echo $MESSAGE->status; ?>" role="alert">
                    <?php echo $MESSAGE->description; ?>
                </div>
            <?php
            }
            ?>


            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <a href="manage-listing-categories.php">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-pink hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">photo</i>
                            </div>
                            <div class="content">
                                <div class="text">PRODUCT CATEGORIES</div>
                                <div class="number count-to" data-from="0" data-to="<?php echo $COUNT_PRODUCT_CATEGORIES; ?>" data-speed="1000" data-fresh-interval="20"></div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="manage-product-categories.php">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-cyan hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">burst_mode</i>
                            </div>
                            <div class="content">
                                <div class="text">PRODUCTS</div>
                                <div class="number count-to" data-from="0" data-to="<?php echo $COUNT_PRODUCTS; ?>" data-speed="1000" data-fresh-interval="20"></div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="manage-blog-categories.php">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-light-green hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">forum</i>
                            </div>
                            <div class="content">
                                <div class="text">SERVICES</div>
                                <div class="number count-to" data-from="0" data-to=" <?php echo $COUNT_SERVICES; ?>" data-speed="1500" data-fresh-interval="1"></div>

                            </div>
                        </div>
                    </div>
                </a>
                <a href="manage-instructor-categories.php">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-orange hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">dvr</i>
                            </div>
                            <div class="content">
                                <div class="text">GALLERY PHOTOS</div>
                                <div class="number count-to" data-from="0" data-to=" <?php echo $COUNT_PHOTOS; ?>" data-speed="1000" data-fresh-interval="20"></div>
                            </div>
                        </div>
                    </div>
                </a>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue-grey">
                            <h2>
                                PRODUCTS CATEGORIES
                                <!--                                    <small>  </small>-->
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <div class="number count-to" data-from="0" data-to=" <?php echo $COUNT_PRODUCT_CATEGORIES; ?>" data-speed="1500" data-fresh-interval="1"></div>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="list-group">
                                <a href="create-product-category.php"><button type="button" class="list-group-item">Add new</button></a>
                                <a href="manage-product-categories.php"><button type="button" class="list-group-item">Manage</button></a>
                                <a href="arrange-product-categories.php"><button type="button" class="list-group-item">Arrange</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue-grey">
                            <h2>
                                SERVICES
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <div class="number count-to" data-from="0" data-to=" <?php echo $COUNT_SERVICES; ?>" data-speed="1500" data-fresh-interval="1"></div>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="list-group">
                                <a href="create-service.php"><button type="button" class="list-group-item">Add new</button></a>
                                <a href="manage-services.php"><button type="button" class="list-group-item">Manage</button></a>
                                <a href="arrange-services.php"><button type="button" class="list-group-item">Arrange</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue-grey">
                            <h2>
                                GALLERY PHOTOS
                                <!--                                    <small></small>-->
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <div class="number count-to" data-from="0" data-to=" <?php echo $COUNT_PHOTOS; ?>" data-speed="1500" data-fresh-interval="1"></div>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="list-group">
                                <a href="create-gallery-photo.php"><button type="button" class="list-group-item">Add new</button></a>
                                <a href="manage-gallery-photos.php"><button type="button" class="list-group-item">Manage</button></a>
                                <a href="arrange-gallery-photos.php"><button type="button" class="list-group-item">Arrange</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue-grey">
                            <h2>
                                CUSTOMER FEEDBACK
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <div class="number count-to" data-from="0" data-to=" <?php echo $COUNT_COMMENTS; ?>" data-speed="1500" data-fresh-interval="1"></div>
                            </ul>
                        </div>
                        <div class="body">

                            <div class="list-group">
                                <a href="create-comment.php"><button type="button" class="list-group-item">Add new</button></a>
                                <a href="manage-comments.php"><button type="button" class="list-group-item">Manage</button></a>
                                <a href="arrange-comments.php"><button type="button" class="list-group-item">Arrange</button></a>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ICONS GUIDE
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="row clearfix demo-icon-container">
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                    <button class="glyphicon glyphicon-trash delete-btn"></button> <span class="icon-name">Delete</span>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                    <button class="glyphicon glyphicon-pencil edit-btn"></button> <span class="icon-name">Edit</span>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                    <button class="glyphicon glyphicon-random arrange-btn"></button> <span class="icon-name">Arrange</span>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                    <button class="glyphicon glyphicon-picture arrange-btn"></button> <span class="icon-name">Add Photos</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="plugins/flot-charts/jquery.flot.js"></script>
    <script src="plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>