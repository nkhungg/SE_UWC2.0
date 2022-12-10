<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link rel="stylesheet" type="text/css" href="./css/chat.css    ">
    <link rel="stylesheet" type="text/css" href="./assets/font_icon/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
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
                <li class="message select">
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
            <ul class="topbar_list">
                <li class="search">
                    <button>
                        <i class="bi bi-search"></i>
                    </button>
                </li>
                <li class="notify">
                    <button>
                        <i class="bi bi-bell"></i>
                    </button>
                </li>
                <li class="user">
                    <img src="./assets/img/user1.png" alt="">
                </li>
                <li class="role">
                    <p class="role"><b>Quản trị viên</b></p>
                </li>
                <li class="logout">
                    <button>
                        <i class="bi bi-box-arrow-right"></i>
                    </button>
                </li>
            </ul>
            
        </div>
        <div id="chatting">
            <div class="messagelist">
                <div class="search">   
                    <i class="bi bi-search"></i>           
                    <input type="text" placeholder="Tìm kiếm tin nhắn">               
                </div>
                <div class="newchat">
                    <b>Cuộc hội thoại mới</b>
                    <i class="bi bi-pencil-square"></i>
                </div>
                <ul class="chatlist">
                    <a href="#">
                    <li class="block active">
                        <div class="user">
                            <img src="./assets/img/user1.png" class="cover" alt="">
                        </div>
                        <div class="detail">
                            <p class="time">12:20</p>
                            <div class="listhead">
                                <h4>Nguyễn Văn A</h4>
                                <p>Janitor</p>
                            </div>
                            <div class="message_p">
                                <p>Bạn: Chiều nay em nhớ xem chi tiết công việc mới.</p>
                            </div>
                        </div>
                    </li>
                    </a>
                    <a href="#">
                    <li class="block">
                        <div class="user">
                            <img src="./assets/img/user1.png" class="cover" alt="">
                        </div>
                        <div class="detail">
                            <p class="time">9:13</p>
                            <div class="listhead">
                                <h4>Nguyễn Văn B</h4>
                                <p>Collector</p>
                            </div>
                            <div class="message_p">
                                <p>Hôm nay ở Ngã tư Hàng Xanh có thi công anh ơi.</p>
                            </div>
                        </div>
                    </li>
                    </a>
                    <a href="#">
                    <li class="block">
                        <div class="user">
                            <img src="./assets/img/user1.png" class="cover" alt="">
                        </div>
                        <div class="detail">
                            <p class="time">7:30</p>
                            <div class="listhead">
                                <h4>Nguyễn Văn C</h4>
                                <p>Collector</p>
                            </div>
                            <div class="message_p">
                                <p>Ngày mai em nghỉ phép nhé sếp.</p>
                            </div>
                        </div>
                    </li>
                    </a>
                </ul>
            </div>
            <div class="rightside">
                <div class="header">
                    <div class="user">
                        <img src="./assets/img/user1.png" class="cover" alt="">
                    </div>
                    <h1>Nguyễn Văn A</h1>
                    <div class="other_method">
                        <i class="bi bi-telephone-fill"></i>
                        <i class="bi bi-camera-video-fill"></i>
                        <i class="bi bi-info-circle-fill"></i>
                    </div>
                </div>

                <!-- CHAT-BOX -->
                <div class="chatbox">
                    <div class="message my_msg">
                        <p>Chào em <br><span>12:18</span></p>
                    </div>
                    <div class="message friend_msg">
                        <p>Em nghe đây anh<br><span>12:18</span></p>
                    </div>
                    <div class="message friend_msg">
                        <p>Chuyện gì vậy anh <br><span>12:18</span></p>
                    </div>
                    <div class="message my_msg">
                        <p>Anh vừa phân lại công việc <br><span>12:20</span></p>
                    </div>
                    <div class="message my_msg">
                        <p>Chiều nay em nhớ xem chi tiết công việc mới. <br><span>12:20</span></p>
                    </div>
                    
                </div>

                <!-- CHAT INPUT -->
                <form action="#" class="chat_input">
                    
                <!-- <ion-icon name="happy-outline"></ion-icon> -->
                    <input type="text" placeholder="Nhập văn bản">
                    <!-- <i class="bi bi-image"></i> -->
                    <button class="send_message">
                        <i class="bi bi-telegram"></i>
                    </button>
                </form>
            </div>
        </div>
        <div id="analyze"></div>
    </div>
</body>
</html>