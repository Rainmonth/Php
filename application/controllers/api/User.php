<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: RandyZhang
 * Date: 16/8/1
 * Time: 下午2:02
 */
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    /**
     * 登录
     */
    public function login()
    {
        // 获取客户端传递过来的参数
        $username = $this->input->post('username');
        $psw = $this->input->post('psw');
        $platform = $this->input->post('platform');
        $data['username'] = $username;
        $data['psw'] = $psw;
        $data['platform'] = $platform;
        if (empty($data['username'])) {
            HCommon::output_json(array(
                'code' => 0,
                'message' => "username为空"
            ));
        }
        if (empty($data['psw'])) {
            HCommon::output_json(array(
                'code' => 0,
                'message' => "psw为空"
            ));
        }
        // 判断用户名是否存在
        if ($this->user_model->is_user_exist($username)) {// 存在
            $login_result = $this->user_model->login($data);
            if ($login_result['code'] == 1) {
                $user_info = $login_result['user_info'];
                /**
                 * 第一种方式：采用php原生方式
                 */
//                setcookie("id", $user_info['id'], 86500);
//                setcookie("username", $user_info['username'], 86500);

                /**
                 * 第二种方式：采用Ci的set_cookies 方法
                 */
                $this->input->set_cookie("id", $user_info['id'], 60);
                $this->input->set_cookie("username", $user_info['username'], 60);
                HCommon::output_json(array(
                    'code' => 1,
                    'message' => "登录成功",
                    'user_info' => $login_result['user_info'],
                    // todo 将user_info的信息利用session或者cookies保存起来
                ));
            } else {
                HCommon::output_json([
                    'code' => 0,
                    'message' => $login_result['message'],
                    'data' => $data,
                ]);
            }
        } else {// 不存在
            HCommon::output_json(array(
                'code' => 0,
                'message' => "登录失败,该账号不存在",
                'data' => $data,
            ));
        }
        // 手机端登录
        if (strtolower($platform) == 'android' || strtolower($platform) == 'ios') {
//            $result_array = $this->user_model->
        }
    }

    /**
     * 注册
     */
    public function register()
    {
        $mobile = $this->input->post("mobile");
        $username = $this->input->post('username');
        $psw = $this->input->post('psw');
        $email = $this->input->post('email');
//        $platform = $this->input->post('platform');
        $data['mobile'] = $mobile;
        $data['username'] = $username;
        $data['psw'] = $psw;
        $data['email'] = $email;
        if (empty($data['mobile'])) {
            HCommon::output_json(array(
                'code' => 0,
                'message' => "mobile为空"
            ));
        }
        if (empty($data['username'])) {
            HCommon::output_json(array(
                'code' => 0,
                'message' => "username为空"
            ));
        }
        if (empty($data['email'])) {
            HCommon::output_json(array(
                'code' => 0,
                'message' => "email为空"
            ));
        }
        if (empty($data['psw'])) {
            HCommon::output_json(array(
                'code' => 0,
                'message' => "psw为空"
            ));
        }

        if ($this->user_model->is_user_exist($username)) {
            HCommon::output_json(array(
                'code' => 0,
                'message' => "注册失败,该账号已存在",
                'user_info' => $data
            ));
        } else {
            if ($this->user_model->register($data)) {
                HCommon::output_json(array(
                    'code' => 1,
                    'message' => "注册成功",
                    'user_info' => $data
                ));
            } else {
                HCommon::output_json(array(
                    'code' => 0,
                    'message' => "注册失败",
                    'user_info' => $data
                ));
            }
        }
    }

    /**
     * 删除用户信息
     */
    public function deleteUserInfo()
    {
        $id = $this->input->post('id');
        $delete_result = $this->user_model->delete_user_info($id);
        if ($delete_result == -1) {
            HCommon::output_json(array(
                'code' => 0,
                'message' => "删除失败",
                'data' => $id
            ));
        } else if ($delete_result == 0) {
            HCommon::output_json(array(
                'code' => 0,
                'message' => "删除失败,对应的id不存在",
                'data' => $id
            ));
        } else {
            HCommon::output_json(array(
                'code' => 1,
                'message' => "删除成功",
                'data' => $id
            ));
        }
    }

    /**
     * 获取用户信息
     */
    public function getUserInfo()
    {
        $id = $this->input->post('id');
        if (empty($id)) {
            HCommon::output_json(array(
                'code' => 0,
                'message' => "id为空",
                'data' => $id
            ));
        }
        $result_array = $this->user_model->get_user_info($id);
        if ($result_array['code'] == 0) {
            HCommon::output_json(array(
                'code' => 0,
                'message' => $result_array['message'],
                'data' => $id
            ));
        } else {
            HCommon::output_json(array(
                'code' => 1,
                'message' => $result_array['message'],
                'data' => $result_array['user_info']
            ));
        }
    }

    /**
     * 更新用户信息, 可能更新user的若干个字段
     */
    public function updateUserInfo()
    {
        $data['id'] = $this->input->post('id');
        $data['username'] = $this->input->post('username');
        $data['psw'] = $this->input->post('psw');
        $data['avatar'] = $this->input->post('avatar');
        if (empty($data['id'])) {
            HCommon::output_json(array(
                'code' => 0,
                'message' => "id为空"
            ));
        }
        if (empty($data['username'])) {
            HCommon::output_json(array(
                'code' => 0,
                'message' => "username为空"
            ));
        }
        if (empty($data['psw'])) {
            HCommon::output_json(array(
                'code' => 0,
                'message' => "psw为空"
            ));
        }

        $result = $this->user_model->update_user_info($data);
        if ($result < 1) {
            HCommon::output_json(array(
                'code' => 0,
                'message' => "用户信息更新失败"
            ));
        } else {
            HCommon::output_json(array(
                'code' => 1,
                'message' => "用户信息更新成功"
            ));
        }
    }

    /**
     * 获取用户列表
     */
    public function getUserList()
    {
        $result = $this->user_model->get_user_info_list();
        if ($result->num_rows() < 1) {
            HCommon::output_json(array(
                'code' => 0,
                'message' => "获取用户列表失败"
            ));
        } else {
            $user_array = $result->result_array();
            HCommon::output_json(array(
                'code' => 1,
                'message' => "获取用户列表成功",
                'data' => $user_array
            ));
        }
    }

    /**
     * 登出
     */
    public function logout()
    {

    }

    /**
     * 打印cookies信息
     */
    public function printCookies()
    {
        /**
         * 第一种：原生
         */
//        if (isset($_COOKIE['id'])) {
//            echo $_COOKIE['id'];
//        }
//        if (isset($_COOKEI['username'])) {
//            echo $_COOKIE['username'];
//        }
        /**
         * 第二种获取cookies方法：CI
         */
        echo $this->input->cookie("id");//适用于控制器
        echo $this->input->cookie("username");//适用于控制器
        // 打印cookies
    }
}