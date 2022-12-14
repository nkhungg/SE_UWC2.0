<?php
require_once 'connection.php';
$newmess=$_POST['message'];
$to_id=$_POST['to_id'];
$name=$_POST['name'];
$ID=$_POST['chat_ID'];
$sql="INSERT INTO chats values('','BO','$to_id','$newmess',curtime())";
mysqli_query($conn,$sql);
header("location:nhantin.php?ID=$ID&username=$to_id&name=$name")
?>