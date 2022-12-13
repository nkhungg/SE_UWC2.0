<?php
    $edit= $_POST['old_username'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $status = $_POST['status'];
    $phone_num = $_POST['phone_num'];
    require_once 'connection.php';
    if($username!=$edit){
        $query2 = "DELETE from `employee` where username = '$edit'";
        $query1 = "INSERT INTO `employee` VALUES ('$username', '$password','$name', '$role','$status', '$email', '$phone_num')";
        mysqli_query($conn,$query2);
        mysqli_query($conn,$query1);
    }else{
        $query1 = "UPDATE `employee` SET `password` = '$password',`name`='$name', `role` = '$role', `status`='$status',`email`= '$email',`phone_num`= '$phone_num' where username='$username'";
        mysqli_query($conn,$query1);
    };
    header('location: employee.php?sort=username&search=');
?>