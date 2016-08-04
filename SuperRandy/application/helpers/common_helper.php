<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Bisheng
 * Date: 2015/8/18
 * Time: 15:42
 */
class HCommon
{
    /**
     * GET/POST常见数据类型
     */
    const _T_INT = 0;//整型
    const _T_CHAR = 1;//字符型
    const _T_EMAIL = 2;//邮箱
    const _T_URL = 3;//网址
    const _T_NUMERIC = 4;//纯数字
    const _T_IP = 5;//IP地址

    static function get_shop_url($domain = null)
    {
        if ($domain) {
            return "http://" . $domain . "." . HConfig::KD_DOMAIN;
        } else {
            return "http://" . self::get_sub_domain() . "." . HConfig::KD_DOMAIN;
        }
    }

    /**
     * @取得当前HOST地址
     */
    static function get_host()
    {
        $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME'];
        return $host;
    }

    static function get_sub_domain()
    {
        $host = self::get_host();
        $domain = self::get_domain($host);
        if ($host == $domain) {
            return "";
        }

        $sub_domain = str_replace(".{$domain}", '', $host);
        if (preg_match("/^[\S]+\.[\S]+$/", $sub_domain)) {//解析三级域名
            $dAry = explode(".", $sub_domain);
            if (count($dAry) > 0) {
                return $dAry[0];
            }
        }
        return $sub_domain;
    }

    /*
     * 获取sql查询条件中的in值
     * $value是一个数值
     */
    static function get_sql_in_values_for_array($value)
    {
        return "'" . implode("','", $value) . "'";
    }

    /*
     * 获取sql查询条件中的in值
     * $value是逗号隔开的字符串
     */
    static function get_sql_in_values_for_str($value)
    {
        return "'" . implode("','", explode(',', $value)) . "'";
    }

    /*
     * 把数组转换成字符串
     * $value是一个数值
     */
    static function get_str_values_for_array($value)
    {
        return implode(",", $value);
    }

    /*
     * 把数组转换成字符串
     * $value是一个数值
     */
    static function get_array_values_for_str($value)
    {
        return explode(',', $value);
    }


    /**
     *    取得URl下的域名
     * www.k-d.in-->k-d.in
     * www.k-d.com.cn-->k-d.com.cn
     */
    static function get_domain($url = null)
    {
        if (!$url) {
            $url = self::get_host();
        }
        $pattern = '/[\w-]+\.(com|net|org|gov|cc|biz|in|info|cn|me|edu|int|us)(\.(cn|in|hk|tw))*/';
        preg_match($pattern, $url, $matches);
        if (count($matches) > 0) {
            return $matches[0];
        } else {
            $rs = parse_url($url);
            $main_url = $rs["host"];
            if (!strcmp(long2ip(sprintf("%u", ip2long($main_url))), $main_url)) {
                return $main_url;
            } else {
                $arr = explode(".", $main_url);
                $count = count($arr);
                $endArr = array(
                    "com",
                    "net",
                    "org",
                    "edu"
                ); // com.cn，net.cn 等情况
                if (in_array($arr[$count - 2], $endArr)) {
                    $domain = $arr[$count - 3] . "." . $arr[$count - 2] . "." . $arr[$count - 1];
                } else {
                    $domain = $arr[$count - 2] . "." . $arr[$count - 1];
                }
                return $domain;
            }
        }
    }

    /**
     * 依据要查询的页码获取对应的[分页偏移量]与[限制记录数量]
     * @param undefined $page_id 页码ID
     *
     * @return array(
     *        'offset' => "分页偏移量",
     *        'limit' => "限制记录数量"
     *    )
     */
    public static function get_pager_info($page, $page_size)
    {
        if (!isset($page_size)) {
            $page_size = 100;
        }
        $page = $page > 1 ? $page : 1;
        $offset = ($page - 1) * $page_size;
        return array(
            'offset' => $offset,
            'limit' => $page_size
        );
    }

    /**
     * 简化ajax请求时的输出操作
     *
     * @param  array|string $data
     *
     */
    public static function output_json($data)
    {
        if (is_array($data)) {
            echo json_encode($data);
        } else {
            echo $data;
        }
        exit(0);
    }

