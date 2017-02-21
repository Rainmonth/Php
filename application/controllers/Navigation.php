<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Navigation
 * 主要负责页面间的跳转
 */
class Navigation extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/home.php/welcome
     *    - or -
     *        http://example.com/home.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /home.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->load->view('index');
    }

//    public function navTo($pageLocation = 'index') {
//        $this->load->view($pageLocation);
//    }

    public function naveToHome()
    {
        $this->load->view('home/home');
    }

    public function navToHomeNew()
    {
        $this->load->view('home/home_new.html');
    }

    public function navToApiDemo()
    {
        $this->load->view('api/demo');
    }

    public function navToApiIndex()
    {
        $this->load->view('api/index');
    }

    public function navToMemory()
    {
        $this->load->view('pages/nav_memory');
    }

    public function navToCurrent()
    {
        $this->load->view('pages/nav_current');
    }

    public function navToWish()
    {
        $this->load->view('pages/nav_wish');
    }

    public function navToWonder()
    {
        $this->load->view('pages/nav_wonder');
    }

    public function navToGallery()
    {
        $this->load->view('api/gallery.html');
    }

    public function navToLens()
    {
        $this->load->view('demos/lens.php');
    }

    public function navToLensTop()
    {
        $this->load->view('lens');
    }

    public function navToWelcome()
    {
        $this->load->view('demos/spectral/index.php');
    }

    public function navToGeneric()
    {
        $this->load->view('demos/spectral/generic.php');
    }

    public function navToElements()
    {
        $this->load->view('demos/spectral/elements.php');
    }

    public function navToMultiverse()
    {
        $this->load->view('demos/multiverse/index.html');
    }

    public function navTo($pageLocation = 'index')
    {
        $this->load->view($pageLocation);
    }

    /**
     * 添加banner信息
     */
    public function navToAddBanner()
    {
        $this->load->view('manage/add_banner');
    }

    /**
     * 添加文章信息
     */
    public function navToAddArticle()
    {
        $this->load->view('manage/add_article');
    }

}
