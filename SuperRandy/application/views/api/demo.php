<!DOCTYPE html>
<html>
<head>
    <title>Api Demo演示页面</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style type="text/css">
        .api_container {
            border: 1px solid gray;
            border-radius: 4px;
            margin-top: 5px;
            margin-bottom: 5px;
            padding: 5px;
        }

        .api_name {
            text-align: left;
            border-bottom: 1px solid gray;
            color: #ff301d;
        }

        .api_parameter {

        }

    </style>
</head>
<body>

<div class="api_container">
    <div class="api_name">注册</div>
    <form name="" method="POST" action="../api/User/register">
        <label>手机号 :<input type="text" name="username" value=""/></label>
        <label>密码 :<input type="password" name="psw" value=""/></label>
        <input type="submit" name="" value="立即注册"/>
    </form>
</div>

<div class="api_container">
    <div class="api_name">登录</div>
    <form name="" method="POST" action="../api/User/login">
        <label>手机号 :<input type="text" name="username" value=""/></label>
        <label>密码 :<input type="password" name="psw" value=""/></label>
        <input type="submit" name="" value="立即登录"/>
    </form>
</div>
<div class="api_container">
    <div class="api_name">获取用户信息</div>
    <form name="" method="POST" action="../api/User/getUserInfo">
        <label>id :<input type="text" name="username" value=""/></label>
        <input type="submit" name="" value="立即获取"/>
    </form>
</div>

<div class="api_container">
    <div class="api_name">删除用户信息</div>
    <form name="" method="POST" action="../api/User/deleteUserInfo">
        <label>id :<input type="text" name="id" value=""/></label>
        <input type="submit" name="" value="删除用户"/>
    </form>
</div>

<div class="api_container">
    <div class="api_name">获取用户列表</div>
    <form name="" method="POST" action="../api/User/getUserList">
        <input type="submit" name="" value="获取用户列表"/>
    </form>
</div>

</body>
</html>