    /**
     * 取得用户客户端ＩＰ
     *
     * @return string
     */
    static public function get_ip()
    {
        if (isset($_SERVER)) {
            if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $aIps = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                foreach ($aIps as $sIp) {
                    $sIp = trim($sIp);
                    if ($sIp != 'unknown') {
                        $sRealIp = $sIp;
                        break;
                    }
                }
            } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
                $sRealIp = $_SERVER['HTTP_CLIENT_IP'];
            } else {
                if (isset($_SERVER['REMOTE_ADDR'])) {
                    $sRealIp = $_SERVER['REMOTE_ADDR'];
                } else {
                    $sRealIp = '0.0.0.0';
                }
            }
        } else {

            if (getenv('HTTP_X_FORWARDED_FOR')) {
                $sRealIp = getenv('HTTP_X_FORWARDED_FOR');
            } elseif (getenv('HTTP_CLIENT_IP')) {
                $sRealIp = getenv('HTTP_CLIENT_IP');
            } else {
                $sRealIp = getenv('REMOTE_ADDR');
            }
        }
        return $sRealIp;
    }


    //删除字符串中所有的空格
    public function trim_all($str)
    {
        $qian = array(" ", "　", "\t", "\n", "\r");
        $hou = array("", "", "", "", "");
        return str_replace($qian, $hou, $str);
    }

    /**
     * 将对象转化为数组  objectToArray
     * @param undefined $object
     *
     * @return
     */
    public static function object_to_array($object)
    {
        if (!is_object($object) && !is_array($object)) {
            return $object;
        }
        if (is_object($object)) {
            $object = get_object_vars($object);
        }
        return $object;
    }

    /**
     * Todo  smscurlpostData
     * POST
     * 提交数据
     *
     * @param string $url
     * @param
     *            string
     *            JSON
     *            $data
     * @return mixed
     */
    public static function sms_curl_post_data($url, $data)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $request = curl_exec($ch);
        curl_close($ch);
        $request = json_decode($request, true);
        return $request;
    }

    /**
     * @todo 是否是浏览器
     * @return boolean
     */
    static public function is_weixin()
    {
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) {
            return true;
        }
        return false;
    }

    //判断是否是QQ内置浏览器
    public static function is_qq()
    {
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'QQ') !== false) {
            /*if (strpos($_SERVER['HTTP_USER_AGENT'], 'MQQBrowser') == false) {
                return true;
            }*/
            return true;
        }
        return false;
    }
    //<summary>
