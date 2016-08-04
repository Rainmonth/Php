<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>

    <style type="text/css">

        ::selection {
            background-color: #00FF00;
            color: white;
        }

        ::-moz-selection {
            background-color: #808000;
            color: white;
        }

        body {
            background-color: #fff;
            margin: 40px;
            font: 13px/20px normal Helvetica, Arial, sans-serif;
            color: #4F5155;
        }

        h1 {
            color: #444;
            background-color: transparent;
            border-bottom: 1px solid #D0D0D0;
            font-size: 19px;
            font-weight: normal;
            margin: 0 0 14px 0;
            padding: 14px 15px 10px 15px;
        }

        p.content {
            text-align: center;
            font-size: 16px;
            padding: 0 10px 0 10px;

        }

        p.footer {
            text-align: right;
            font-size: 11px;
            border-top: 1px solid #D0D0D0;
            line-height: 32px;
            padding: 0 10px 0 10px;
            margin: 20px 0 0 0;
        }

        #container {
            margin: 10px;
            border: 1px solid #D0D0D0;
            box-shadow: 0 0 8px #D0D0D0;
        }
    </style>
</head>
<body>

<div id="container">
    <h1>欢迎来到rainmonth.com</h1>

    <p class="content">
        网站主题内容
    </p>
    <p class="content">
        <a href="http://localhost/Php/SuperRandy/Welcome/navToApiDemo">Api Demo页面</a>
    </p>
    <p class="content">
        <a href="http://localhost/Php/SuperRandy/Welcome/navToApiIndex">Api Index页面</a>
    </p>
    <p class="content">
        <a href="http://localhost/Php/SuperRandy/Welcome/navToApiIndex">Api Index页面</a>
    </p>
    <p class="footer">Page rendered in <strong>{elapsed_time}</strong>
        seconds. <?php echo (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
    </p>
</div>

</body>
</html>