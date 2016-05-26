<?php
/**
 * Created by PhpStorm.
 * User: Randy
 * Date: 2016/5/20
 * Time: 10:34
 */
/**进行数据库连接时，要注意以下配置：
 * 1、php.ini中的extension_dir 对应的路径要采用绝对路径；
 * 2、要取消extension=php_mysql.dll和extension=php_mysqli.dll之前的注释
 * 3、libmysql.dll文件需要加入到System32文件夹中
 * 4、要重启Apache服务器
 */
# 1、连接数据库
$con = mysqli_connect();
if (!$con) {
    die('Could not connect' . mysqli_error($con)) . "<br>";
} else {
    echo "Connect success，Congratulations！.<br>";
}
# 2、创建数据库
if (mysqli_query($con, "create database if not exists randy_db")) {
    echo "Database created<br>";
} else {
    echo "Error creating database: " . mysqli_error($con) . "<br>";
}
# 3、创建数据表
mysqli_select_db($con, "randy_db");
$sql = "create table IF NOT EXISTS persons (
FirstName VARCHAR (15),
LastName VARCHAR (15),
Age INT 
)";
if (mysqli_query($con, $sql)) {
    echo "Table created<br>";
} else {
    echo "Error creating table:" . mysqli_error($con) . "<br>";
}

mysqli_close($con);