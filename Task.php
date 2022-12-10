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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
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
                <select name="" id="" class="sort">
                    <option value="" class="option-sort"></option>
                    <option value="" class="option-sort"></option>
                    <option value="" class="option-sort"></option>
                    <option value="" class="option-sort"></option>
                </select>
                <select name="" id="" class="sort"></select>
                <select name="" id="" class="sort"></select>
                <select name="" id="" class="sort"></select>
            </div>
            <form action="deleteTask.php" method="POST">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Mô tả</th>
                            <th>Thời gian</th>
                            <th>Tên nhân viên</th>
                            <th>Khu vực/MCP_ID</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * from task_collector union select * from task_janitor order by time";
                        $result = mysqli_query($conn, $query);
                        while ($r = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $r['id']; ?></td>
                                <td><?php echo $r['description']; ?></td>
                                <td><?php echo $r['time']; ?></td>
                                <td><?php echo $r['emp_username']; ?></td>
                                <td><?php echo $r['mcp_id']; ?></td>
                                <td>
                                    <!-- <a href="editTask.php?ID=<?php echo $r['id']; ?>"  class="btn btn-primary">Sửa</a> -->
                                    <form class="edit" action="" method="GET">
                                        <!-- <div style="display: none;" value="<?php //echo $r['id']
                                                                                ?>" name="editTask" id="editTask">abc</div> -->
                                        <button type="submit" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Sửa</button>
                                        <!-- The Modal -->
                                        <div class="modal" id="myModal">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Modal Heading</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <?php
                                                            echo 123;
                                                        ?>
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
        </div>
        </form>
        <a name="ID" href="deleteTask.php?ID=<?php echo $r['id']; ?>" onclick="return confirm('Bạn có muốn xóa nhiệm vụ này?')" class="btn btn-danger">Xóa</a>
        </td>
        </tr>
    <?php
                        }
    ?>
    </tbody>
    </table>
    </form>
    </div>
    </div>
</body>


</html>