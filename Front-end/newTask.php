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
    $description = $_POST['description'];
    $time = $_POST['time'];
    $type = $_POST['type'];
    if ($type == "1") {    
        $empNames = $_POST['empNames'];
        $mcpIDs = $_POST['mcpIDs'];
        $query1 = "INSERT INTO `task_collector-info` (`description`, `time`) VALUES ('$description', '$time')";
        mysqli_query($conn, $query1);
        $query = "SELECT `id` from `task_collector-info` where `time`='$time'";
        $result = mysqli_query($conn, $query);
        $r = mysqli_fetch_assoc($result);
        $task_id = $r['id'];
        foreach ($mcpIDs as $mcpID) {
            $query2 = "INSERT INTO `task_collector-mcp` values ('$task_id', '$mcpID')";
            mysqli_query($conn, $query2);
        }
        foreach ($empNames as $empName) {
            $query3 = "INSERT INTO `task_collector-collector` values ('$task_id', '$empName')";
            mysqli_query($conn, $query3);
            $query4 = "UPDATE `employee` set `status`='assigned' where `username`='$empName'";
            mysqli_query($conn, $query4);
        }
    } else {
        $empName = $_POST['empName'];
        $area = $_POST['area'];
        $query1 = "INSERT INTO `task_janitor` (`description`, `time`, `emp_username`, `area`) VALUES ('$description', '$time', '$empName', '$area')";
        $query2 = "UPDATE `employee` set `status`='assigned' where `username`='$empName'";
        mysqli_query($conn, $query1);
        mysqli_query($conn, $query2);
    }
    echo '<script>alert("Thêm nhiệm vụ thành công!")</script>';
    header('location: Task.php?sort=id&search=');
    ?>
</body>

</html>