/// 根据 Agent 判断是否是智能手机
///</summary>
///<returns></returns>
    public static function CheckAgent()
    {
        $flag = false;

        $agent = $_SERVER['HTTP_USER_AGENT'];
        $keywords = array("Android", "iPhone", "iPod", "iPad", "Windows Phone", "MQQBrowser");

//排除 Windows 桌面系统
        if (!strpos($agent, "Windows NT") || strpos($agent, "Windows NT") && strpos($agent, "compatible; MSIE 9.0;")) {
//排除 苹果桌面系统
            if (!strpos($agent, "Windows NT") && !strpos($agent, "Macintosh")) {
                foreach ($keywords as $item) {
                    if (strpos($agent, $item)) {
                        $flag = true;
                        break;
                    }
                }
            }
        }

        return $flag;
    }

    /**
     * 获取当前访问的URL
     * @param undefined $full
     *
     * @return
     */
    public static function get_current_url($full = TRUE)
    {
        if (!$full) {
            return $_SERVER['REQUEST_URI'];
        }

        $pageURL = 'http';
        if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
            $pageURL .= "s";
        }
        $pageURL .= "://" . $_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"];
        return $pageURL;
    }

    /*
     * 获取当前时间戳
     */
    public static function get_current_time()
    {
        $time_frame = date('Y-m-d H:i:s');
        $time = strtotime($time_frame);
        return $time;
    }

    /*
     * 产品轮播图片
     */
    public static function deal_product_images($images)
    {
        $width = 480;
        $height = 480;
        $is_mobile = HCommon::is_mobile();
        if (!$is_mobile) {
            $width = 640;
            $height = 640;
        }

        $proImages = array();
        if ($images) {
            $exImages = explode('|', $images);
            foreach ($exImages as $em) {
                $proImages[] = array('path' => HCommon::get_img_url($em, $width, $height));
            }
        }
        return $proImages;
    }

    /*
     * 处理商品详情,文案图文详情等
     */
    public static function deal_html_content($content)
    {
        $content = htmlspecialchars_decode($content);
        /*$content = preg_replace("/width=(\\\"\\d+\\\"|\\d+)/", "width=320", $content);
        $content = preg_replace("/height=(\\\"\\d+(\\.\\d+)\"|\\d+)/", "height=320", $content);*/

        //浏览器兼容，部分浏览器对带“_.webp”的图片无法解析
        $content = str_replace('_.webp', '', $content);

        //替换描述中的行内样式
        $content = preg_replace("/style\\s*=\\s*('[^']*'|\"[^\"]*\")/", "", $content);
        $content = preg_replace("/(width|height)=(\\\"\\d+(\\.\\d+)\"|\\d+|\\\"\\d+\\\")/", "", $content);
        $content = preg_replace("/http:\/\/[\w\-_]+.veigou.com\/ueditor\/php\/uploads\//",
            "http://static.veigou.com/ueditor/php/uploads/", $content);

        return $content;
    }

    /**
     * 取得随机数
     *
     * @param int $length
     * @param boolean $is_num
     * @return string
     */
    public static function random($length = 8, $is_num = FALSE)
    {
        $random = '';
        $str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $num = '0123456789';
        if ($is_num) {
            $sequece = 'num';
        } else {
            $sequece = 'str';
        }
        $max = strlen($$sequece) - 1;
        for ($i = 0; $i < $length; $i++) {
            $random .= ${
            $sequece}{mt_rand(0, $max)};
        }
        return $random;
    }

    /**
     * 判断是否是手机浏览器
     *
     * @return boolean
     */
    public static function is_mobile()
    {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $mobile_agents = Array(
            "240x320",
            "acer",
            "acoon",
            "acs-",
            "abacho",
            "ahong",
            "airness",
            "alcatel",
            "amoi",
            "android",
            "anywhereyougo.com",
            "applewebkit/525",
            "applewebkit/532",
            "asus",
            "audio",
            "au-mic",
            "avantogo",
            "becker",
            "benq",
            "bilbo",
            "bird",
            "blackberry",
            "blazer",
            "bleu",
            "cdm-",
            "compal",
            "coolpad",
            "danger",
            "dbtel",
            "dopod",
            "elaine",
            "eric",
            "etouch",
            "fly ",
            "fly_",
            "fly-",
            "go.web",
            "goodaccess",
            "gradiente",
            "grundig",
            "haier",
            "hedy",
            "hitachi",
            "htc",
            "huawei",
            "hutchison",
            "inno",
            //"ipad",
            "ipaq",
            "ipod",
            "jbrowser",
            "kddi",
            "kgt",
            "kwc",
            "lenovo",
            "lg ",
            "lg2",
            "lg3",
            "lg4",
            "lg5",
            "lg7",
            "lg8",
            "lg9",
            "lg-",
            "lge-",
            "lge9",
            "longcos",
            "maemo",
            "mercator",
            "meridian",
            "micromax",
            "midp",
            "mini",
            "mitsu",
            "mmm",
            "mmp",
            "mobi",
            "mot-",
            "moto",
            "nec-",
            "netfront",
            "newgen",
            "nexian",
            "nf-browser",
            "nintendo",
            "nitro",
            "nokia",
            "nook",
            "novarra",
            "obigo",
            "palm",
            "panasonic",
            "pantech",
            "philips",
            "phone",
            "pg-",
            "playstation",
            "pocket",
            "pt-",
            "qc-",
            "qtek",
            "rover",
            "sagem",
            "sama",
            "samu",
            "sanyo",
            "samsung",
            "sch-",
            "scooter",
            "sec-",
            "sendo",
            "sgh-",
            "sharp",
            "siemens",
            "sie-",
            "softbank",
            "sony",
            "spice",
            "sprint",
            "spv",
            "symbian",
//			"tablet",   // 兼容ie 8
            "talkabout",
            "tcl-",
            "teleca",
            "telit",
            "tianyu",
            "tim-",
            "toshiba",
            "tsm",
            "up.browser",
            "utec",
            "utstar",
            "verykool",
            "virgin",
            "vk-",
            "voda",
            "voxtel",
            "vx",
            "wap",
            "wellco",
            "wig browser",
            "wii",
            "windows ce",
            "wireless",
            "xda",
            "xde",
            "zte"
        );
        $is_mobile = false;
        foreach ($mobile_agents as $device) {
            if (stristr($user_agent, 'ipad')) {
                break;
            }

            if (stristr($user_agent, $device)) {
                $is_mobile = true;
                break;
            }
        }
        return $is_mobile;
    }

    /**
     * 过滤POST/GET请求的数据
     * @param undefined $str
     * @param undefined $type
     *
     * @return
     */
    public static function filter_char($str, $type = self::_T_CHAR)
    {
        $returnStr = NULL;
        switch ($type) {
            case self::_T_INT:
                $returnStr = intval($str);
                break;
            case self::_T_CHAR:
                $returnStr = filter_var($str, FILTER_SANITIZE_STRING);
                break;
            case self::_T_EMAIL:
                $returnStr = filter_var($str, FILTER_VALIDATE_EMAIL);
                break;
            case self::_T_URL:
                $returnStr = filter_var($str, FILTER_VALIDATE_URL);
                break;
            case self::_T_NUMERIC:
                $returnStr = preg_match("/^[\d]+$/", $str) ? $str : 0;
                break;
            case self::_T_IP:
                $returnStr = filter_var($str, FILTER_VALIDATE_IP);
                break;
            default:
                $returnStr = filter_var($str, FILTER_SANITIZE_STRING);
        }
        return $returnStr;
    }

    /*
     * 写入数据库前获取图片的存储路径
     */
    public static function get_img_path($file_path)
    {
        $file_path = str_replace(HConfig::_QINIU_HOST, "", $file_path);
        if (stripos($file_path, '?imageView2') > 0) {
            $file_path = substr($file_path, 0, stripos($file_path, '?imageView2'));
        }
        if (stripos($file_path, '?imageMogr2') > 0) {
            $file_path = substr($file_path, 0, stripos($file_path, '?imageMogr2'));
        }
        return $file_path;
    }

    /*
     * 获取图片链接
     */
    public static function get_img_url($thumb, $width = 0, $height = 0)
    {
        if (!strpos($thumb, "veigou.cn") && !strpos($thumb, "veigou.com")) {
            $thumb = HConfig::_QINIU_HOST . $thumb;
        }
        if (!strpos($thumb, "imageMogr2/thumbnail")
            && !strpos($thumb, "imageMogr2/interlace/1/format/jpg/thumbnail/")
            && $width > 0 && $height > 0
        ) {
            $is_mobile = HCommon::is_mobile();
            if (!$is_mobile && $width == $height) {
                $width = min($width < 320 ? $width * 2 : $width * 1.5, 640);
                $height = min($height < 320 ? $height * 2 : $height * 1.5, 640);
            }
            $thumb = $thumb . "?imageMogr2/interlace/1/format/jpg/thumbnail/" . $width . "x" . $height . "!";
        }
        return $thumb;
    }

    /*
     * 检测手机号码格式是否正确
     */
    public static function is_cellphone($cellphone = NULL)
    {
        if (!preg_match("/^[1][34578]\d{9}$/", $cellphone)) {
            return FALSE;
        }
        return TRUE;
    }

    /*
     * 检测身份证号码是否正确
     */
    public static function is_identity_card_number($code)
    {
        if (!preg_match("/(^\d{15}$)|(^\d{17}([0-9]|X)$)/", $code)) {
            return FALSE;
        }
        return $code;
    }

    /**
     * Todo
     * POST
     * 提交数据
     *
     * @param string $url
     * @param
     *            string
     *            JSON
     *            $data
     * @return mixed
     */
    public static function curlpostData($url, $data)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $request = curl_exec($ch);
        curl_close($ch);
        $request = json_decode($request);
        return $request;
    }

    /**
     * 日期由文字格式转成时间戳
     * @param undefined $time_str
     * @param undefined $isEnd 是否为结束时间
     *
     * @return 时间戳
     */
    public static function mk_time_stamp($time_str, $is_end = FALSE)
    {
        if (preg_match("/^[\d]{4}\-[\d]{2}\-[\d]{2} [\d]{2}\:[\d]{2}\:[\d]{2}$/", $time_str)) {//精确时间
            return strtotime($time_str);
        }
        if (!preg_match("/^[\d]{4}\-[\d]{2}\-[\d]{2}$/", $time_str)) {
            return 0;
        }
        if ($is_end) {
            list($year, $month, $day) = explode('-', $time_str);
            return mktime(23, 59, 59, $month, $day, $year);
        }
        return strtotime($time_str);//默认为起始时间
    }

    /**
     * 计算购买商品时所扣除的返点金额
     * @param undefined $amount
     *
     * @return
     */
    public static function cal_purchase_rebate($amount = 0, $spl_rebate)
    {
        $fee = round($amount * $spl_rebate, 2);
        return $fee;
    }

    /**
     * 计算购买商品时所扣除的手续费
     * @param undefined $amount
     *
     * @return
     */
    public static function cal_purchase_fee($amount = 0, $pay_type = '')
    {
        //从6月15日自2015年年底,手续费全免
        if (strtotime("2015-06-15 00:00:00") < strtotime(date("Y-m-d H:i:s"))
            && strtotime("2015-12-31 10:00:00") > strtotime(date("Y-m-d H:i:s"))
        ) {
            return 0;
        }

        switch ($pay_type) {
            case 'mobilealipay':
                $fee = round($amount * HConfig::_PurchaseRate, 2);
                break;
            case 'vgwxpay':
                $fee = round($amount * HConfig::_WXPurchaseRate, 2);
                break;
            case 'baifubaopay':
                $fee = round($amount * HConfig::_BFBPurchaseRate, 2);
                break;
            default:
                $fee = 0;
                break;
        }
        return $fee;
    }

    public static function get_veigou_admin_site_url($url)
    {
        return "http://veigou.com" . $url;
    }

    /*
     * 根据商户手机号生成邀请码
     */
    public static function create_invitation_code($uid)
    {
        $invitation_code = strtoupper((string)trim(substr(sha1(md5(strrev($uid))), 0, 10)));
        return $invitation_code;
    }

    public static function create_user_invitation_code($uid)
    {
        $invitation_code = strtoupper((string)trim(substr(sha1(md5(strrev($uid))), 0, 5)));
        return $invitation_code;
    }

    /*
     * 判断客户端是安卓还是iOS
     */
    public static function is_android_or_ios()
    {
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') || strpos($_SERVER['HTTP_USER_AGENT'], 'iPad')) {
            return 'iOS';
        } else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Android')) {
            return 'Android';
        } else {
            return 'other';
        }
    }

    /*
     * 获取全地址
     */
    public static function get_full_adderss($province, $city, $area, $address)
    {
        if ($province == $city) {
            if (isset($area)) {
                return $province . " " . $area . " " . $address;
            } else {
                return $province . " " . $address;
            }
        } else {
            if (isset($area) && $area != "null") {
                return $province . " " . $city . " " . $area . " " . $address;
            } else {
                return $province . " " . $city . " " . $address;
            }
        }
    }

    /*
     * 校验请求参数是否存在
     */
    public static function check_param($params)
    {
        foreach ($params as $value) {
            if ($value == null || (is_array($params) && empty($value))) {
                self::output_json(array(
                        'code' => 10010,
                        'message' => '请求参数不存在')
                );
            }
        }
    }

    /**
     * 调用vgapi
     * @return Array 基本格式 array('code' => "0|10010",'msg' => "返回的结果提示信息")
     */
    public static function callVGAPI($data)
    {
        $data['time'] = time();
        //api签名
        $data['sign'] = md5($data["method_uri"] . $data['time'] . HConfig::KD_API_KEY);
        //api路径验证是否传参数
        if (empty($data["method_uri"])) {
            return array(
                'req' => "error",
                'msg' => "缺少调用参数"
            );
        }
        return self::curlpostData($data['method_uri'], $data);
    }

    /**
     * 快递100查新运单的快递公司编号
     *
     * @return
     */
    public static function get_kuaidi100_companycode($compay)
    {
        $kuaidi100_companycode_array = array(
            "EMS" => "ems",
            "中通快递" => "zhongtong",
            "优速快递" => "dsukuaidi",
            "全日通" => "quanritongkuaidi",
            "如风达" => "rufengda",
            "圆通快递" => "yuantong",
            "天天快递" => "tiantian",
            "宅急送" => "Zhaijisong",
            "德邦物流" => "debangwuliu",
            "全峰快递" => "quanfengkuaidi",
            "汇通快递" => "huitongkuaidi",
            "申通快递" => "shentong",
            "速尔快递" => "Suer",
            "韵达快递" => "yunda",
            "顺丰快递" => "shunfeng",
        );
        return $kuaidi100_companycode_array[$compay];
    }

    /**
     * 获取快递100的监控状态:1-polling(监控中)，2-shutdown(结束)，3-abort(中止)，4-updateall(重新推)
     *
     * @return
     */
    public static function get_kuaidi100_status($status)
    {
        $kuaidi100_status_array = array(
            'polling' => 1,
            'shutdown' => 2,
            'abort' => 3,
            'updateall' => 4,
        );
        if (isset($kuaidi100_status_array[$status])) {
            return $kuaidi100_status_array[$status];
        }
        return 0;
    }

    /**
     * 获取sid中的zx_domain
     * @return
     */
    public static function get_zx_domain_by_sid($sid)
    {
        $zx_domain = '';
        if (!empty($sid) && strstr($sid, '_')) {
            $sid_info = explode('_', $sid);
            $zx_domain = $sid_info[0];
        }
        return $zx_domain;
    }

    /**
     * 计算数组求和
     * @return
     */
    public static function get_sum_for_array($data)
    {
        $sum = 0;
        if (empty($data)) {
            return $sum;
        }
        foreach ($data as $value) {
            $sum += $value;
        }
        return $sum;
    }

    public static function curl($url)
    {//get https的内容
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//不输出内容
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}