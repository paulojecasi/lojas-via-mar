<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct()
	{

		parent::__construct(); 

		$this->load->model('usuarios_model','listausuarios');
		$this->lista_usuarios = $this->listausuarios->listar_usuarios(); 

	}

	public function index()
	{

		if (!$this->session->userdata('logado')){
				redirect(base_url('admin/login')); 
		}

		// vamos carregar a biblioteca de TABELAS
		$this->load->library('table'); 

		// dados a serem enviados para o cabeçalho
		$dados['titulo'] 		= 'Painel de Controle';
		$dados['subtitulo'] = 'Usuarios';
		$dados['lista_usuarios']  = $this->lista_usuarios;  

		$this->load->view('backend/template/html-header', $dados);
		$this->load->view('backend/template/template');
		$this->load->view('backend/usuarios');
		$this->load->view('backend/template/html-footer'); 

	}

	public function page_login(){

		$dados['titulo'] 		= 'Painel de Controle';
		$dados['subtitulo'] = 'Entrar no Sistema';

		$this->load->view('backend/template/html-header', $dados);
		$this->load->view('backend/login');
		$this->load->view('backend/template/html-footer');

	}

	public function login(){
		// validar form
		$this->load->library('form_validation');
		$this->form_validation->set_rules(
		'txt-user',        // id do input (template)
		'Usuário',		     // nome da label (template)
		'required|min_length[3]'); 	//requerido|minimo 3 caract|
		$this->form_validation->set_rules(
		'txt-senha','Senha','required|min_length[3]'); 	 
				
		if ($this->form_validation->run() == FALSE){
				$this->page_login();   // se nao validar, retorna para a pagina
		} else {
				// carregar as var com os campos do formulario
				$usuario = $this->input->post('txt-user');
				$senha   = $this->input->post('txt-senha'); 

				$this->db->where('user=',$usuario);
				$this->db->where('senha=',$senha);
				$userLogado = $this->db->get('usuario')->result();

				if (count($userLogado) == 1){
						$dadosSessao['userLogado'] = $userLogado[0];
						$dadosSessao['logado'] = TRUE; 
						$this->session->set_userdata($dadosSessao); 
						redirect(base_url('admin')); 
				} else {
						$dadosSessao['userLogado'] = NULL; 
						$dadosSessao['logado'] = FALSE; 
						$this->session->unset_userdata($dadosSessao); 

						$mensagem ="Usuario ou senha invalido"; 
						$this->session->set_userdata('mensagemErro',$mensagem); 

						redirect(base_url('admin/login')); 

				}
		}
	}

	public function logout(){

		$dadosSessao['userLogado'] = NULL; 
		$dadosSessao['logado'] = FALSE; 
		$this->session->set_userdata($dadosSessao); 
		$this->session->unset_userdata($dadosSessao,'userLogado'); 
		$this->session->unset_userdata($dadosSessao,'logado');
		redirect(base_url('admin/login')); 

	}
}
