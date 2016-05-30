<?php
/**
 * Created by PhpStorm.
 * User: Randy
 * Date: 2016/5/27
 * Time: 16:18
 */
header('Content-Type:text/html;charset=utf-8');
include "MysqlUtil.php";

// 数据库配置数组
$conf = array(
    'host' => 'localhost',
    'port' => '3306',
    'user' => 'root',
    'password' => 'zh7359431',
    'db_name' => 'randy_db'
);
$sqlObj = new MysqlUtil($conf);