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

    public function cadastro() {
        $this->load->view('admin/template/header');
        $this->load->view("admin/cadastro_admin");
    }
    public function cadastro_completo() {
        if (!$this->session->has_userdata('logged_admin') || $this->session->userdata('logged_admin') != 'in') {
            redirect('login_adm');
        }
         $this->load->view('admin/template/header');
        $this->load->view("admin/cadastro_completo");
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
            if(is_null($dados['id_empresa'])){
                redirect('cadastro_completo');
            }else{
                redirect('admin');
            }
        }
    }

    public function cadastrar() {
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger red-text">', '</div>');
        $this->form_validation->set_rules('nome_responsavel', '<strong>Nome</strong>', 'trim|required');
        $this->form_validation->set_rules('sobrenome_responsavel', '<strong>Sobrenome</strong>', 'trim|required');
        $this->form_validation->set_rules('login', '<strong>Login</strong>', 'trim|required|is_unique[associado.login]', array('is_unique' => 'Este %s já esta sendo utilizado.'));
        $this->form_validation->set_rules('email', '<strong>Email</strong>', 'trim|required|valid_email|is_unique[associado.email]', array('is_unique' => 'Este %s já esta sendo utilizado.'));
        $this->form_validation->set_rules('senha', '<strong>Senha</strong>', 'trim|required|min_length[6]|matches[repita-senha]');
        $this->form_validation->set_rules('repita-senha', '<strong>Repita a Senha</strong>', 'trim');

        if ($this->form_validation->run() == FALSE) {
            $this->cadastro();
        } else {
            $dados = array(
                'nome_responsavel'=> $this->input->post('nome_responsavel'),
                'sobrenome_responsavel'=> $this->input->post('sobrenome_responsavel'),
                'login'=> $this->input->post('login'),
                'email'=> $this->input->post('email'),
                'senha'=> sha1($this->input->post('senha')),
            );
            $id_associado = $this->associados->insert($dados);

            if ($id_associado) {
                redirect("admin/cadastro_efetuado/$id_associado");
            }else{
                $this->cadastro();
            }
           
        }
    }
    
    public function cadastrar_completo() {
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger red-text">', '</div>');
        $this->form_validation->set_rules('nome', '<strong>Nome</strong>', 'trim|required');
        $this->form_validation->set_rules('tipo', '<strong>Tipo</strong>', 'trim|required');
        if($this->input->post('tipo')==1){
            $this->form_validation->set_rules('cnpj_cpf', '<strong>CNPJ</strong>', 'trim|required|is_unique[emppresa.cnpj]', array('is_unique' => 'Este %s já esta sendo utilizado.'));
        }
        if($this->input->post('tipo')==2){
            $this->form_validation->set_rules('cnpj_cpf', '<strong>CPF</strong>', 'trim|required|is_unique[empresa.cpf]', array('is_unique' => 'Este %s já esta sendo utilizado.'));
        }
        
        $this->form_validation->set_rules('url', '<strong>URL</strong>', 'trim|required|valid_email|is_unique[empresa.url]', array('is_unique' => 'Esta %s já esta sendo utilizado.'));
        $this->form_validation->set_rules('telefone', '<strong>Telefone</strong>', 'trim|required');
        $this->form_validation->set_rules('hora_inicio', '<strong>hora de inicio</strong>', 'trim|required');
        $this->form_validation->set_rules('hora_fim', '<strong>hora Final</strong>', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->cadastro_completo();
        } else {
            $dados = array(
                'nome_responsavel'=> $this->input->post('nome_responsavel'),
                'sobrenome_responsavel'=> $this->input->post('sobrenome_responsavel'),
                'login'=> $this->input->post('login'),
                'email'=> $this->input->post('email'),
                'senha'=> sha1($this->input->post('senha')),
            );
            $id_associado = $this->associados->insert($dados);

            if ($id_associado) {
                redirect("admin/cadastro_efetuado/$id_associado");
            }else{
                $this->cadastro();
            }
           
        }
    }
    public function cadastro_efetuado($id_associado=NULL) {
        $dados = $this->associados->getById($id_associado);
         $this->load->view('admin/template/header',$dados);
         if(is_null($id_associado)){
             $this->login();
         }else{
             $this->session->set_userdata($dados);
            $this->load->view("admin/cadastro_efetuado");
         }
    }
    public function logout() {
        $this->session->sess_destroy();
        redirect('login_adm');
    }

}
