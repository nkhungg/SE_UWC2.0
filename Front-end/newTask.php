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
include "connect_db.php";
?>

<body>
    <?php
    $description = $_POST['description'];
    $time = $_POST['time'];
    $empName = $_POST['empName'];
    $type = $_POST['type'];
    if ($type == "1") {
        $mcpID = $_POST['mcpID'];
        $query1 = "INSERT INTO `task_collector` (`description`, `time`, `emp_username`, `mcp_id`) VALUES ('$description', '$time', '$empName', '$mcpID')";
        $query2 ="UPDATE `employee` set `status`='assigned' where `username`='$empName'";
        echo $query;
    } else {
        $area = $_POST['area'];
        $query1 = "INSERT INTO `task_janitor` (`description`, `time`, `emp_username`, `area`) VALUES ('$description', '$time', '$empName', '$area')";
        $query2 ="UPDATE `employee` set `status`='assigned' where `username`='$empName'";
    }
    if (mysqli_query($connect, $query1) && mysqli_query($connect, $query2)) echo '<script>alert("Thêm nhiệm vụ thành công!")</script>';
    else echo 'Không thể thêm nhiệm vụ!' . '<br>' . mysqli_error($connect);
    header('location: Task.php?sort=id&search=');
    ?>
</body>

</html>