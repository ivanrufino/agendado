<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Erros extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
   public function page404() {
      //   $this->load->view('admin/template/header');
        $this->load->view("errors/html/error_404.php");
    }
}
