<?php
include_once('include/functions.inc.php');

header('Content-Type: application/json');

if (isset($_GET['region'])) {
    $region = $_GET['region'];
    $departements = getDepartementsParRegion($region);
    echo json_encode($departements);
} else {
    echo json_encode([]); 
}
?>
