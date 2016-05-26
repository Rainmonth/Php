<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Php Demo</title>
</head>
<body>
<?php
echo "Php中的数据类型：<br>";
echo "字符串：<br>";
$str = "Hello World<br>";
echo $str;
// 单行注释1
# 当行注释2
/**
 * 多行注释
 */

/**
 * 注意：Php中关键词、类和函数对大小写不敏感，但变量对大小写敏感
 */

/**
 * Php中的变量：
 * 1、变量以$开头，其后是变量名称
 * 2、变量名称必须以字符或下划线开头
 * 3、变量名称只能包含大小写字母和下划线
 * 4、变量名称对大小写敏感，如$X和$x是两个不同的变量
 */
echo "整数：<br>";
$str = "Hello World<br>";
echo $str;

$itemsArray = array("item0", "item1", "item2", "item3");
echo "The itemsArray items are " . $itemsArray[0] . " " . $itemsArray[1] . " " . $itemsArray[3] . ".";
echo "<br>";


/**
 * global关键词用于在函数内部访问全局变量
 */
$x = 5; // 全局作用域

function myTest()
{
    global $x;
    $y = 10; // 局部作用域
    echo "<p>测试函数内部的变量：</p>";
    echo "变量 x 是：$x";
    echo "<br>";
    echo "变量 y 是：$y<br>";
    echo "全局变量x是：" . $GLOBALS['x'];
}

myTest();

echo "<p>测试函数之外的变量：</p>";
echo "变量 x 是：$x";
echo "<br>";
echo "变量 y 是：$y<br>";
?>

<?php
echo "整数：<br>";
$x = 1000;
var_dump($x);
echo "<br>";
$x = -12345;
var_dump($x);
echo "<br>";
$x = 0xff;
var_dump($x);
echo "<br>";
$x = 047;
var_dump($x);
echo "<br>";
?>
<?php
echo "浮点数：<br>";
$x = 10.365;
var_dump($x);
echo "<br>";
$x = 2.4e3;
var_dump($x);
echo "<br>";
$x = 8E-5;
var_dump($x);
echo "<br>";
?>

<?php
echo "逻辑：<br>";
$x = true;
$y = false;
var_dump($x);
echo "<br>";
var_dump($y);
echo "<br>";
?>

<?php
echo "数组：<br>";
$cars = array("Volvo", "BMW", "SAAB");
var_dump($cars);
echo "<br>";
?>
<?php
echo "对象（类）：<br>";

class Car
{
    var $color;
    var $price;

    function Car($color = "green", $price = 100000)
    {
        $this->color = $color;
        $this->price = $price;
    }

    function what_color()
    {
        return $this->color;
    }
}

function print_color($obj)
{
    foreach (get_object_vars($obj) as $prop => $var) {
        echo "\t$prop = $var\n";
    }
}

$benz = new Car("White");
print_r(get_object_vars($benz));
echo "benz:Properties\n";
print_color($benz);
echo "<br>";
?>

<?php
echo "NULL：<br>";

$x = "Hello world!";
$x = null;
var_dump($x);
echo "<br>";
?>

<?php
$str = "Hello world!";
echo strlen($str);
echo "<br>";
echo strpos($str, "llo");
echo "<br>"
?>

<?php
define("Domain_Name", "rainmonth.com.cn", false);//大小写敏感
echo Domain_Name . "<br>";
define("DOMAIN_NAME", "rainmonth.com", true);//大小写不敏感
echo Domain_NaMe;
?>
</body>
</html>
