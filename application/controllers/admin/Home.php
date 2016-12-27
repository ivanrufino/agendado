<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller{
    public function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('logged_admin') || $this->session->userdata('logged_admin') != 'in') {
            redirect('login_adm');
        }
    }
    public function index() {
        print_r($this->session->userdata);die();
        $this->template('exemplo');
        //$this->load->view('admin/template/header');
      //  $this->load->view('admin/home');
        //$this->load->view('admin/template/footer');
    }

    
    private function template($view,$dados = NULL) {
        $this->load->view('admin/template/header',$dados);
        $this->load->view('admin/template/header_nav');
        $this->load->view('admin/template/sideBar');
        $this->load->view("admin/$view");
        $this->load->view('admin/template/right-sidebar-nav');
        $this->load->view('admin/template/footer');
    }
    
}
