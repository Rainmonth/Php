<?php

/**
 * 记忆数据模型
 * Created by PhpStorm.
 * User: RandyZhang
 * Date: 2017/4/18
 * Time: 上午11:52
 */
class Memory_model extends CI_Model
{
    public function __construct()
    {
//        $this->load->model("User_model");
    }


    public function add_personal_memory($data)
    {
        $this->db->insert('sr_memory', $data);
        $insert_id = $this->db->insert_id();
        if ($insert_id) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 删除个人某个记录（需登录）
     */
    public function delete_personal_memory()
    {

    }

    public function update_personal_memory()
    {

    }

    /**
     * 获取个人记忆记录列表（需登录）
     */
    public function get_personal_memory_list()
    {

    }

    public function get_all_memory_list()
    {
        $result_row = $this->db->get('sr_memory');
        $memory_array = $result_row->result_array();
        $list = array();
        $index = 0;
        foreach ($memory_array as $value) {
            $item = array();
            $item['id'] = $value['id'];
            $item['title'] = $value['title'];
//            print_r($item);
//            echo '<br />';
            $list[$index] = $item;
            $index++;
        }
        return $list;
    }


    public function get_personal_memory_detail()
    {

    }
}