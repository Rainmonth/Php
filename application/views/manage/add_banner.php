<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加banner</title>
    <style type="text/css">

        input[type="text"],
        input[type="password"],
        input[type="email"],
        {
            -moz-appearance: none;
            -webkit-appearance: none;
            -ms-appearance: none;
            appearance: none;
            -moz-transform: scale(1);
            -webkit-transform: scale(1);
            -ms-transform: scale(1);
            transform: scale(1);
            -moz-transition: border-color 0.2s ease, background-color 0.2s ease;
            -webkit-transition: border-color 0.2s ease, background-color 0.2s ease;
            -ms-transition: border-color 0.2s ease, background-color 0.2s ease;
            transition: border-color 0.2s ease, background-color 0.2s ease;
            background-color: transparent;
            border-radius: 6px;
            border: solid 2px rgba(255, 255, 255, 0.35);
            display: block;
            outline: 0;
            padding: 0 1em;
            text-decoration: none;
            width: 100%;
            box-shadow: none;
            height: 2.75em;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="email"]:focus,
        {
            -moz-animation: focus 0.1s;
            -webkit-animation: focus 0.1s;
            -ms-animation: focus 0.1s;
            animation: focus 0.1s;
            background-color: rgba(255, 255, 255, 0.125);
            border-color: #1cb495;
        }

    </style>
</head>
<body>
<h1>Banner</h1>
<h2>增加banner</h2>
<form id="add-banner-form" method="post" action="#">
    <input type="text" name="type" id="type" placeholder="请输入banner类型"/>
    <input type="text" name="title" id="title" placeholder="请输入banner标题"/>
    <input type="text" name="thumb_url" id="thumb_url" placeholder="请输入banner活动 thumb url"/>
    <input type="text" name="url" id="url" placeholder="请输入banner活动 url"/>
    <input type="submit" value="添加"/>
</form>

<h2>删除banner</h2>
<form id="add-banner-form" method="post" action="#">
    <input type="text" name="banner_id" id="banner_id" placeholder="请输入banner id"/>
    <input type="submit" value="删除"/>
</form>
<h2>更新banner</h2>
<form id="update-banner-form" method="post" action="#">
    <input type="text" name="banner_id" id="banner_id" placeholder="请输入banner id"/>
    <input type="text" name="type" id="type" placeholder="请输入banner类型"/>
    <input type="text" name="title" id="title" placeholder="请输入banner标题"/>
    <input type="text" name="thumb_url" id="thumb_url" placeholder="请输入banner活动 thumb url"/>
    <input type="text" name="url" id="url" placeholder="请输入banner活动 url"/>
    <input type="submit" value="更新"/>
</form>
<div>
    <h2>查询单个banner</h2>
    <form id="add-banner-form" method="post" action="#">
        <input type="text" name="banner_id" id="banner_id" placeholder="请输入banner id"/>
        <input type="submit" value="查询"/>
    </form>
    <div class="query-result">
        <label>查询结果在这显示：</label>
    </div>
</div>

<div>
    <h2>查询多个banner</h2>
    <form id="add-banner-form" method="post" action="#">
        <input type="text" name="type" id="type" placeholder="要查询的banner类型"/>
        <input type="submit" value="查询"/>
    </form>
    <div class="query-result">
        <label>查询结果在这显示：</label>
    </div>
</div>


<h1>添加文章分类</h1>
<form id="add-article-category-form" method="post" action="#">
    <input type="text" name="type" id="type" placeholder="请输入类型名称"/>
    <input type="text" name="title" id="title" placeholder="请输入标题"/>
    <input type="text" name="category_thumb_url" id="category_thumb_url" placeholder="请输入类型thumb url"/>
    <input type="submit" value="添加"/>
</form>


</body>
</html>