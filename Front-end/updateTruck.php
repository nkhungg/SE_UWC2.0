<?php
    $id= $_POST['id'];
    $fuel=$_POST['fuel'];
    $empName=$_POST['empName'];
    require_once 'connection.php';
    $query1 = "UPDATE `truck` SET `fuel` = '$fuel' where `truck_id`='$id'";
    mysqli_query($conn,$query1);
    $query2 = "SELECT count(DISTINCT if(emp_username='$empName', emp_username, NULL)) as num from assign_vehicle";
    $result = mysqli_query($conn,$query2);
    $r=mysqli_fetch_array($result);
    $count1 = $r['num'];
    $query3 = "SELECT count(DISTINCT if(vehicle_id='$id', vehicle_id, NULL)) as num from assign_vehicle";
    $result = mysqli_query($conn,$query3);
    $r=mysqli_fetch_array($result);
    $count2 = $r['num'];
    if ($count1==0 && $count2==0) 
    {
        $query4 = "INSERT into `assign_vehicle` values ('$empName', '$id')";
        mysqli_query($conn,$query4);
    } else if ($count1==1 && $count2==0) {
        echo '<script>alert("Nhân viên này đã điều khiển phương tiện khác!")</script>';
        } else {
        $query5 = "UPDATE `assign_vehicle` set `emp_username` = '$empName' where `vehicle_id` = '$id'";
        mysqli_query($conn,$query5);
    }
    header('location: manageVehicle.php?sort=ID&search=');
