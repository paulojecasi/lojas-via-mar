<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{

		parent::__construct(); 


		$this->load->model('categorias_model','modelcategorias');
		$this->load->model('produto_model','modelprodutos'); 
		$this->load->model('loja_model','modelloja'); 
		$this->load->model('cores_model','modelcores'); 
		

				// vamos cria uma var "$categorias" e carrega-la com o resultado 
		$this->categorias = $this->modelcategorias->listar_categorias(); 
		//$this->destaques  = $this->modelprodutos->produtos_destaques(); 
		$this->produtosdacategoria = $this->modelprodutos->produtos_da_categoria(); 
		$this->loja 			= $this->modelloja->listar_loja(); 
		$this->cores 			= $this->modelcores->listar_cores(); 

	}

	public function index()
	{

		// vamos carregar os "$dados" com a variavel "$categoria" carregado no CONSTRUTOR
		$dados = array(
			'categorias' 	=> $this->categorias, 
			//'destaques' 	=>	$this->destaques,
			'produtoscategoria'	=> $this->produtosdacategoria,
			'loja' 				=> $this->loja
		) ;

		foreach ($this->loja as $lojasviamar){
        $siteonline =$lojasviamar->siteonline;
    } 

    if ($siteonline != 1){
    	$this->load->view('frontend/template/html-header', $dados);
    	$this->load->view('frontend/template/siteoff');
    }else{
			$this->load->view('frontend/template/html-header', $dados);
			$this->load->view('frontend/template/header');
			$this->load->view('frontend/home');
			$this->load->view('frontend/template/aside');
			$this->load->view('frontend/template/footer');
			$this->load->view('frontend/template/html-footer'); 
		} 

	}

	public function lista_produtos($categoria){

		
		$dados = array(
			'categoria' => $this->modelcategorias->listar_categoria($categoria),
			'categorias' 	=> $this->categorias, 
			'listaprodutossite'	=> $this->modelprodutos->lista_produtos_site($categoria),
			'loja' 				=> $this->loja
		) ;

		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/produtos-lista');
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/footer');
		$this->load->view('frontend/template/html-footer'); 

	}

	public function lista_produtos_promocao(){
		/* agora os produtos em promoção soa carregados estaticamente 
		'listaprodutosprom'	=> $this->modelprodutos->listar_produtos_promocao(),
		*/

		$dados = array(
			'loja' 				=> $this->loja
		) ;

		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/produtos-promocao');
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/footer');
		$this->load->view('frontend/template/html-footer'); 

	}

	public function detalhe_produto($idproduto){

		$dados = array(
			'detalheproduto'	=> $this->modelprodutos->detalhe_produto($idproduto),
			'loja' 				=> $this->loja, 
			'cores'				=> $this->cores
		) ;

		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/produto-detalhes');
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/footer');
		$this->load->view('frontend/template/html-footer'); 

	}


}
