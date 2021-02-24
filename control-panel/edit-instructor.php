<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$INSTRUCTOR = new Instructor($id);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Instructors || Control Panel || Synotec Holdings</title>
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
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Edit Instructor</h2>
                            <ul class="header-dropdown">
                                <li class="">
                                    <a href="manage-instructors.php?id=<?= $INSTRUCTOR->category; ?>">
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
                                            <select class="form-control show-tick place-select1" type="text" id="category" autocomplete="off" name="category">
                                                <?php foreach (InstructorCategory::all() as $key => $category) {
                                                    $selected = '';
                                                    if ($category['id'] == $INSTRUCTOR->category) {
                                                        $selected = 'selected';
                                                    }
                                                ?>
                                                    <option value="<?= $category['id']; ?>" <?= $selected; ?>>
                                                        <?= $category['name']; ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <label class="form-label">Category</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="name" class="form-control" value="<?php echo $INSTRUCTOR->name; ?>" name="name" required="TRUE">
                                            <label class="form-label">Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select class="form-control show-tick place-select1" type="text" id="district" autocomplete="off" name="district">
                                                <?php foreach (District::all() as $key => $disrict) {
                                                    $selected = '';
                                                    if ($disrict['id'] == $INSTRUCTOR->district) {
                                                        $selected = 'selected';
                                                    }
                                                ?>
                                                    <option value="<?= $disrict['id']; ?>" <?= $selected; ?>>
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
                                        <div class="form-line">
                                            <select class="form-control show-tick place-select1" type="text" id="city" autocomplete="off" name="city">
                                                <?php foreach (City::getCitiesByDistrict($INSTRUCTOR->district) as $key => $city) {
                                                    $selected = '';
                                                    if ($city['id'] == $INSTRUCTOR->city) {
                                                        $selected = 'selected';
                                                    }
                                                ?>
                                                    <option value="<?= $city['id']; ?>" <?= $selected; ?>>
                                                        <?= $city['name']; ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <label class="form-label">City</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="phone" class="form-control" value="<?php echo $INSTRUCTOR->phone; ?>" name="phone" required="TRUE">
                                            <label class="form-label">Phone Number</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="email" class="form-control" value="<?php echo $INSTRUCTOR->email; ?>" name="email" required="TRUE">
                                            <label class="form-label">Email</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="file" class="form-control" value="<?php echo $INSTRUCTOR->imageName; ?>" name="image">
                                            <input type="hidden" id="image" class="form-control" value="<?php echo $INSTRUCTOR->imageName; ?>" name="image">
                                            <img src="../upload/instructor/<?php echo $INSTRUCTOR->imageName; ?>" id="image" class="img img-responsive img-thumbnail" style="width: 30%" name="image" alt="old image">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="experience">Experience</label>
                                    <div class="form-line">
                                        <textarea id="experience" name="experience" class="form-control" rows="5"><?php echo $INSTRUCTOR->experience; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="hidden" name="update" value="update" />
                                    <input type="hidden" id="oldImageName" value="<?php echo $INSTRUCTOR->imageName; ?>" name="oldImageName" />
                                    <input type="hidden" id="id" value="<?php echo $INSTRUCTOR->id; ?>" name="id" />
                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect" id="update" value="update">Save Changes</button>
                                </div>
                                <div class="row clearfix"> </div>
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

    <script src="plugins/sweetalert/sweetalert.min.js"></script>
    <script src="tinymce/js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: "#experience",
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
    <script src="js/jm.spinner.js" type="text/javascript"></script>
    <script src="js/instructor.js" type="text/javascript"></script>
    <script src="js/city.js" type="text/javascript"></script>
    <script src="js/sub-category.js" type="text/javascript"></script>
</body>

</html>