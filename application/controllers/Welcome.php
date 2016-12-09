<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->load->view('index');
    }

//    public function navTo($pageLocation = 'index') {
//        $this->load->view($pageLocation);
//    }

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

    public function navToWelcome() {
        $this->load->view('demos/spectral/index.php');
    }
    public function navToGeneric() {
        $this->load->view('demos/spectral/generic.php');
    }
    public function navToElements() {
        $this->load->view('demos/spectral/elements.php');
    }
    public function navTo($pageLocation = 'index') {
        $this->load->view($pageLocation);
    }
}
