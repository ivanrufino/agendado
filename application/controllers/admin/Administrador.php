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
            if (is_null($dados['id_empresa'])) {
                redirect('cadastro_completo');
            } else {
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
                'nome_responsavel' => $this->input->post('nome_responsavel'),
                'sobrenome_responsavel' => $this->input->post('sobrenome_responsavel'),
                'login' => $this->input->post('login'),
                'email' => $this->input->post('email'),
                'senha' => sha1($this->input->post('senha')),
            );
            $id_associado = $this->associados->insert($dados);

            if ($id_associado) {
                redirect("admin/cadastro_efetuado/$id_associado");
            } else {
                $this->cadastro();
            }
        }
    }

    public function cadastrar_completo() {
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger red-text">', '</div>');
        $this->form_validation->set_rules('nome', '<strong>Nome</strong>', 'trim|required');
        $this->form_validation->set_rules('tipo', '<strong>Tipo</strong>', 'trim|required');
        if ($this->input->post('tipo') == 1) {
            $this->form_validation->set_rules('cnpj_cpf', '<strong>CNPJ</strong>', 'trim|required|is_unique[empresa.cnpj]', array('is_unique' => 'Este %s já esta sendo utilizado.'));
        }
        if ($this->input->post('tipo') == 2) {
            $this->form_validation->set_rules('cnpj_cpf', '<strong>CPF</strong>', 'trim|required|is_unique[empresa.cpf]', array('is_unique' => 'Este %s já esta sendo utilizado.'));
        }

        $this->form_validation->set_rules('url', '<strong>URL</strong>', 'trim|required|is_unique[empresa.url]', array('is_unique' => 'Esta %s já esta sendo utilizado.'));
        $this->form_validation->set_rules('telefone', '<strong>Telefone</strong>', 'trim|required');
        $this->form_validation->set_rules('hora_inicio', '<strong>hora de inicio</strong>', 'trim|required|callback_valida_hora');
        $this->form_validation->set_rules('hora_fim', '<strong>hora Final</strong>', 'trim|required|callback_valida_hora|callback_checa_hora_maior');

        if ($this->form_validation->run() == FALSE) {
            $this->cadastro_completo();
        } else {
            $dados = array(
            'nome' => $this->input->post('nome'),
            'tipo' => $this->input->post('tipo'),
            'cnpj' => $this->input->post('tipo')==1? $this->input->post('cnpj_cpf'):"",
            'cpf' => $this->input->post('tipo')==2? $this->input->post('cnpj_cpf'):"",
            'url' => $this->input->post('url'),
            'telefone' => $this->input->post('telefone'),
            'hora_inicio' => $this->input->post('hora_inicio'),
            'hora_inicio' => $this->input->post('hora_inicio'),
            );
            $id_empresa = $this->empresas->insert($dados);
           

            if ($id_empresa) {
               $dados_assoc= $this->session->userdata;
               
                 $this->associados->update($dados_assoc['id'], array('id_empresa'=>$id_empresa));
                 
                $dados_assoc['id_empresa'] = $id_empresa;
                $this->session->set_userdata($dados_assoc);
                redirect("admin");
            } else {
                $this->cadastro_completo();
            }
        }
    }

    public function checa_hora_maior($hora_enviada) {
        if($hora_enviada ==""){
            return ;
        }
        $hora1 = explode(':', $hora_enviada)[0];
        $minuto1 = explode(':', $hora_enviada)[1];

        $hora2 = explode(':', $this->input->post('hora_inicio'))[0];
        $minuto2 = explode(':', $this->input->post('hora_inicio'))[1];

        if ($hora1 < $hora2 || ($hora1 == $hora2 && $minuto1 <= $minuto2)) {
            $this->form_validation->set_message('checa_hora_maior', "{field} deve ser maior que hora inicial");
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function valida_hora($hora_enviada) {
        if($hora_enviada ==""){
            return ;
        }
        $minutos_permitidos = array('0', '15', '30', '45');
        $hora = explode(':', $hora_enviada)[0];
        $minuto = explode(':', $hora_enviada)[1];
        if (!in_array($minuto, $minutos_permitidos)) {
            $this->form_validation->set_message('valida_hora', "Selecione multiplos de 15 ou 0 para os minutos<br> Ex.: 0, 15, 30, 45");
            return FALSE;
        } else if ($hora > 23) {
            $this->form_validation->set_message('valida_hora', 'Selecione uma hora valida, entre 0 e 23');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function cadastro_efetuado($id_associado = NULL) {
        $dados = $this->associados->getById($id_associado);
        $this->load->view('admin/template/header', $dados);
        if (is_null($id_associado)) {
            $this->login();
        } else {
            $this->session->set_userdata($dados);
            $this->load->view("admin/cadastro_efetuado");
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login_adm');
    }

}
