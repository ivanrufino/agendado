<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Empresa extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index($id_empresa) {
        $this->load->view('template/header');
        $this->load->view('home');
        $this->load->view('template/footer');
    }
    public function getEmpresa($empresa) {
        
        echo $empresa;
    }
    public function servicos($empresa) {
        echo "servicos $empresa";
    }
}
