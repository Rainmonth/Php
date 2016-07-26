<?php
include '../../library/init.php';
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
$field = $sqlObj->_tbFields("user");
var_dump($field);