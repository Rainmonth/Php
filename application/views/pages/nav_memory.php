<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>记忆</title>
</head>
<body>
<div style="width: 900px;height: 400px;margin: 0 auto; text-align: center;background-color: #52ffba">

    <form action="" >
        
    </form>
    <input type="button" value="add memory" onclick=""/>
    <input type="button" value="delete memory" onclick=""/>

    <div>
        <?php
        if (isset($memory_list) && $memory_list) {
            foreach ($memory_list as $r):?>
                <li>
                    <a href="https://www.baidu.com">
                        <?php echo $r['title']; ?>
                    </a>
                </li>
            <?php endforeach;
        }
        ?>
    </div>
</div>
</body>
</html>