<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$SUBCATEGORY = new ListingSubCategory($id);
$CATEGORY = new ListingCategory($SUBCATEGORY->category);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Locations || Control Panel || Synotec Holdings</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
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
            <!-- Manage Brand -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Create Locations - <?= $SUBCATEGORY->name; ?></h2>
                            <ul class="header-dropdown">
                                <li class="">
                                    <a href="manage-listing-sub-categories.php?id=<?= $SUBCATEGORY->category; ?>">
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
                                            <label class="form-label">Sub Category</label>
                                            <input type="text" id="sub-category" class="form-control" autocomplete="off" name="" value="<?= $SUBCATEGORY->name; ?>" disabled="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="name" class="form-control" value="" name="name" required="TRUE">
                                            <label class="form-label">Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="address" class="form-control" value="" name="address" required="TRUE">
                                            <label class="form-label">Address</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <select class="form-control show-tick place-select1" type="text" id="district" autocomplete="off" name="district">
                                            <option value="">-- Please Select --</option>
                                                <?php
                                                foreach (District::all() as $key => $disrict) {
                                                ?>
                                                    <option value="<?= $disrict['id']; ?>">
                                                        <?= $disrict['name']; ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <label class="form-label">District</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line focused">
                                            <select class="form-control show-tick place-select1" type="text" id="city" autocomplete="off" name="city">
                                                <option value="">-- Please Select --</option>
                                            </select>
                                            <label class="form-label">City</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="phone" class="form-control" value="" name="phone" required="TRUE">
                                            <label class="form-label">Phone Number</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="email" class="form-control" value="" name="email" required="TRUE">
                                            <label class="form-label">Email</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="web" class="form-control" value="" name="web" required="TRUE">
                                            <label class="form-label">Web</label>
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
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <label class="form-label">Description</label>
                                        <div class="form-line">
                                            <textarea id="description" name="description" class="form-control" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="hidden" name="create" value="create" />
                                    <input type="hidden" id="category" value="<?= $CATEGORY->id; ?>" name="category" />
                                    <input type="hidden" id="sub-category" value="<?= $id; ?>" name="sub_category" />
                                    <input type="submit" id="create" class="btn btn-primary TYPEm-t-15 waves-effect" value="create" />
                                </div>
                            </form>
                            <div class="row clearfix"> </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2>Manage Locations - <?= $SUBCATEGORY->name; ?></h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <?php
                                $listings = Listing::getListingsBySubCategory($id);
                                if (count($listings) > 0) {
                                    foreach ($listings as $key => $listing) {
                                ?>
                                        <div class="col-md-3" id="div<?= $listing['id']; ?>">
                                            <div class="photo-img-container">
                                                <img src="../upload/listing/<?= $listing['image_name']; ?>" class="img-responsive ">
                                            </div>
                                            <div class="img-caption">
                                                <p class="maxlinetitle"><?= $listing['name']; ?></p>
                                                <div class="d">
                                                    <a href="edit-listing.php?id=<?= $listing['id']; ?>"> <button class="glyphicon glyphicon-pencil edit-btn"></button></a> |
                                                    <a href="#" class="delete-listing" data-id="<?= $listing['id']; ?>"> <button class="glyphicon glyphicon-trash delete-btn"></button></a> |
                                                    <a href="view-listing-photos.php?id=<?= $listing['id']; ?>"> <button class="glyphicon glyphicon-picture arrange-btn"></button></a> |
                                                    <a href="arrange-listings.php?id=<?= $listing['sub_category']; ?>"> <button class="glyphicon glyphicon-random arrange-btn"></button></a>

                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <b style="padding-left: 15px;">No any listings.</b>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Manage brand -->

        </div>
    </section>

    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.js"></script>
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="plugins/node-waves/waves.js"></script>
    <script src="js/admin.js"></script>
    <script src="js/jm.spinner.js" type="text/javascript"></script>
    <script src="plugins/sweetalert/sweetalert.min.js"></script>
    <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <script src="js/pages/ui/dialogs.js"></script>
    <script src="delete/js/listing.js" type="text/javascript"></script>
    <script src="js/listing.js" type="text/javascript"></script>
    <script src="js/city.js" type="text/javascript"></script>
    <script src="tinymce/js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: "#description",
            // ===========================================
            // INCLUDE THE PLUGIN
            // ===========================================

            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            // ===========================================
            // PUT PLUGIN'S BUTTON on the toolbar
            // ===========================================

            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
            // ===========================================
            // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
            // ===========================================

            relative_urls: false

        });
    </script>
</body>

</html>