<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: RandyZhang
 * Date: 16/8/1
 * Time: 下午1:50
 */
class User_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    /**
     * 增加用户(用于注册)
     * @param $data
     * @return bool
     */
    public function add_user_info($data)
    {
        $this->db->insert('sr_user', $data);
        $insert_id = $this->db->insert_id();
        if ($insert_id) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $id
     */
    public function delete_user_info($id)
    {
        // todo 注销用户,一般不推荐使用该方法
        $this->db->where('id', $id);
        $this->db->delete('sr_user');
        return $this->db->affected_rows();
    }

    /**
     * @param array
     */
    public function update_user_info($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('sr_user', $data);
        return $this->db->affected_rows();
    }

    /**
     * 获取用户信息
     * @param $id $id 用户id
     * @return array
     */
    public function get_user_info($id)
    {
        $sql = "select * from `sr_user` where id=?";
        $condition_value = array($id);
        $result_row = $this->db->query($sql, $condition_value);
        if ($result_row->num_rows() < 1) {
            return array('code' => 0, 'message' => '获取用户信息失败');
        } else {
            return array('code' => 1, 'message' => '获取用户信息成功', 'user_info' => $result_row->row());
        }
    }

    /**
     * 获取所有用户信息
     */
    public function get_user_info_list()
    {
        $result = $this->db->get('sr_user');
        return $result;
    }

    /**
     * 判断用户名是否存在
     * @param $username string
     * @return bool
     */
    public function is_user_exist($username)
    {
        $sql = "select * from `sr_user` where username=?";
        $condition_value = array($username);
        $result_row = $this->db->query($sql, $condition_value);
        if ($result_row->num_rows() < 1) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * 登录
     * @param  array
     * @return mixed
     */
    public function login($data)
    {
        /**
         * todo 判断login_type
         *  移动客户端->移动端登录处理
         *  PC端->PC端登录处理
         */
        $username = $data['username'];
        $psw = $data['psw'];
        $platform = $data['platform'];

        $sql = "select * from `sr_user` where username=?";
        $condition_value = array($username);

        $result_row = $this->db->query($sql, $condition_value);
//        echo $this->db->last_query();
        $user_row = $result_row->row();
        if ($user_row->psw != $psw) {
            return array('code' => 0, 'message' => '登录密码不正确');
        } else {
            $user_info['id'] = $user_row->id;
            $user_info['username'] = $user_row->username;
            $user_info['psw'] = $user_row->psw;
            $user_info['avatar'] = $user_row->avatar;
            return array('code' => 1, 'message' => '登录成功', 'user_info' => $user_info);
        }
    }

    public function register($data)
    {
        return $this->add_user_info($data);
    }
}