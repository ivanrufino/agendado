<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('logged_admin') || $this->session->userdata('logged_admin') != 'in') {
            redirect('login_adm');
        }
    }

    public function index() {
        $dados['admin'] = $this->session->userdata;
        $servicos = $this->servicos->getWhere('id_empresa', $dados['admin']['id_empresa'], $sort = 'nome');
        $dados['servicos'] = $servicos;
        $dados['servicos']['count'] = count($servicos);
        $this->agendamentos->setTable('v_cliente_agendamento');
        $cliente_agendamentos = $this->agendamentos->getWhere('id_empresa', $dados['admin']['id_empresa'],'nome','asc','id_cliente');
        
        $dados['cliente_agendamentos'] = $cliente_agendamentos;
        $dados['cliente_agendamentos']['count'] = count($cliente_agendamentos);
        
        
        $funcionarios = $this->funcionarios->getWhere('id_empresa', $dados['admin']['id_empresa'], $sort = 'nome');
        $dados['funcionarios'] = $funcionarios;
        $dados['funcionarios']['count'] = count($funcionarios);
        $this->empresas->setTable('v_plano_associado');
        $dados['plano'] = current($this->empresas->getWhere('id_associado', $dados['admin']['id'],'id_associado'));
        
       /* echo "<pre>";
        print_r($plano);
        echo "</pre>";
        die();*/
        $this->template('home', $dados);

        //$this->load->view('admin/template/header');
        //  $this->load->view('admin/home');
        //$this->load->view('admin/template/footer');
    }

    public function home() {
        
    }

    private function template($view, $dados = NULL) {
        $this->load->view('admin/template/header', $dados);
        $this->load->view('admin/template/header_nav');
        $this->load->view('admin/template/sideBar');
        $this->load->view("admin/$view");
        $this->load->view('admin/template/right-sidebar-nav');
        $this->load->view('admin/template/footer');
    }

    public function page404() {
        echo "pagina não encontrada, não foi dessa vez mané";
    }

}
