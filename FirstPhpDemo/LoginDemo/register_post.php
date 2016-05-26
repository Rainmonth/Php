<?php
require_once 'mysql_connect.php';
$name = $_POST['name'];
$password = $_POST['password'];
$pwd_again = $_POST['pwd_again'];
if ($name == "" || $password == "") {
    echo "用户名或者密码不能为空";
} else {
    if ($password != $pwd_again) {
        echo "两次输入的密码不一致,请重新输入！";
        echo "<a href='register.php'>重新输入</a>";
    } else {
        $sql = "insert into user values('105','$name','$password')";
        $result = mysqli_query($db, $sql);
        if (!$result) {
            echo "注册不成功！";
            echo "<a href='register.php'>返回</a>";
        } else {
            echo "<script type='text/javascript'>location='huanying.html';</script>";
        }
    }
}