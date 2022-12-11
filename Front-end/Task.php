<?php
    require_once 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhiệm vụ</title>
    <link rel="stylesheet" type="text/css" href="./css/Task.css    ">
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
                    <a href="index.html">
                    Trang chủ
                    </a>
                </li>
                <li class="task select">
                    <i class="ti-pencil-alt"></i>
                    <a href="Task.html">
                        Nhiệm vụ
                    </a>
                </li>
                <li class="employee">
                    <i class="ti-user"></i>
                    <a href="index.html">
                        Nhân viên
                    </a>
                </li>
                <li class="message">
                    <i class="ti-comments"></i>
                    <a href="index.html">
                        Tin nhắn
                    </a>
                </li>
                <li class="manage">
                    <i class="ti-notepad"></i>
                    <a href="index.html">
                        Quản lý
                    </a>
                </li>
                <li class="info">
                    <i class="ti-id-badge"></i>
                    <a href="index.html">
                        Hồ sơ
                    </a>
                </li>
                <li class="setting">
                    <i class="ti-settings"></i>
                    <a href="index.html">
                        Cài đặt
                    </a>
                </li>
            </ul>
        </div>
        <div id="topbar">
            <div id="greeting">
                <h2>Quản lý nhiệm vụ</h2>
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
                <li class="logout">
                    <i class="bi bi-box-arrow-right"></i>
                </li>
            </ul>
            
        </div>
        <div id="content">
            <div class="container">
                <form class="form-inline" action="" method="GET">
                <select type="email" class="form-control mb-2 mr-sm-2" placeholder="Enter email" id="sort" name="sort">
                        <option value="id" <?php if(isset($_GET['sort']) && $_GET['sort'] == "id"){echo "selected";}?> >IDNHIEMVU</option>
                        <option value="time" <?php if(isset($_GET['sort']) && $_GET['sort'] == "time"){echo "selected";}?> >TIME</option>
                        <option value="emp_username" <?php if(isset($_GET['sort']) && $_GET['sort'] == "emp_username"){echo "selected";}?> >NHANVIEN</option>
                    </select>
                    <input type="text" class="form-control mb-2 mr-sm-2" name="search">
                    <button type="submit" class="btn btn-primary mb-2">Sort</button>
                </form>
                <div class="button">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalCollector">
                    Collector <i class="ti-plus" style="font-size:12px;padding:2px; font-weight:bold;"></i>
                    </button>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalJanitor">
                    Janitor <i class="ti-plus" style="font-size:12px;padding:2px; font-weight:bold;"></i>
                    </button>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Mô tả</th>
                    <th>Thời gian bắt đầu</th>
                    <th>Thời gian kết thúc</th>
                    <th>Tên nhân viên</th>
                    <th>Khu vực/MCP_ID</th>
                    <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sort_option=$_GET['sort'];
                $query = "SELECT * from task_collector union select * from task_janitor order by $sort_option";
                if(isset($_GET["search"]) && !empty($_GET["search"])){
                    $sort_option = $_GET['sort'];
                    $str=$_GET['search'];
                    $query = "SELECT * from (SELECT * from task_collector union all select * from task_janitor) as something where $sort_option REGEXP '$str+' order by $sort_option";
                }
                $result = mysqli_query($conn,$query);
                while($r=mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                    <td><?php echo $r['id']; ?></td>
                    <td><?php echo $r['description']; ?></td>
                    <td><?php echo $r['time']; ?></td>
                    <td><?php echo $r['endtime']; ?></td>
                    <td><?php echo $r['emp_username']; ?></td>
                    <td><?php echo $r['mcp_id']; ?></td>
                    <td>
                    <a name="ID" href="editTask.php?ID=<?php echo $r['id'];?>"  class="btn btn-primary">Sửa</a>
                        <a name="ID" href="deleteTask.php?ID=<?php echo $r['id'];?>" onclick="return confirm('Bạn có muốn xóa hóa đơn này')" class="btn btn-danger">Xóa</a>
                    </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
            <?php
            ?>
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
                            <label for="thoigian">Mô tả</label>
                            <div class="container">
                            <input class="form-control" id="description" name="description">
                            </div>
                        </div>
                    <div class="form-group">
                        <label for="voucher">Thời gian</label>
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
                            include "selectCollector.php"
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="state">MCP ID</label>
                        <div class="form-group">
                            <?php
                            include "selectMCP.php"
                            ?>
                        </div>
                    </div>
                    <button value="1" name="type" id="type"  onclick="return confirm('Xác nhận thêm nhiệm vụ?')" type="submit" class="btn btn-primary">Submit</button>
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
                            <label for="thoigian">Mô tả</label>
                            <div class="container">
                            <input class="form-control" id="description" name="description">
                            </div>
                        </div>
                    <div class="form-group">
                        <label for="voucher">Thời gian bắt đầu</label>
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
