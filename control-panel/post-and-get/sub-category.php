<?php

include_once(dirname(__FILE__) . '/../../class/include.php');

if ($_POST['action'] == 'GETSUBCATSBYCATEGORY') {

    $SUBCAT = new ListingSubCategory(NULL);

    $result = $SUBCAT->getSubCategoriesByCategory($_POST["category"]);

    echo json_encode($result);
    // header('Content-type: application/json');
    exit();
}
?>