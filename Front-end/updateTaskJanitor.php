<?php
$id=$_POST['id'];
$description=$_POST['des'];
$time=$_POST['time'];
$emp_username=$_POST['empName'];
$area=$_POST['area'];
require_once 'connection.php';
$status="SELECT `status` from `employee` where `employee`.`username` = '$emp_username'";
$result=mysqli_query($conn,$status);
$r=mysqli_fetch_array($result);
if ($r['status']=='assigned') echo '<script> alert("Nhân viên này đã được giao nhiệm vụ!"); window.location.replace("Task.php?sort=id&search=");</script>';
else 
{
    $sql="UPDATE `employee` set `status`='assigned' where `employee`.`username` = '$emp_username'";
    mysqli_query($conn,$sql);
    $sql="UPDATE `task_janitor` set `emp_username`='$emp_username' where `task_janitor`.`id` = '$id'";
    mysqli_query($conn,$sql);
    $sql="UPDATE `task_janitor` set `area`='$area' where `task_janitor`.`id` = '$id'";
    mysqli_query($conn,$sql);
}
header("location: Task.php?sort=id&search=");
?>