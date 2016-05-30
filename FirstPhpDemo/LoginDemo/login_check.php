<?php
require_once("../library/init.php");
$name = $_POST['name'];
$password = $_POST['password'];
if ($name == "") {
    echo "<script type='text/javascript'> alert('请填写用户名');location='login.php';</script>";
} elseif ($password == "") {
    echo "<script type='text/javascript'>alert('请填写密码');location='login.php';</script>";
} else {
    $sql = "select * from user where name = '$name' and password = '$password'";
    $check_query = $sqlObj->doQuery($sql);
    if ($result = mysqli_fetch_array($check_query)) {
        // 登陆成功
        // todo 通过session来保存用户登录的信息
        echo "<script type='text/javascript'>location='huanying.html';</script>";
    } else {
        echo "<script type='text/javascript'>alert('密码错误');location='login.php';</script>";
    }
}