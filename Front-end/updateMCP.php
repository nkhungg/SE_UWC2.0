<?php
    $id= $_POST['id'];
    $capacity = $_POST['capacity'];
    $current = $_POST['current'];
    $status = $_POST['status'];
    $location = $_POST['location'];
    $latitude = $_POST['latitude'];
    $longtitude = $_POST['longtitude'];
    require_once 'connection.php';
    $query1 = "UPDATE `mcp` SET `capacity` = '$capacity',`current`='$current', `status` = '$status', `location`='$location',`latitude`= '$latitude',`longtitude`= '$longtitude' where `id`='$id'";
    mysqli_query($conn,$query1);
    if ($current/$capacity>=0.95 && $status='available')
    {
        $query2="UPDATE `mcp` set `status`='full' where `id`='$id'";
        mysqli_query($conn,$query2);
    }
    if ($current/$capacity<0.95 && $status='full')
    {
        $query3="UPDATE `mcp` set `status`='available' where `id`='$id'";
        mysqli_query($conn,$query3);
    }
    header('location: manageMCP.php?sort=ID&search=');
?>