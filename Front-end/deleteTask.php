<?php
    $delete = $_GET['ID'];
    if($delete[0]=='1'){
        $deleteTask="DELETE from task_collector where id='$delete'";
    }else{
        $deleteTask="DELETE from task_janitor where id='$delete'";
    }
    require_once 'connection.php';
    mysqli_query($conn,$deleteTask);
    header("location: Task.php?sort=id&search=");
?>