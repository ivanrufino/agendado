<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function login() {
        $this->load->view('admin/template/header');
        $this->load->view("admin/login");
        //  $this->load->view('admin/template/footer');
    }

    public function acessar() {
        $this->form_validation->set_rules('login', 'Login', 'trim|required');
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->login();
        } else {
            $login = $this->input->post('login');
            $senha = sha1($this->input->post('senha'));
            $dados = $this->associados->efetuarLogin($login, $senha);
             
            if ($dados) {
                unset($dados['senha']);
                $dados['logged_admin'] = 'in';
                $this->session->set_userdata($dados);

                // $this->admin->alteraAdmin($dados['CODIGO'], array('ULTIMA_ATIVIDADE' => date('Y-m-d H:i:s')));
            }
            redirect('admin');

            //$this->logado();
        }
    }
    public function logout() {
        $this->session->sess_destroy();
        redirect('login_adm');
    }
}
