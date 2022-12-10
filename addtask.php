<!DOCTYPE html>
<html lang="en">
    <?php
        include "connect_db.php";
    ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CollectorTask</title>
    <link rel="stylesheet" type="text/css" href="./css/addtask.css">
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
    <link href=”https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css” rel=”stylesheet”> 
    <script src=”https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js”></script> 
    <script src=”https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js”></script>
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
                <li class="tasks select">
                    <i class="ti-pencil-alt"></i>
                    <a href="Task.php">
                        Nhiệm vụ
                    </a>
                </li>
                <li class="employee">
                    <i class="ti-user"></i>
                    <a href="index.php">
                        Nhân viên
                    </a>
                </li>
                <li class="message">
                    <i class="ti-comments"></i>
                    <a href="index.php">
                        Tin nhắn
                    </a>
                </li>
                <li class="manage">
                    <i class="ti-notepad"></i>
                    <a href="index.php">
                        Quản lý
                    </a>
                </li>
                <li class="info">
                    <i class="ti-id-badge"></i>
                    <a href="index.php">
                        Hồ sơ
                    </a>
                </li>
                <li class="setting">
                    <i class="ti-settings"></i>
                    <a href="index.php">
                        Cài đặt
                    </a>
                </li>
            </ul>
        </div>
        <div id="topbar">
            <div id="greeting">
                <h2>Tạo nhiệm vụ</h2>
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
        <form id="content" action="newTask.php" method="post">
            <div class="content1">
                <div class="description">
                    <label for="">Mô tả</label>
                    <input id="description" name="description" type="text" placeholder="    VD: Chở rác khu vực Bách Khoa - KHTN">
                </div>
                <div class="type">
                    <label for="">Loại</label>
                    <div class="typeDes">
                        Chở rác
                    </div>
                </div>
            </div>
            <div class="content2">
                <div class="employee">
                    <label for="">Nhân viên</label>
                    <div class="employeeList">
                        <?php
                            include "selectEmployee.php"
                        ?>
                    </div>
                </div>
            </div>
            <div class="content3">
                <div class="MCP">
                    <label for="MCPList">MCP</label>
                    <div class="MCPList">
                        <?php
                            include "selectMCP.php";
                        ?>
                    </div>
                </div>
                <div class="time">
                    <label for="">Thời gian</label>
                    <div class="Time">
                        <?php
                            include "selectTime.php"
                        ?>
                    </div>
                </div>
                <input type="submit" class="btnAdd" name="btn-add" value="Tạo nhiệm vụ">
                <div class="btnCancel">
                    <a href="Task.php">Hủy bỏ</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>