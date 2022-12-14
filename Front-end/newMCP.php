<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCP mới</title>
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
    $capacity = $_POST['capacity'];
    $current = $_POST['current'];
    $location = $_POST['location'];
    $latitude = $_POST['latitude'];
    $longtitude = $_POST['longtitude'];
    if ($current/$capacity>=0.95) $status='full';
    else $status='available';
    $query1 = "INSERT INTO `mcp` (`capacity`, `current`, `status`,`location`, `latitude`, `longtitude`) VALUES ('$capacity', '$current', '$status', '$location', '$latitude', '$longtitude')";
    if (mysqli_query($conn, $query1)) echo '<script>alert("Thêm MCP thành công!")</script>';
    header('location: manageMCP.php?sort=id&search=');
    ?>
</body>

</html>