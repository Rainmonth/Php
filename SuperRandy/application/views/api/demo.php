<!DOCTYPE html>
<html>
<head>
    <title>Api Demo演示页面</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>

<div class="api_container">
    <h3>注册</h3>
    <form name="" method="POST" action="http://localhost/Php/SuperRandy/index.php/api/User/register">
        <p>手机号 : <input type="text" name="username" value=""/></p>
        <p>密码 : <input type="password" name="psw" value=""/></p>
        <p><input type="submit" name="" value="立即注册"/></p>
    </form>
</div>

<div class="api_container">
    <h3>登录</h3>
    <form name="" method="POST" action="http://localhost/Php/SuperRandy/index.php/api/User/login">
        <p>手机号 : <input type="text" name="username" value=""/></p>
        <p>密码 : <input type="password" name="psw" value=""/></p>
        <p><input type="submit" name="" value="立即登录"/></p>
    </form>
</div>
<div class="api_container">
    <h3>获取用户信息</h3>
    <form name="" method="POST" action="http://localhost/Php/SuperRandy/index.php/api/User/getUserInfo">
        <p>id : <input type="text" name="username" value=""/></p>
        <p><input type="submit" name="" value="立即登录"/></p>
    </form>
</div>

<div class="api_container">
    <h3>删除用户信息</h3>
    <form name="" method="POST" action="http://localhost/Php/SuperRandy/index.php/api/User/deleteUserInfo">
        <p>id : <input type="text" name="id" value=""/></p>
        <p><input type="submit" name="" value="删除用户"/></p>
    </form>
</div>

</body>
</html>
