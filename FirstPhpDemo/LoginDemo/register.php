<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>欢迎您的到来</title>
</head>
<style type="text/css">
    .div {
        height: 1000px;
        width: 700px;
        text-align: center;
        margin: 40px;

    }

    .text {
        font-size: 20px;
        margin: 20px;

    }

    .button {
        font-size: 10px;

    }

</style>
<body>
<h1>注册页面</h1>
<form method="post" action="register_post.php">
    <div class="div">
        <div class="text">
            用户名<input type="text" name="name"></div>
        <div class="text">
            密码:<input type="password" name="password"></div>
        <div class="text">
            再次输入密码：<input type="password" name="pwd_again"></div>

        <input type="submit" value="提交">
        <input type="reset" value="清除">


    </div>

</form>
</body>
</html>