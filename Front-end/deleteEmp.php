<?php
$username = $_GET['username'];
require_once 'connection.php';
$editEmp = "DELETE from employee where username='$username'";
mysqli_query($conn,$editEmp);
header('location: employee.php?sort=username&search=');
?>