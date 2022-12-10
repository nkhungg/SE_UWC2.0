<?php
$id=$_POST['id'];
$description=$_POST['des'];
$time=$_POST['time'];
$emp_username=$_POST['name'];
$area=$_POST['area'];
require_once 'connection.php';
if($id[0]==2){
    $editEmp="UPDATE task_janitor set `description`='$description', `time`='$time', emp_username = '$emp_username',
    area ='$area' where id='$id'";
}else{
    $editEmp="UPDATE task_collector set `description`='$description', `time`='$time', emp_username = '$emp_username',
    mcp_id ='$area' where id='$id'";
}
mysqli_query($conn,$editEmp);
header("location: Task.php");
?>