<!DOCTYPE html>
<html lang="en">

<body>
<?php
//ob_start();
//echo "Login User Name:" . htmlspecialchars($_POST["name"]) . "<br>";
//echo "Login User Email:" . htmlspecialchars($_POST["email"]);
//ob_end_flush();
$_REQUEST = file_get_contents('php://input');
$_POST = file_get_contents("php://input");
print_r($_POST);
print_r($_REQUEST);
$arr = [];
$arr1 = [];
parse_str($_REQUEST, $arr);
parse_str($_POST, $arr1);
print_r($arr);
print_r($arr1);
echo "<br>";
echo "Login User Name:" . htmlspecialchars($arr["name"]) . "<br>";
echo "Login User Email:" . htmlspecialchars($arr["email"]);
echo "<br>";
echo "Login User Name:" . htmlspecialchars($arr1["name"]) . "<br>";
echo "Login User Email:" . htmlspecialchars($arr1["email"]);
?>
</body>
</html>