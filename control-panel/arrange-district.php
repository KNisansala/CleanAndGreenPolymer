<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
$USER = new User($_SESSION["id"]);

$DISTRICT = District::all();
?>
<!DOCTYPE html>
<html>

<head>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>District</title>
    <!-- Favicon-->
    <link rel="icon" href="../images/realstate/sl-property-fav.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <?php
    include 'navigation-and-header.php'; ?>

    <section class="content">
        <div class="container-fluid">
            <?php
            $vali = new Validator();
            $vali->show_message();
            ?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" style="margin-top: 20px;">
                        <div class="header">
                            <h2>
                                Arrange District
                            </h2>
                            <ul class="header-dropdown">
                                <li class="">
                                    <a href="manage-district.php">
                                        <i class="material-icons">list</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form method="post" action="post-and-get/district.php" class="form-horizontal">
                                <div class="clearfix m-b-20">
                                    <div class="dd nestable-with-handle">
                                        <ol class="dd-list" id="dd-list">
                                            <?php
                                            if (count($DISTRICT) > 0) {
                                                foreach ($DISTRICT as $key => $img) {
                                            ?>
                                                    <li class="dd-item dd3-item" data-id="13">
                                                        <div class="dd-handle dd3-handle"></div>
                                                        <div class="dd3-content">(<?php echo $key + 1; ?>) &ensp; District : &ensp; <?php echo $img['name']; ?></div>
                                                        <input type="hidden" name="sort[]" value="<?php echo $img["id"]; ?>" class="sort-input" />

                                                    </li>
                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <b>No District in the database.</b>
                                            <?php } ?>
                                        </ol>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 text-center" style="margin-top: 19px;">
                                            <input type="submit" class="btn btn-info" id="btn-submit" value="Save Changes" name="save-arrange">
                                        </div>
                                    </div>
                                </div>
                            </form>
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
    <script src="js/demo.js"></script>
    <script src="js/add-new-ad.js" type="text/javascript"></script>
    <script src="delete/js/slider.js" type="text/javascript"></script>

    <script src="plugins/sweetalert/sweetalert.min.js"></script>
    <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <script src="js/pages/ui/dialogs.js"></script>

    <script src="plugins/jquery-ui/jquery-ui.js" type="text/javascript"></script>
    <script src="tinymce/js/tinymce/tinymce.min.js"></script>
    <script>
        $(function() {
            $("#dd-list").sortable();
            $("#dd-list").disableSelection();
        });
    </script>

</body>

</html>