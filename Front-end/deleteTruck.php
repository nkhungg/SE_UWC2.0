<?php
$id = $_GET['ID'];
require_once 'connection.php';
$del= "DELETE from `truck` where `truck_id`='$id'";
mysqli_query($conn,$del);
$del= "DELETE from `vehicle` where `id`='$id'";
mysqli_query($conn,$del);
header('location: manageVehicle.php?sort=id&search=');
?>