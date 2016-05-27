<?php
include "../library/MysqlUtil.php";
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
// 数据库配置数组
$conf = array(
    'host' => 'localhost',
    'port' => '3306',
    'user' => 'root',
    'password' => 'zh7359431',
    'db_name' => 'randy_db'
);

// 面向对象编程
echo "面向对象：<br>";
$utilObj = new MysqlUtil($conf);
$field = $utilObj->_tbFields("persons");
var_dump($field);