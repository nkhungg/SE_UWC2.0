<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
include "connect_db.php";
?>

<body>
    <?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone_num = $_POST['phone_num'];
        $query1 = "INSERT INTO `employee` VALUES ('$username', '$password','$name', '$role','unassigned', '$email', '$phone_num')";
    if (mysqli_query($connect, $query1)) echo '<script>alert("Thêm nhiệm vụ thành công!")</script>';
    else echo 'Không thể thêm nhiệm vụ!' . '<br>' . mysqli_error($connect);
    header('location: employee.php?sort=username&search=');
    ?>
</body>

</html>