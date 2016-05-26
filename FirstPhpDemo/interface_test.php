<?php
//避免输出乱码
header('Content-Type:text/html;charset=utf-8');
$output = array();
$a = @$_GET['a'] ? $_GET['a'] : '';
$uid = @$_GET['uid'] ? $_GET['uid'] : 0;
if (empty($a)) {
    $output = array('data' => null, 'info' => '请求地址为空', 'code' => 201);
    exit(json_encode($output, JSON_UNESCAPED_UNICODE));
}

// get_users接口
if ($a == 'get_users') {
    //检查用户
    if ($uid == 0) {
        $output = array('data' => NULL, 'info' => '用户Uid为空!', 'code' => -401);
        exit(json_encode($output, JSON_UNESCAPED_UNICODE));
    }
    // todo 查询数据库相应表中uid = 10001的记录
    $sql = "select * from table users where uid == " . $uid;
//    mysqli_query(, )
    /**
     *
     * 登陆的一般逻辑：（传递过来的参数：username， password）
     * 1、根据username在User表中查询该username是否存在；
     * 2、如果该username存在，进一步验证该username对应的password是否正确
     * 3、如果正确，则登陆成功；如果不正确，则常规处理方法就是引到其进入注册页面
     */
    // 模拟用户信息数据库
    $mysql = array(
        10001 => array(
            'uid' => 10001,
            'vip' => 5,
            'nickname' => 'Shine X',
            'email' => '979137@qq.com',
            'qq' => 979137,
            'gold' => 1500,
            'powerplay' => array('2xp' => 12, 'gem' => 12, 'bingo' => 5, 'keys' => 5, 'chest' => 8),
            'gems' => array('red' => 13, 'green' => 3, 'blue' => 8, 'yellow' => 17),
            'ctime' => 1376523234,
            'lastLogin' => 1377123144,
            'level' => 19,
            'exp' => 16758,
        ),
        10002 => array(
            'uid' => 10002,
            'vip' => 50,
            'nickname' => 'elva',
            'email' => 'elva@ezhi.net',
            'qq' => NULL,
            'gold' => 14320,
            'powerplay' => array('2xp' => 1, 'gem' => 120, 'bingo' => 51, 'keys' => 5, 'chest' => 8),
            'gems' => array('red' => 13, 'green' => 3, 'blue' => 8, 'yellow' => 17),
            'ctime' => 1376523234,
            'lastLogin' => 1377123144,
            'level' => 112,
            'exp' => 167588,
        ),
        10003 => array(
            'uid' => 10003,
            'vip' => 5,
            'nickname' => 'Lily',
            'email' => 'Lily@ezhi.net',
            'qq' => NULL,
            'gold' => 1541,
            'powerplay' => array('2xp' => 2, 'gem' => 112, 'bingo' => 4, 'keys' => 7, 'chest' => 8),
            'gems' => array('red' => 13, 'green' => 3, 'blue' => 9, 'yellow' => 7),
            'ctime' => 1376523234,
            'lastLogin' => 1377123144,
            'level' => 10,
            'exp' => 1758,
        ),
    );

    // 模拟用户uid
    $uidArr = array(10001, 10002, 10003);
    if (in_array($uid, $uidArr, true)) {
        $output = array('data' => NULL, 'info' => 'The user does not exist!', 'code' => -402);
        exit(json_encode($output));
    }
    // 模拟查询数据库
    $userInfo = $mysql[$uid];
    // 构建输出数据
    $output = array(
        'data' => array(
            'userInfo' => $userInfo,
            'isLogin' => true,
            'unread' => 4,
            'un_finish_task' => 3,
        ),
        'info' => '获取用户信息成功',
        'code' => '200',
    );
    exit(json_encode($output, JSON_UNESCAPED_UNICODE));
} elseif ($a == 'get_games_result') {
    $output = array('data' => null, 'info' => '您正在调 get_games_result 接口!', 'code' => 201);
    exit(json_encode($output, JSON_UNESCAPED_UNICODE));
} elseif ($a == 'upload_avatars') {
    $output = array('data' => null, 'info' => '您正在调 upload_avatars 接口!', 'code' => 201);
    exit(json_encode($output, JSON_UNESCAPED_UNICODE));
}