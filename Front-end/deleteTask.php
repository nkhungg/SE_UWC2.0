<?php
    $delete = $_GET['ID'];
    if($delete[0]=='1'){
        $updateEmp = "UPDATE `employee` set `status` = 'unassigned' where `employee`.`username` in (select emp_username from `task_collector-collector` where id = '$delete')";
        $deleteTask="DELETE from `task_collector-info` where id='$delete'";
    }else{
        $updateEmp = "UPDATE `employee` set `status` = 'unassigned' where `employee`.`username` in (select emp_username from `task_janitor` where id = '$delete')";
        $deleteTask="DELETE from task_janitor where id='$delete'";
    }
    require_once 'connection.php';
    mysqli_query($conn,$updateEmp);
    mysqli_query($conn,$deleteTask);
    header("location: Task.php?sort=id&search=");
?>