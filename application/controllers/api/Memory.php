<?php

/**
 * Created by PhpStorm.
 * User: RandyZhang
 * Date: 2017/4/19
 * Time: 上午12:07
 */
class Memory extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("memory_model");
    }

    public function add_personal_memory()
    {
        $title = $this->input->post("title");
//        $username = $this->input->post('username');
//        $psw = $this->input->post('psw');
//        $email = $this->input->post('email');
//        $platform = $this->input->post('platform');
        $data['title'] = $title;
//        $data['username'] = $username;
//        $data['psw'] = $psw;
//        $data['email'] = $email;

        $this->user_model->add_personal_memory($data);
    }

    public function delete_personal_memory()
    {

    }
}