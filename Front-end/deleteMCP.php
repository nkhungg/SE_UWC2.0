<?php
$id = $_GET['ID'];
require_once 'connection.php';
$del= "DELETE from `mcp` where `id`='$id'";
mysqli_query($conn,$del);
header('location: manageMCP.php?sort=id&search=');
?>