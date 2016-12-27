<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Servicos extends CI_Controller{
    private $data = null;
    public function __construct() {
        parent::__construct();
    }
    public function index() {
        $this->data['servicos'] = $this->servicos->getAll('nome');
        foreach ($this->data['servicos'] as &$servicos) {
            $this->servicos->setTable('v_empresa_servico');
            $servicos['detalhes'] = $this->servicos->getWhere('id_servico',$servicos['id']);
        }
//        echo "<pre>";
//        print_r($this->data['servicos']);
//        die();
        $this->load->view('template/header',  $this->data);
        $this->load->view('servicos');
        $this->load->view('template/footer');
    }
    public function agendar($servico,$id_func_serv) {
        $this->funcionarios->setTable('v_funcionario');
        $funcionario= current($this->funcionarios->getWhere('id_func_serv',$id_func_serv));
        $agendamentos = $this->agendamentos->getWhere('id_funcionario',$funcionario['id']);
        $this->data['servicos'] = $this->funcionarios->getWhere('id',$funcionario['id']);
        
        //die(print_r($this->data['servicos']));
        
        $this->data['eventos'] = preg_replace('/"([a-zA-Z_]+[a-zA-Z0-9_]*)":/','$1:',json_encode($agendamentos)) ;
        if(is_null($agendamentos)){
            $this->data['eventos']=  json_encode(array()) ;
        }
       
        $this->data['funcionario']=$funcionario;
        $this->load->view('template/header',  $this->data);
        $this->load->view('agendar');
        $this->load->view('template/footer');
        //print_r($funcionario);
    }
    
}
