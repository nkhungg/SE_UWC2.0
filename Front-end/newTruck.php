<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskJanitor</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<?php
include "connection.php";
?>

<body>
    <?php
    $id = $_POST['id'];
    $fuel = $_POST['fuel'];
    $empName = $_POST['empName'];
    $sql="INSERT into vehicle values ('$id', 'truck')";
    mysqli_query($conn, $sql);
    $sql="INSERT into truck values ('$id', '$fuel')";
    mysqli_query($conn, $sql);
    $sql="INSERT into assign_vehicle values ('$empName', '$id')";
    mysqli_query($conn, $sql);
    echo '<script>alert("Thêm troller thành công!")</script>';
    header('location: manageVehicle.php?sort=id&search=&page=1');
    ?>
</body>

</html>