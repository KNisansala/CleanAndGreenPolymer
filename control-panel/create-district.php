<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
$USER = new User($_SESSION["id"]);
?>

<!DOCTYPE html>
<html> 
    <head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Dashbord - www.sublime.lk</title>
        <!-- Favicon-->
        <link rel="icon" href="../images/realstate/sl-property-fav.png" type="image/x-icon">

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

    <body class="theme-red">
            <?php include './navigation-and-header.php'; ?>
            <section class="content">
                <div class="container-fluid"> 
             

                <?php
                $vali = new Validator();

                $vali->show_message();
                ?>

                    <!-- Vertical Layout -->
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card" style="margin-top: 20px;">
                                <div class="header">
                                    <h2>Add New District</h2>
                                    <ul class="header-dropdown">
                                        <li class="">
                                            <a href="manage-district.php">
                                                <i class="material-icons">list</i> 
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="body">
                                    <form class="form-horizontal"  method="post" action="post-and-get/district.php" enctype="multipart/form-data"> 
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                                <label for="name">Name</label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="name" class="form-control" placeholder="Enter district name" autocomplete="off" name="name" required="TRUE">
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 

                                        <div class="row clearfix">
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                                    <label for="image">Image</label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label for="image" class="hidden-lg hidden-md">Image</label>
                                                            <input type="file" id="image" class="form-control" name="image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 

                                        <div class="row clearfix">
                                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-4"> 
                                                <input type="submit" name="add-district" class="btn btn-primary m-t-15 waves-effect" value="Add District"/>
                                            </div>
                                        </div>
                                        <hr/>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- #END# Vertical Layout -->

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