<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
$id = '';
if (isset($_GET['id'])) :
    $id = $_GET['id'];
endif;
$CATEGORY = new ListingCategory($id);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Location Sub Category || Control Panel || Synotec Holdings</title>
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
                            <h2>Create Location Sub Category - <?= $CATEGORY->name; ?></h2>
                            <ul class="header-dropdown">
                                <li class="">
                                    <a href="manage-listing-categories.php">
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
                                            <label class="form-label">Category</label>
                                            <input type="text" id="category" class="form-control" autocomplete="off" name="" value="<?= $CATEGORY->name; ?>" disabled="true">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Name</label>
                                            <input type="text" id="name" class="form-control" autocomplete="off" name="name" required="true">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="hidden" name="create" value="create" />
                                    <input type="hidden" name="category" value="<?= $id; ?>" />
                                    <input type="submit" id="create" class="btn btn-primary m-t-15 waves-effect" value="create" />
                                </div>
                            </form>
                            <div class="row clearfix"></div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2>Manage Location Sub Categories - <?= $CATEGORY->name; ?></h2>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $sub_categories = ListingSubCategory::getSubCategoriesByCategory($id);
                                    if (count($sub_categories) > 0) {
                                        $i = 1;
                                        foreach ($sub_categories as $key => $sub_category) {
                                    ?>
                                            <tr id="row_<?php echo $sub_category['id']; ?>">
                                                <td><?php echo $i; ?></td>

                                                <td><?php echo $sub_category['name']; ?></td>

                                                <td>
                                                    <a href="edit-listing-sub-category.php?id=<?php echo $sub_category['id']; ?>" class="op-link btn btn-sm btn-success" title="Edit Sub Category"><i class="glyphicon glyphicon-pencil" title="Edit Sub Category"></i>
                                                    </a>

                                                    <a href="#" class="delete-listing-sub-category btn btn-sm btn-danger" title="Delete Sub Category" data-id="<?php echo $sub_category['id']; ?>">
                                                        <i class="glyphicon glyphicon-trash" data-type="cancel"></i>
                                                    </a>

                                                    <a href="arrange-listing-sub-categories.php?id=<?php echo $id ?>" class="btn btn-sm btn-primary" title="Arrange Cities"><i class="glyphicon glyphicon-random"></i>
                                                    </a>

                                                    <a href="manage-listings.php?id=<?= $sub_category['id']; ?>" class="btn btn-sm btn-warning" title="Locations of Sub Category">
                                                        <i class="glyphicon glyphicon-briefcase"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                    <?php
                                            $i++;
                                        }
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Option</th>
                                    </tr>
                                </tfoot>
                            </table>
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
    <script src="plugins/sweetalert/sweetalert.min.js"></script>
    <script src="js/jm.spinner.js" type="text/javascript"></script>
    <script src="js/listing-sub-category.js" type="text/javascript"></script>
    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
    <script src="js/pages/tables/jquery-datatable.js"></script>
    <script src="delete/js/listing-sub-category.js" type="text/javascript"></script>
</body>

</html>