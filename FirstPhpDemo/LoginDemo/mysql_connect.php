<?php
$db = mysqli_connect("localhost") or die("连接数据库失败！");

# 2、创建数据库
if (mysqli_query($db, "create database if not exists randy_db")) {
    echo "Database created<br>";
} else {
    echo "Error creating database: " . mysqli_error($db) . "<br>";
}
# 3、选择数据库，创建数据表
mysqli_select_db($db, "randy_db") or die ("不能连接到user" . mysqli_error($db));
$sql = "create table IF NOT EXISTS user (
            uid VARCHAR (15),
            name VARCHAR (15),
            password VARCHAR (15))";
if (mysqli_query($db, $sql)) {
    echo "Table created<br>";
} else {
    echo "Error creating table:" . mysqli_error($db) . "<br>";
}