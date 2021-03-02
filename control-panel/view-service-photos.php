<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$SERVICE = new Service($id)
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
            <?php
            $vali = new Validator();
            $vali->show_message();
            ?>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Create Service Photos - <?= $SERVICE->title; ?></h2>
                            <ul class="header-dropdown">
                                <li class="">
                                    <a href="manage-services.php">
                                        <i class="material-icons">list</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" id="form-data" enctype="multipart/form-data">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="file" id="image" class="form-control" name="image" required="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="caption" class="form-control" autocomplete="off" name="caption" required="true">
                                            <label class="form-label">Caption</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="hidden" name="create" value="create" />
                                    <input type="hidden" id="id" value="<?php echo $SERVICE->id; ?>" name="id" />
                                    <input type="submit" id="create" class="btn btn-primary m-t-15 waves-effect" value="create" />
                                </div>
                            </form>
                            <div class="row clearfix"> </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2>Manage Service Photos - <?= $SERVICE->title; ?></h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <?php
                                $photos = ServicePhoto::getServicePhotosByService($id);
                                if (count($photos) > 0) {
                                    foreach ($photos as $key => $photo) {
                                ?>
                                        <div class="col-md-3" id="div<?php echo $photo['id']; ?>">
                                            <div class="photo-img-container">
                                                <img src="../upload/service/gallery/thumb/<?php echo $photo['image_name']; ?>" class="img-responsive ">
                                            </div>
                                            <div class="img-caption">
                                                <p class="maxlinetitle"><?php echo $photo['caption']; ?></p>
                                                <div class="d">
                                                    <a href="edit-service-photo.php?id=<?php echo $photo['id']; ?>"> <button class="glyphicon glyphicon-pencil edit-btn"></button></a> |
                                                    <a href="arrange-service-photos.php?id=<?php echo $id; ?>"> <button class="glyphicon glyphicon-random arrange-btn"></button></a> |
                                                    <a href="#" class="delete-service-photo" data-id="<?php echo $photo['id']; ?>"> <button class="glyphicon glyphicon-trash delete-btn"></button></a>

                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <b style="padding-left: 15px;">No any service photos.</b>
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
    <script src="js/jm.spinner.js" type="text/javascript"></script>
    <script src="plugins/sweetalert/sweetalert.min.js"></script>
    <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <script src="js/pages/ui/dialogs.js"></script>
    <script src="js/service-photo.js"></script>
    <script src="delete/js/service-photo.js" type="text/javascript"></script>

</body>

</html>