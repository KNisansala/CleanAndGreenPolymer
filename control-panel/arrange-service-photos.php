<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$photos = ServicePhoto::getServicePhotosByService($id);
$SERVICE = new Service($id);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Service Photos || Control Panel || Synotec Holdings</title>
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
                            <h2>Arrange Service Photos - <?= $SERVICE->title; ?></h2>
                            <ul class="header-dropdown">
                                <li class="">
                                    <a href="view-service-photos.php?id=<?= $id; ?>">
                                        <i class="material-icons">list</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" id="form-data" enctype="multipart/form-data">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12 arrange-container">
                                            <ul id="sortable">
                                                <?php
                                                if (count($photos) > 0) {
                                                    foreach ($photos as $key => $img) {
                                                ?>
                                                        <div class="col-md-3" style="list-style: none;">
                                                            <li class="ui-state-default">
                                                                <span class="number-class">(<?= $key + 1; ?>)</span>
                                                                <img class="img-responsive" src="../upload/service/gallery/thumb/<?= $img["image_name"]; ?>" alt="" />
                                                                <input type="hidden" name="sort[]" value="<?= $img["id"]; ?>" class="sort-input" />

                                                            </li>
                                                        </div>

                                                    <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <b>No any service photos.</b>
                                                <?php } ?>

                                            </ul>
                                            <div class="row">
                                                <div class="col-sm-12 text-center" style="margin-top: 19px;">
                                                    <input type="hidden" value="arrange" name="arrange" />
                                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect" id="arrange" value="update">Save Changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    <script src="plugins/bootstrap/js/bootstrap.js"></script>
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="plugins/node-waves/waves.js"></script>
    <script src="js/admin.js"></script>
    <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <script src="js/pages/ui/dialogs.js"></script>
    <script src="plugins/jquery-ui/jquery-ui.js" type="text/javascript"></script>
    <script src="js/jm.spinner.js" type="text/javascript"></script>
    <script src="plugins/sweetalert/sweetalert.min.js"></script>
    <script src="js/service-photo.js"></script>

    <script>
        $(function() {
            $("#sortable").sortable();
            $("#sortable").disableSelection();
        });
    </script>
</body>

</html>