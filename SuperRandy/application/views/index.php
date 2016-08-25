<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>荏苒追寻</title>
    <link type="text/css" rel="stylesheet" href="assets/css/base.css">
    <style>
        a {
            text-decoration: none;
            color: whitesmoke;
        }

        .header {
            background-color: #1e1e21;
        }

        .header .container{
            width: 900px;
            margin: 0 auto;
        }

        .header .container::after {
            display: block;
            visibility: hidden;
            height: 0;
            clear: both;
            content: ".";
        }

        .header .nav-left {
            float: left;
            margin-left: 10px;
        }

        .header .nav-right {
            float: right;
        }

        .header .nav-right ul li {
            float: left;
            padding: 0 10px;
            margin-left: 10px;
            margin-right: 10px;
            border-radius: .5em;
            border: 2px solid rgba(255, 255, 255, 0.6);
        }

        .footer {
            width: 900px;
            margin: 0 auto;
            display: block;
        }

        .footer .container {
            margin: 0 auto;
        }

        .footer .container ul {
            margin: 0 auto;
            display: block;
        }

        .footer .container ul::after {
            display: block;
            visibility: hidden;
            height: 0;
            clear: both;
            content: ".";
        }

        .footer .container ul li {
            float: left;
            display: block;
            padding: 10px 10px;
            margin: 0 10px;
            align-items: center;
        }

        .footer .container::after {
            display: block;
            visibility: hidden;
            height: 0;
            clear: both;
            content: ".";
        }
    </style>
</head>
<body>

<section class="header">
    <div class="container">
        <div class="nav-left">
            <a href="#"><h1>荏苒追寻</h1></a>
        </div>

        <div class="nav-right">
            <ul>
                <li class="menu-item">
                    <a href="#">
                        记忆
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#">
                        当下
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#">
                        憧憬
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#">
                        漫游
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>

<section class="feature-overview">
    <div class="container">
        <ul class="features">
            <li class="feature">
                <a href="#" rel="external">
                    <img class="screen-shot" src="assets/images/bg.jpg" alt="屏幕截图">
                </a>
                <h2>登录背景页</h2>
                <p>
                    登录背景页面详细说明
                </p>
                <a class="more" href="Welcome/navToApiDemo" rel="external">
                    Api Demo页面
                </a>
            </li>
            <li class="feature">
                <a href="#" rel="external">
                    <img class="screen-shot" src="assets/images/bg.jpg" alt="屏幕截图">
                </a>
                <h2>登录背景页</h2>
                <p>
                    登录背景页面详细说明
                </p>
                <a class="more" href="Welcome/navToApiIndex" rel="external">Api Index页面</a>
            </li>
            <li class="feature">
                <a href="#" rel="external">
                    <img class="screen-shot" src="assets/images/bg.jpg" alt="屏幕截图">
                </a>
                <h2>登录背景页</h2>
                <p>
                    登录背景页面详细说明
                </p>
                <a class="more" href="Welcome/navToApiDemo" rel="external">Api Demo页面</a>
            </li>
            <li class="feature">
                <a href="#" rel="external">
                    <img class="screen-shot" src="assets/images/bg.jpg" alt="屏幕截图">
                </a>
                <h2>登录背景页</h2>
                <p>
                    登录背景页面详细说明
                </p>
                <a class="more" href="Welcome/navToApiDemo" rel="external">Api Demo页面</a></li>
            <li class="feature">
                <a href="#" rel="external">
                    <img class="screen-shot" src="assets/images/bg.jpg" alt="屏幕截图">
                </a>
                <h2>登录背景页</h2>
                <p>
                    登录背景页面详细说明
                </p>
                <a class="more" href="Welcome/navToApiDemo" rel="external">Api Demo页面</a></li>
            <li class="feature">
                <a href="#" rel="external">
                    <img class="screen-shot" src="assets/images/bg.jpg" alt="屏幕截图">
                </a>
                <h2>登录背景页</h2>
                <p>
                    登录背景页面详细说明
                </p>
                <a class="more" href="Welcome/navToApiDemo" rel="external">Api Demo页面</a></li>
        </ul>
    </div>

</section>

<section class="footer">
    <div class="container">
        <ul>
            <li><a href="#">Copyright</a></li>
            <li><a href="#">荏苒小站</a></li>
            <li><a href="#">网站支持</a></li>
            <li><a href="#">免责声明</a></li>
            <li><a href="#">关于</a></li>
        </ul>
    </div>
</section>

</body>
</html>