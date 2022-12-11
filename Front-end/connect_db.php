<?php
    $hostName="localhost";
    $username="root";
    $password="";
    $databaseName="se_asm";
    $connect=mysqli_connect($hostName, $username, $password, $databaseName);
    if (!$connect)
    {
        echo '<script>alert("Connection To Database Failed")</script>';
    }
?>