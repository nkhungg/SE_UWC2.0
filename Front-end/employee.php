<?php
require_once 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhân viên</title>
    <link rel="stylesheet" type="text/css" href="./css/employee.css    ">
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
                    <a href="Task.php?sort=id&search=">
                        Nhiệm vụ
                    </a>
                </li>
                <li class="employee select">
                    <i class="ti-user"></i>
                    <a href="employee.php?sort=username&search=">
                        Nhân viên
                    </a>
                </li>
                <li class="message">
                    <i class="ti-comments"></i>
                    <a href="chat.php">
                        Tin nhắn
                    </a>
                </li>
                <li class="manage">
                    <i class="ti-notepad"></i>
                    <a href="manage.php">
                        Quản lý
                    </a>
                </li>
                <li class="info">
                    <i class="ti-id-badge"></i>
                    <a href="info.php">
                        Hồ sơ
                    </a>
                </li>
                <li class="setting">
                    <i class="ti-settings"></i>
                    <a href="setting.php">
                        Cài đặt
                    </a>
                </li>
            </ul>
        </div>
        <div id="topbar">
            <div id="greeting">
                <h2>Quản lý nhân viên</h2>
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
                        <option value="username" <?php if (isset($_GET['sort']) && $_GET['sort'] == "username") {
                                                        echo "selected";
                                                    } ?>>Tên đăng nhập</option>
                        <option value="name" <?php if (isset($_GET['sort']) && $_GET['sort'] == "name") {
                                                    echo "selected";
                                                } ?>>Tên</option>
                        <option value="role" <?php if (isset($_GET['sort']) && $_GET['sort'] == "role") {
                                                    echo "selected";
                                                } ?>>Chức năng</option>
                    </select>
                    <input type="text" class="form-control mb-2 mr-sm-2" name="search">
                    <button type="submit" class="btn btn-primary mb-2">Sort</button>
                </form>
                <div class="button">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalEmp">
                        <i class="ti-plus" style="font-size:12px;padding:2px; font-weight:bold;"></i>
                    </button>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Tên đăng nhập</th>
                        <th>Password</th>
                        <th>Tên</th>
                        <th>Chức năng</th>
                        <th>Tình trạng</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sort_option = $_GET['sort'];
                    $query = "SELECT * from employee order by $sort_option";
                    if (isset($_GET["search"]) && !empty($_GET["search"])) {
                        $sort_option = $_GET['sort'];
                        $str = $_GET['search'];
                        $query = "SELECT * from employee where $sort_option REGEXP '$str+' order by $sort_option";
                    }
                    $result = mysqli_query($conn, $query);
                    while ($r = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?php echo $r['username']; ?></td>
                            <td><?php echo $r['password']; ?></td>
                            <td><?php echo $r['name']; ?></td>
                            <td><?php echo $r['role']; ?></td>
                            <td><?php echo $r['status']; ?></td>
                            <td><?php echo $r['email']; ?></td>
                            <td><?php echo $r['phone_num']; ?></td>
                            <td>
                                <a name="ID" href="editEmp.php?username=<?php echo $r['username']; ?>" class="btn btn-primary">Sửa</a>
                                <a name="ID" href="deleteEmp.php?username=<?php echo $r['username']; ?>" onclick="return confirm('Bạn có muốn xóa?')" class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>

        </div>
        <!-- Tabs content -->

    </div>
    </div>
</body>
<!-- The Modal -->
<div class="modal fade" id="myModalEmp">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Thêm nhân viên mới</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="addEmp.php" method="post">
                    <div class="form-group">
                        <label for="username">Tên đăng nhập</label>
                        <input class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input class="form-control" id="password" name="password" type="password">
                    </div>
                    <div class="form-group">
                        <label for="name">Tên</label>
                        <input class="form-control" id="name" name="name" type="name">
                    </div>
                    <div class="form-group">
                        <label for="role">Chức năng</label>
                        <select name="role" id="role" class="form-control">
                            <option value="collector">collector</option>
                            <option value="janitor">janitor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="phone_num">Số điện thoại</label>
                        <input class="form-control" id="phone_num" name="phone_num">
                    </div>
            </div>
            <button value="1" name="type" id="type" onclick="return confirm('Xác nhận thêm?')" type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </form>
        </div>
    </div>
</div>
</div>

</html>