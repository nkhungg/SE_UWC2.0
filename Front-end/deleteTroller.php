<?php
$id = $_GET['ID'];
require_once 'connection.php';
$del= "DELETE from `troller` where `troller_id`='$id'";
mysqli_query($conn,$del);
header('location: manageVehicle.php?sort=id&search=');
?>