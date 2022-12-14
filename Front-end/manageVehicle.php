<?php
require_once 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý phương tiện</title>
    <link rel="stylesheet" type="text/css" href="./css/Task.css    ">
    <link rel="stylesheet" type="text/css" href="./css/bar.css    ">
    <link rel="stylesheet" type="text/css" href="./assets/font_icon/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div id="container">
    <div id="navBar">
            <div class="logo">
                <img src="./assets/img/logo.png" alt="logo">
                <p class="title">UWC 2.0</p>
            </div>
            <ul class="navList">
                <li class="main">
                    <i class="ti-book"></i>
                    <a href="index.php">
                        Trang chủ
                    </a>
                </li>
                <li class="task">
                    <i class="ti-pencil-alt"></i>
                    <a href="Task.php?sort=id&search=&page=1">
                        Nhiệm vụ
                    </a>
                </li>
                <li class="employee">
                    <i class="ti-user"></i>
                    <a href="employee.php?sort=username&search=&page=1">
                        Nhân viên
                    </a>
                </li>
                <li class="message">
                    <i class="ti-comments"></i>
                    <a href="chat.php">
                        Tin nhắn
                    </a>
                </li>
                <li class="message">
                    <i class="ti-map"></i>
                    <a href="manageMCP.php?sort=id&search=&page=1">
                        MCP
                    </a>
                </li>
                <li class="manage select">
                    <i class="ti-truck"></i>
                    <a href="manageVehicle.php?sort=id&search=&page=1">
                        Phương tiện
                    </a>
                </li>
                <li class="info">
                    <i class="bi bi-box-arrow-right"></i>
                    <a href="logout.php">
                        Đăng xuất
                    </a>
                </li>
            </ul>
        </div>
        <div id="topbar">
            <div id="greeting">
                <h2>Chào buổi sáng</h2>
                <h4>Hy vọng bạn có một ngày làm việc tốt lành</h4>
            </div>
            <ul class="topbar_list">
                <li class="search">
                    <i class="bi bi-search"></i>
                </li>
                <li class="notify">
                    <i class="bi bi-bell"></i>
                </li>
                <li class="user">
                    <img src="./assets/img/user1.png" alt="">
                </li>
                <li class="role">
                    <p class="role"><b>Quản trị viên</b></p>
                </li>
            </ul>
        </div>
        <div id="content">
            <div class="container">
                <div class="nav_sort">
                    <!-- Nav pills -->
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#Troller">Troller</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#Truck">Truck</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#Assign">Assigned Vehicle</a>
                        </li>
                    </ul>
                    <form class="form-inline" action="" method="GET">
                        <input type="text" class="form-control mb-2 mr-sm-2" name="search">
                        <button type="submit" class="btn btn-primary mb-2">Tìm kiếm</button>
                    </form>
                </div>
                <div class="button">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalTroller">
                        Troller <i class="ti-plus" style="font-size:12px;padding:2px; font-weight:bold;"></i>
                    </button>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalTruck">
                        Truck <i class="ti-plus" style="font-size:12px;padding:2px; font-weight:bold;"></i>
                    </button>
                </div>
            </div>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane container active" id="Troller">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Khu vực</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_GET["search"]) && !empty($_GET["search"])) {
                                $str = $_GET['search'];
                                $query = "SELECT * from `troller` where `troller_id` REGEXP '$str+' order by `troller_id`";
                            } else $query = "SELECT * from `troller` order by `troller_id`";
                            $result = mysqli_query($conn, $query);
                            while ($r = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $r['troller_id']; ?></td>
                                    <td><?php echo $r['area']; ?></td>
                                    <td>
                                        <a name="ID" href="editTroller.php?ID=<?php echo $r['troller_id']; ?>" class="btn btn-primary">Sửa</a>
                                        <a name="ID" href="deleteTroller.php?ID=<?php echo $r['troller_id']; ?>" onclick="return confirm('Bạn có muốn xóa troller này?')" class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane container fade" id="Truck">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nhiên liệu</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_GET["search"]) && !empty($_GET["search"])) {
                                $str = $_GET['search'];
                                $query = "SELECT * from `truck` where `truck_id` REGEXP '$str+' order by `truck_id`";
                            } else $query = "SELECT * from `truck` order by `truck_id`";
                            $result = mysqli_query($conn, $query);
                            while ($r = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $r['truck_id']; ?></td>
                                    <td><?php echo $r['fuel']; ?></td>
                                    <td>
                                        <a name="ID" href="editTruck.php?ID=<?php echo $r['truck_id']; ?>" class="btn btn-primary">Sửa</a>
                                        <a name="ID" href="deleteTruck.php?ID=<?php echo $r['truck_id']; ?>" onclick="return confirm('Bạn có muốn xóa truck này')" class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane container fade" id="Assign">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID phương tiện</th>
                                <th>Nhân viên điều khiển</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_GET["search"]) && !empty($_GET["search"])) {
                                $str = $_GET['search'];
                                $query = "SELECT * from `assign_vehicle` where `vehicle_id` REGEXP '$str+' order by `vehicle_id`";
                            } else $query = "SELECT * from `assign_vehicle` order by `vehicle_id`";
                            $result = mysqli_query($conn, $query);
                            while ($r = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $r['vehicle_id']; ?></td>
                                    <td><?php echo $r['emp_username']; ?></td>
                                    <td>
                                        <a name="ID" href="editAssigned.php?ID=<?php echo $r['vehicle_id']; ?>" class="btn btn-primary">Sửa</a>
                                        <a name="ID" href="deleteAssigned.php?ID=<?php echo $r['vehicle_id']; ?>" onclick="return confirm('Bạn có muốn xóa troller này?')" class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Tabs content -->
    </div>
    </div>
</body>
<!-- The Modal -->
<div class="modal fade" id="myModalTroller">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Thêm troller mới</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="newTroller.php" method="post">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <div class="container">
                            <input class="form-control" id="id" name="id">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="area">Khu vực</label>
                        <div class="container">
                            <input class="form-control" id="area" name="area">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="state">Người điều khiển</label>
                        <div class="form-group">
                            <?php
                            include "selectJanitor.php"
                            ?>
                        </div>
                    </div>
                    <button value="1" name="type" id="type" onclick="return confirm('Xác nhận thêm phương tiện?')" type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ####################################################### -->
<div class="modal fade" id="myModalTruck">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Thêm truck mới</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="newTruck.php" method="post">
                    <div class="form-group">
                        <label for="des">ID</label>
                        <div class="container">
                            <input class="form-control" id="id" name="id">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="des">Nhiên liệu</label>
                        <div class="container">
                            <input class="form-control" id="fuel" name="fuel">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="state">Người điều khiển</label>
                        <div class="form-group">
                            <div class="container">
                                <div class="form-group">
                                    <select name="empName" id="empName" class="post form-control">
                                        <?php
                                        $sql = "SELECT username from employee where employee.username not in (select emp_username from assign_vehicle) and employee.role = 'collector'";
                                        $i = 0;
                                        $empList = array();
                                        if ($result = mysqli_query($conn, $sql)) {
                                            while ($row = mysqli_fetch_array($result)) {
                                                $empList[] = $row['username'];
                                                echo $empList[$i];
                                        ?>
                                                <option><?php echo $empList[$i]; ?></option>
                                        <?php
                                                $i++;
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button value="2" name="type" id="type" onclick="return confirm('Xác nhận thêm phương tiện?')" type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>

</html>