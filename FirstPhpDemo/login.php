<!DOCTYPE html>
<!-- saved from url=(0041)http://passport.jikexueyuan.com/sso/login -->
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>登陆页面</title>
    <link rel="stylesheet" type="text/css" href="css/passport.min.css">
</head>

<body>
<div class="passport-wrapper">
    <div class="passport-sign">
        <div class="main-form main-form-sign">
            <div class="passport-tab" id="login-tabs">
                <!-- form -->
                <form class="passport-form passport-form-sign" id="login-form"
                      action="LoginDemo/check.php" method="post">

                    <div class="form-item">
                        <div class="form-cont">
                            <input type="text" name="uname" class="passport-txt xl w-full" tabindex="1"
                                   placeholder="手机 / 用户名 / 邮箱" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-item">
                        <div class="form-cont">
                            <input type="password" name="password" class="passport-txt xl w-full"
                                   tabindex="2" placeholder="输入6~32位密码" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-item">
                        <div class="form-cont">
                            <button type="button" id="login" class="passport-btn passport-btn-def xl w-full"
                                    tabindex="4" jktag="0001|0.1|91038" href="javascript:;">登录
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>