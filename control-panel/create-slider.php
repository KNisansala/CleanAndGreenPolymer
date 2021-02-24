<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Slider</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/themes/all-themes.css" rel="stylesheet" />
    <link href="css/jm.spinner.css" rel="stylesheet" type="text/css" />

</head>

<body class="theme-red">
    <div class="box"></div>
    <?php
    include './navigation-and-header.php';
    ?>

    <section class="content">

        <div class="container-fluid">
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Create Slider Photo</h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" id="form-data" enctype="multipart/form-data">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="title" class="form-control" autocomplete="off" name="title" required="true">
                                            <label class="form-label">Title</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="file" id="image" class="form-control" name="image" required="true">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 hidden ">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="url" class="form-control" name="url" required="true" value="1">
                                            <label class="form-label">URL</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hidden">
                                    <label for="description">Description</label>
                                    <div class="form-line">
                                        <input type="text" id="description" class="form-control" name="description" value="0">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <input type="hidden" name="create" value="create" />
                                    <input type="submit" id="create" class="btn btn-primary m-t-15 waves-effect" value="create" />
                                </div>


                            </form>
                        </div>
                        <div class="row clearfix"></div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2>Manage Slider Photos</h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <?php
                                $SLIDER = Slider::all();
                                if (count($SLIDER) > 0) {
                                    foreach ($SLIDER as $key => $slider) {
                                ?>
                                        <div class="col-md-3" id="div<?php echo $slider['id']; ?>">
                                            <div class="photo-img-container">
                                                <img src="../upload/slider/<?php echo $slider['image_name']; ?>" class="img-responsive ">
                                            </div>
                                            <div class="img-caption">
                                                <p class="maxlinetitle"><?php echo $slider['title']; ?></p>
                                                <div class="d">
                                                    <a href="edit-slider.php?id=<?php echo $slider['id']; ?>"> <button class="glyphicon glyphicon-pencil edit-btn"></button></a> |
                                                    <a href="arrange-slider.php"> <button class="glyphicon glyphicon-random arrange-btn"></button></a> |
                                                    <a href="#" class="delete-slider" data-id="<?php echo $slider['id']; ?>"> <button class="glyphicon glyphicon-trash delete-btn"></button></a>

                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <b style="padding-left: 15px;">No slides in the database.</b>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.js"></script>
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="plugins/node-waves/waves.js"></script>
    <script src="js/admin.js"></script>
    <script src="plugins/sweetalert/sweetalert.min.js"></script>
    <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <script src="js/pages/ui/dialogs.js"></script>
    <script src="js/jm.spinner.js" type="text/javascript"></script>
    <script src="js/slider.js" type="text/javascript"></script>
    <script src="delete/js/slider.js" type="text/javascript"></script>
</body>

</html>