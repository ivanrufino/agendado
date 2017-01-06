<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('logged_admin') || $this->session->userdata('logged_admin') != 'in') {
            redirect('login_adm');
        }
        $this->dados['admin'] = $this->session->userdata;
    }

    public function index() {
        //$this->dados['admin'] = $this->session->userdata;
        $servicos = $this->servicos->getWhere('id_empresa', $this->dados['admin']['id_empresa'], $sort = 'nome');
        $this->dados['servicos'] = $servicos;
        $this->dados['servicos']['count'] = count($servicos);
        $this->agendamentos->setTable('v_cliente_agendamento');
        $cliente_agendamentos = $this->agendamentos->getWhere('id_empresa', $this->dados['admin']['id_empresa'],'nome','asc','id_cliente');
        
        $this->dados['cliente_agendamentos'] = $cliente_agendamentos;
        $this->dados['cliente_agendamentos']['count'] = count($cliente_agendamentos);
        
        
        $funcionarios = $this->funcionarios->getWhere('id_empresa', $this->dados['admin']['id_empresa'], $sort = 'nome');
        $this->dados['funcionarios'] = $funcionarios;
        $this->dados['funcionarios']['count'] = count($funcionarios);
        $this->empresas->setTable('v_plano_associado');
        $this->dados['plano'] = current($this->empresas->getWhere('id_associado', $this->dados['admin']['id'],'id_associado'));
        
       /* echo "<pre>";
        print_r($plano);
        echo "</pre>";
        die();*/
        $this->template('home', $this->dados);

        //$this->load->view('admin/template/header');
        //  $this->load->view('admin/home');
        //$this->load->view('admin/template/footer');
    }

    public function servicos() {
        $this->dados['js']=array('plugins/data-tables/js/jquery.dataTables.min.js','plugins/data-tables/data-tables-script.js');
        $this->dados['servicos'] = $this->servicos->getWhere('id_empresa', $this->dados['admin']['id_empresa'], $sort = 'nome');
         $this->template('servicos', $this->dados);
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
