<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{

		parent::__construct(); 

		// como vai aparecer em todas a paginas, chamamos o model aqui no construtor - PJCS 
		// vamos chamar o model "Categorias_model" para listagem dos models cadastrados
				// como fosse:
				// modelcategorias = new Categorias_model(); 
		$this->load->model('categorias_model','modelcategorias');
		$this->load->model('produto_model','modelprodutos'); 
		

				// vamos cria uma var "$categorias" e carrega-la com o resultado 
		$this->categorias = $this->modelcategorias->listar_categorias(); 
		$this->ativos     = $this->modelprodutos->produtos_ativos();
		$this->destaques  = $this->modelprodutos->produtos_destaques(); 



	}

	public function index()
	{

		// vamos carregar os "$dados" com a variavel "$categoria" carregado no CONSTRUTOR
		$dados = array(
			'categorias' 	=> $this->categorias, 
			'ativos' 			=> $this->ativos,
			'destaques' 	=>	$this->destaques
		) ;

		// dados a serem enviados para o cabeçalho
		//$dados['nomeblog'] 	= "Blog do Paulão"; 
		//$dados['titulo'] 		= 'Pagina Inicial';
		//$dados['subtitulo'] = 'Postagens Recentes';

		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/home');
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/footer');
		$this->load->view('frontend/template/html-footer'); 

	}


}
