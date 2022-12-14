<?php
require_once 'connection.php';
$ID = $_GET['ID'];
$username = $_GET['username'];
$name = $_GET['name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./css/bar.css    ">
    <link rel="stylesheet" type="text/css" href="./css/nhantin.css    ">
    <link rel="stylesheet" type="text/css" href="./assets/font_icon/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<?php
require_once 'connection.php';

?>

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
                <li class="message select">
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
                <h2>Tên: <?= $name ?></h2>
                <h4>Username: <?= $username ?></h4>
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
            <div class="shadow p-4 rounded
    	               d-flex flex-column
    	               mt-2 chat-box">
                <?php
                $sql = "SELECT * from chats where (from_id='BO' and to_id='$username') or (to_id='BO' and from_id='$username')";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['from_id'] == 'BO') {
                ?>
                        <div class="mess">
                            <div class="from p-2 mb-1 border rounded">
                                <?= $row['message'] ?>
                                <small class="d-block" style="font-size:12px">
                                    <?= $row['time'] ?>
                                </small>
                            </div>

                        </div>
                    <?php } else { ?>
                        <div class="mess">
                            <div class="to rounded p-2 mb-1"><?= $row['message'] ?><small class="d-block" style="font-size:12px">
                                    <?= $row['time'] ?>
                                </small></div>

                        </div>
                <?php }
                }
                ?>
            </div>
            <form action="newmess.php" method="POST">
                <input type="hidden" value="<?=$username?>"  name="to_id">
                <input type="hidden" value="<?=$name?>"  name="name">
                <input type="hidden" value="<?=$ID?>"  name="chat_ID">
                <input type="text" placeholder="Nhập tin nhắn ở đây" class="form-control mb-2 mr-sm-2" name="message">
            </form>
        </div>
</body>

</html>