<?php
require_once 'connection.php';
if (isset($_GET['page']) && $_GET['page'] !== "") {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$record1page = 3;
$previous = $page - 1;
$next = $page + 1;
$offset = ($page - 1) * $record1page;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhiệm vụ</title>
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
                <li class="task select">
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
                <li class="manage">
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
                            <a class="nav-link active" data-toggle="pill" href="#Collector">Collector</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#Janitor">Janitor</a>
                        </li>
                    </ul>
                    <form class="form-inline" action="" method="GET">
                        <select type="sort" class="form-control mb-2 mr-sm-2" id="sort" name="sort">
                            <option value="id" <?php if (isset($_GET['sort']) && $_GET['sort'] == "id") {
                                                    echo "selected";
                                                } ?>>IDNHIEMVU</option>
                            <option value="time" <?php if (isset($_GET['sort']) && $_GET['sort'] == "time") {
                                                        echo "selected";
                                                    } ?>>TIME</option>
                            <option value="emp_username" <?php if (isset($_GET['sort']) && $_GET['sort'] == "emp_username") {
                                                                echo "selected";
                                                            } ?>>NHANVIEN</option>
                        </select>
                        <input type="text" class="form-control mb-2 mr-sm-2" name="search">
                        <button type="submit" class="btn btn-primary mb-2" name="page" value="<?=$page?>">Sort</button>
                    </form>
                </div>
                <div class="button">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalCollector">
                        Collector<i class="ti-plus" style="font-size:12px;padding:2px; font-weight:bold;"></i>
                    </button>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalJanitor">
                        Janitor <i class="ti-plus" style="font-size:12px;padding:2px; font-weight:bold;"></i>
                    </button>
                </div>
            </div>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane container active" id="Collector">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Mô tả</th>
                                <th>Thời gian bắt đầu</th>
                                <th>Thời gian kết thúc</th>
                                <th>Tên nhân viên</th>
                                <th>MCP ID</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sort_option = $_GET['sort'];
                            $query = "SELECT * from `task_collector-info` order by $sort_option limit $offset,$record1page";
                            $result_countC = mysqli_query($conn, "SELECT COUNT(*) as total_records from `task_collector-info`");
                            if (isset($_GET["search"]) && !empty($_GET["search"])) {
                                $sort_option = $_GET['sort'];
                                $str = $_GET['search'];
                                $query = "SELECT * from `task_collector-info` where $sort_option REGEXP '$str+' order by $sort_option limit $offset,$record1page";
                                $result_countC = mysqli_query($conn, "SELECT COUNT(*) as total_records from (SELECT * from `task_collector-info` where $sort_option REGEXP '$str+') as a");
                            }
                            $recordsC = mysqli_fetch_array($result_countC);
                            $total_recordsC = $recordsC['total_records'];
                            $total_pageC = ceil($total_recordsC / $record1page);
                            $result = mysqli_query($conn, $query);
                            while ($r = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $r['id']; ?></td>
                                    <td><?php echo $r['description']; ?></td>
                                    <td><?php echo $r['time']; ?></td>
                                    <td><?php echo $r['endtime']; ?></td>
                                    <td><?php
                                        $id_employee_task = $r['id'];
                                        $emp_name = "SELECT `emp_username` from `task_collector-collector` where id= $id_employee_task";
                                        $emp_count = "SELECT count(`emp_username`) as emp_num from (SELECT `emp_username` from `task_collector-collector` where id= $id_employee_task) as a";
                                        $emp_count_result = mysqli_query($conn, $emp_count);
                                        $emp_count_display = mysqli_fetch_assoc($emp_count_result);
                                        $count = $emp_count_display['emp_num'];
                                        $emp_name_result = mysqli_query($conn, $emp_name);
                                        while ($emp_name_display = mysqli_fetch_assoc($emp_name_result)) {
                                            echo $emp_name_display['emp_username'];
                                            if ($count != 1) {
                                                echo ", ";
                                            }
                                            $count = $count - 1;
                                        }
                                        ?></td>
                                    <td><?php
                                        $id_employee_task = $r['id'];
                                        $mcp_name = "SELECT `mcp_id` from `task_collector-mcp` where id= $id_employee_task";
                                        $mcp_count = "SELECT count(`mcp_id`) as mcp_num from (SELECT `mcp_id` from `task_collector-mcp` where id= $id_employee_task) as a";
                                        $mcp_count_result = mysqli_query($conn, $mcp_count);
                                        $mcp_count_display = mysqli_fetch_assoc($mcp_count_result);
                                        $count = $mcp_count_display['mcp_num'];
                                        $mcp_name_result = mysqli_query($conn, $mcp_name);
                                        while ($mcp_name_display = mysqli_fetch_assoc($mcp_name_result)) {
                                            echo $mcp_name_display['mcp_id'];
                                            if ($count != 1) {
                                                echo ", ";
                                            }
                                            $count = $count - 1;
                                        }
                                        ?></td>
                                    <td>
                                        <a name="ID" href="editTask.php?ID=<?php echo $r['id']; ?>" class="btn btn-primary">Sửa</a>
                                        <a name="ID" href="deleteTask.php?ID=<?php echo $r['id']; ?>" onclick="return confirm('Bạn có muốn xóa nhiệm vụ này')" class="btn btn-danger">Xóa</a>
                                        <a href="showRoute.php?ID=<?php echo $r['id']; ?>" class="btn btn-dark" target=”_blank”>Đường đi</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <ul class="pagination justify-content-center">
                        <li class="page-item <?= ($page <= 1) ? 'disabled' : ''; ?>"><a class="page-link" <?= ($page > 1) ? 'href=?page=' . $previous . '&sort='.$sort_option.'&search=' . $_GET["search"] : ''; ?>>Previous</a></li>

                        <li class="page-item active"><a class="page-link"><?= $page ?></a></li>

                        <li class="page-item <?= ($page >= $total_pageC) ? 'disabled' : ''; ?>"><a class="page-link" <?= ($page < $total_pageC) ? 'href=?page=' . $next . '&sort='.$sort_option.'&search=' . $_GET["search"]: ''; ?>>Next</a></li>
                    </ul>
                    <div>
                        <strong>Page <?php echo $page ?> of <?= $total_pageC ?></strong>
                    </div>
                </div>
                <div class="tab-pane container fade" id="Janitor">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Mô tả</th>
                                <th>Thời gian bắt đầu</th>
                                <th>Thời gian kết thúc</th>
                                <th>Tên nhân viên</th>
                                <th>Khu vực</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sort_option = $_GET['sort'];
                            $query = "SELECT * from task_janitor order by $sort_option limit $record1page";
                            $result_countJ = mysqli_query($conn, "SELECT COUNT(*) as total_records from `task_janitor`");
                            if (isset($_GET["search"]) && !empty($_GET["search"])) {
                                $sort_option = $_GET['sort'];
                                $str = $_GET['search'];
                            }
                            $result = mysqli_query($conn, $query);
                            while ($r = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $r['id']; ?></td>
                                    <td><?php echo $r['description']; ?></td>
                                    <td><?php echo $r['time']; ?></td>
                                    <td><?php echo $r['endtime']; ?></td>
                                    <td><?php echo $r['emp_username']; ?></td>
                                    <td><?php echo $r['area']; ?></td>
                                    <td>
                                        <a name="ID" href="editTask.php?ID=<?php echo $r['id']; ?>" class="btn btn-primary">Sửa</a>
                                        <a name="ID" href="deleteTask.php?ID=<?php echo $r['id']; ?>" onclick="return confirm('Bạn có muốn xóa nhiệm vụ này')" class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled"><a class="page-link">Previous</a></li>

                        <li class="page-item active"><a class="page-link">1</a></li>

                        <li class="page-item disabled"><a class="page-link" >Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Tabs content -->

    </div>
    </div>
</body>
<!-- The Modal -->
<div class="modal fade" id="myModalCollector">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Thêm nhiệm vụ mới</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="newTask.php" method="post">

                    <div class="form-group">
                        <label for="des">Mô tả</label>
                        <div class="container">
                            <input class="form-control" id="description" name="description">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="time">Thời gian</label>
                        <div class="form-group">
                            <?php
                            include "selectTime.php"
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username">Tên nhân viên</label>
                        <div class="form-group">
                            <?php
                            include "selectCollector.php"
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mcp">MCP ID</label>
                        <div class="form-group">
                            <?php
                            include "selectMCP.php"
                            ?>
                        </div>
                    </div>
                    <button value="1" name="type" id="type" onclick="return confirm('Xác nhận thêm nhiệm vụ?')" type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ####################################################### -->
<div class="modal fade" id="myModalJanitor">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Thêm nhiệm vụ mới</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="newTask.php" method="post">
                    <div class="form-group">
                        <label for="des">Mô tả</label>
                        <div class="container">
                            <input class="form-control" id="description" name="description">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="time">Thời gian bắt đầu</label>
                        <!-- <input class="form-control" id="time" name="time"> -->
                        <div class="form-group">
                            <?php
                            include "selectTime.php"
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="state">Tên nhân viên</label>
                        <div class="form-group">
                            <?php
                            include "selectJanitor.php"
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="area">Khu vực</label>
                        <div class="container">
                            <input class="form-control" id="area" name="area">
                        </div>
                    </div>
                    <button value="2" name="type" id="type" onclick="return confirm('Xác nhận thêm nhiệm vụ?')" type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>

</html>