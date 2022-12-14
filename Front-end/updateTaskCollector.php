<?php
$id=$_POST['id'];
$description=$_POST['des'];
$time=$_POST['time'];
$empNames=$_POST['empNames'];
$mcpIDs=$_POST['mcpIDs'];
require_once 'connection.php';
$query = "UPDATE `task_collector-info` SET `description`='$description', `time`='$time', `endtime`=default where `id`='$id'";
mysqli_query($conn, $query);
$query = "UPDATE `employee` set `status`='unassigned' where `employee`.`username` in (select `emp_username` from `task_collector-collector` where `id`='$id')";
mysqli_query($conn, $query);
$query = "DELETE from `task_collector-collector` where `id`='$id'";
mysqli_query($conn, $query);
$query = "DELETE from `task_collector-mcp` where `id`='$id'";
mysqli_query($conn, $query);
foreach ($empNames as $empName) {
    $query = "INSERT INTO `task_collector-collector` values ('$id', '$empName')";
    mysqli_query($conn, $query);
    $query = "UPDATE `employee` set `status`='assigned' where `username`='$empName'";
    mysqli_query($conn, $query);
}
foreach ($mcpIDs as $mcpID) {
    $query = "INSERT INTO `task_collector-mcp` values ('$id', '$mcpID')";
    mysqli_query($conn, $query);
}
        // $result = mysqli_query($conn, $query);
        // $r = mysqli_fetch_assoc($result);
        // $task_id = $r['id'];
        // foreach ($mcpIDs as $mcpID) {
        //     $query2 = "INSERT INTO `task_collector-mcp` values ('$task_id', '$mcpID')";
        //     mysqli_query($conn, $query2);
        // }
        // foreach ($empNames as $empName) {
        //     $query3 = "INSERT INTO `task_collector-collector` values ('$task_id', '$empName')";
        //     mysqli_query($conn, $query3);
        //     $query4 = "UPDATE `employee` set `status`='assigned' where `username`='$empName'";
        //     mysqli_query($conn, $query4);
        // }
header("location: Task.php?sort=id&search=");
