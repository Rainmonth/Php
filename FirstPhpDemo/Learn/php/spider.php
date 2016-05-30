<?php
/**
 * Created by PhpStorm.
 * User: Randy
 * Date: 2016/5/24
 * Time: 9:17
 */
function get_urls($url)
{

    $url_array = array();

    $the_first_content = file_get_contents($url);

    $the_second_content = file_get_contents($url);

    $pattern1 = "/http:\/\/[a-zA-Z0-9\.\?\/\-\=\&\:\+\-\_\'\"]+/";

    $pattern2 = "/http:\/\/[a-zA-Z0-9\.]+/";

    preg_match_all($pattern2, $the_second_content, $matches2);

    preg_match_all($pattern1, $the_first_content, $matches1);

    $new_array1 = array_unique($matches1[0]);

    $new_array2 = array_unique($matches2[0]);

    $final_array = array_merge($new_array1, $new_array2);

    $final_array = array_unique($final_array);

    for ($i = 0; $i < count($final_array); $i++) {

        echo $final_array[$i] . "<br/>";

    }

}

get_urls("http://www.csdn.net");