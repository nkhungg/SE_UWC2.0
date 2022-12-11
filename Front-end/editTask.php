<?php
    $edit=$_GET['ID'];
    require_once 'connection.php';
    if($edit[0]==1){
        $editEmp="SELECT * from task_collector where id=$edit";
    }else{
        $editEmp="SELECT * from task_janitor where id=$edit";
    }
    $result=mysqli_query($conn,$editEmp);
    $row=mysqli_fetch_assoc($result);
    if($edit[0]==1){
        $area='mcp_id';
    }else{
        $area='area';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhiệm vụ</title>
    <link rel="stylesheet" type="text/css" href="./css/bar.css">
    <link rel="stylesheet" type="text/css" href="./css/editTask.css">
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
                <h2>Sửa nhiệm vụ</h2>
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
        <h3 class="title">ID: <?php echo $edit;?></h3>
        <form action="updateTask.php" method="post">
            <input type="hidden" name="id" value="<?php echo $edit?>" id="">
        <div class="form-group">
            <label for="thoigian">Mô tả</label>
            <input  class="form-control" id="des" name="des" value ="<?php echo $row['description']?>">
        </div>
        <div class="form-group">
            <label for="voucher">Thời gian</label>
            <input class="form-control" id="time" name="time" value ="<?php echo $row['time']?>">
        </div>
        <div class="form-group">
            <label for="state">Tên nhân viên</label>
            <input class="form-control" id="name" name="name" value ="<?php echo $row['emp_username']?>">
        </div><div class="form-group">
            <label for="state">Khu vực / MCP ID</label>
            <input class="form-control" id="area" name="area" value ="<?php echo $row[$area]?>">
        </div>
        <button onclick="return confirm('Bạn muốn lưu thay đổi?')" type="submit" class="btn btn-primary">Submit</button>
        <a href="Task.php?sort=id&search=" class="btn btn-danger">Cancel</a>
        </form>
        </div>
    </div>
    
</body>
</html>
