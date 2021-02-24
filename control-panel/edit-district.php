<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
$USER = new User($_SESSION["id"]);
$id = ''; 
 
$id = $_GET['id'];
$DIS = new District($id);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Edit District || Admin </title>

    <link rel="icon" href="../images/realstate/sl-property-fav.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
        type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />
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
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Edit District
                            </h2>
                            <ul class="header-dropdown">
                                <li class="">
                                    <a href="manage-district.php">
                                        <i class="material-icons">list</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body row">
                            <form class="form-horizontal col-sm-9 col-md-9" method="post"
                                action="post-and-get/district.php" enctype="multipart/form-data">

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                        <label for="name">Name</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="name" class="hidden-lg hidden-md">Name</label>
                                                <input type="text" id="name" class="form-control"
                                                    placeholder="Enter name" value="<?php echo $DIS->name; ?>"
                                                    name="name" required="TRUE">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 hidden-sm hidden-xs form-control-label">
                                        <label for="image">Image</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="image" class="hidden-lg hidden-md">Image</label>
                                                <input type="file" id="image" class="form-control" name="image">
                                                <?php
                                                        if ($DIS->image_name) {
                                                            ?>
                                                <img src="../upload/district/thumb/<?php echo $DIS->image_name; ?>"
                                                    id="image" class="view-edit-img img img-responsive img-thumbnail"
                                                    name="image" alt="old image">
                                                <?php
                                                        }
                                                        ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <input type="hidden" id="oldImageName" value="<?php echo $DIS->image_name; ?>"
                                            name="oldImageName" />
                                        <input type="hidden" id="id" value="<?php echo $DIS->id; ?>" name="id" />
                                        <input type="hidden" id="authToken"
                                            value="<?php echo $_SESSION["authToken"]; ?>" name="authToken" />
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect"
                                            name="edit-district" value="submit">Save Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.js"></script>
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="plugins/node-waves/waves.js"></script>
    <script src="plugins/jquery-spinner/js/jquery.spinner.js"></script>
    <script src="js/admin.js"></script>
    <script src="js/demo.js"></script>
    <script src="js/add-new-ad.js" type="text/javascript"></script>
    <script src="js/city.js" type="text/javascript"></script>

</body>

</html>