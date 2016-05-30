<?php

/**
 * Created by PhpStorm.
 * User: Randy
 * Date: 2016/5/27
 * Time: 15:37
 * Description:数据库工具类
 *
 */
class MysqlUtil
{
    protected static $_con = null;
    protected $_host = "localhost";
    protected $_user = "root";
    protected $_pass = "zh7359431";
    protected $_dbName = "randy_db";
    protected $_port = "3306";

    public function __construct($conf)
    {
        $this->_host = $conf['host'];
        $this->_user = $conf['user'];
        $this->_pass = $conf['password'];
        $this->_dbName = $conf['db_name'];
        $this->_port = $conf['port'];
        //连接数据库
        if (is_null(self::$_con)) {
            $this->_connect();
        }
    }

    /**
     * 初始化数据库连接对象
     */
    protected function _connect()
    {
        $con = mysqli_connect($this->_host, $this->_user, $this->_pass, $this->_dbName, $this->_port);
        self::$_con = $con;
    }

    /**
     * @param $tbName
     * @return array
     */
    public function _tbFields($tbName)
    {
        $sql = 'SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME="' . $tbName . '" AND TABLE_SCHEMA="' . $this->_dbName . '"';
        $result = mysqli_query(self::$_con, $sql);
        $ret = array();
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            // 想ret数组中添加元素
            $ret[$row["COLUMN_NAME"]] = 1;
        };
        return $ret;
    }

    /**
     * 获取数据库连接对象
     * @return mysqli
     */
    public function get_connection()
    {
        if (self::$_con) {
            return self::$_con;
        } else {
            $con = mysqli_connect($this->_host, $this->_user, $this->_pass, $this->_dbName, $this->_port);
            return $con;
        }
    }


    /**
     * @param $con
     * @param $db_name
     * @return bool
     */
    function create_db($con, $db_name)
    {
        # 2、创建数据库
        if (mysqli_query($con, "create database if not exists" . $db_name)) {
            echo "Database" . $db_name . "created!<br>";
            return true;
        } else {
            echo "Error creating database: " . mysqli_error($con) . "<br>";
            return false;
        }
    }

    public function doQuery($sql = '')
    {
        return mysqli_query(self::$_con, $sql);
    }

    /**
     * 在指定数据库中创建数据表
     * @param $db_name
     * @param $sql
     */
    function create_table_in_db($con, $db_name, $sql)
    {
        mysqli_select_db($con, $db_name);
        if (mysqli_query($con, $sql)) {
            echo "Table created<br>";
        } else {
            echo "Error creating table:" . mysqli_error($con) . "<br>";
        }
    }

    function add_user($con)
    {

    }

    function delete_user($con, $user_name)
    {

    }

    function update_user($con, $table_name, $user_name)
    {

    }

    function get_user($con, $table_name, $user_name)
    {


    }

    /**
     * @param $con
     * @param $table_name
     * @return bool|mysqli_result
     */
    function get_all_records($con, $table_name)
    {
        $sql = "SELECT * FROM " . $table_name;
        return mysqli_query($con, $sql);
    }
}