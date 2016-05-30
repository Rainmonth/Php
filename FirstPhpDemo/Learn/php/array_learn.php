<?php

//避免输出乱码
header('Content-Type:text/html;charset=utf-8');

$config = array(
    'ip' => 'demo.fdipzone.com', // 如空则用host代替
    'host' => 'demo.fdipzone.com',
    'port' => 80,
    'errno' => '',
    'errstr' => '',
    'timeout' => 30,
    'url' => '/getapi.php',
);

$formdata = array(
    'name' => 'fdipzone',
    'gender' => 'man'
);

$filedata = array(
    array(
        'name' => 'photo',
        'filename' => 'photo.jpg',
        'path' => 'photo.jpg'
    )
);
