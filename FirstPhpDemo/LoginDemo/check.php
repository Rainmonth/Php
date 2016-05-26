<?php
require_once("mysql_connect.php");
$name = $_POST['name'];
$password = $_POST['password'];
if ($name == "") {
    echo "<script type='text/javascript'> alert('请填写用户名');location='login.php';</script>";
} elseif ($password == "") {
    echo "<script type='text/javascript'>alert('请填写密码');location='login.php';</script>";
} else {
    $column = collect_data($db);
    if (($column['name'] == $name) && ($column['password'] == $password)) {
        echo "<script type='text/javascript'>alert('登陆成功');location='huanying.html';</script>";
    } else
        echo "<script type='text/javascript'>alert('密码错误');location='login.php';</script>";
}

function collect_data($link)
{
    $sql = "select * from user";
    $result = mysqli_query($link, $sql);
    $column = mysqli_fetch_array($result);
    return $column;
}