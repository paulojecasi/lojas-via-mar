<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_Controller {

	public function __construct()
	{

		parent::__construct(); 

		//vamos verificar se o usuario esta logado para acessar a pagina
		if (!$this->session->userdata('logado')){
				redirect(base_url('admin/login')); 
		}

				// vamos chamar o model produto_model
		$this->load->model('produto_model','modelproduto');
				// vamos chamar o model categorias_model
		$this->load->model('categorias_model','modelcategorias');
		$this->load->model('picklist_model','modellistaescolha'); 

				// vamos cria uma var e carrega-la com o resultado 
		$this->produtos 	= $this->modelproduto->listar_produtos(); 
		$this->categorias = $this->modelcategorias->listar_categorias(); 
		$this->opcoes 		= $this->modellistaescolha->lista_opcoes(); 
		$this->cores 			= $this->modellistaescolha->lista_cores(); 

	}

	public function index()
	{

		// vamos carregar a biblioteca de TABELAS
		$this->load->library('table'); 

		$dados = array(
			'produtos' 		=> $this->produtos, 
		  'categorias' 	=> $this->categorias,
			'titulo' 			=> 'Painel de Controle',
			'subtitulo' 	=> 'Produtos', 
			'opcoes'			=> $this->opcoes,
			'cores'				=> $this->cores 
		); 

		$this->load->view('backend/template/html-header', $dados);
		$this->load->view('backend/template/template');
		$this->load->view('backend/produto');
		$this->load->view('backend/template/html-footer'); 

	}


	public function inserir()
	{
		// validar form
		$this->load->library('form_validation');
		$this->form_validation->set_rules(
		'txt-desproduto',          // name do input (template)
		'Descrição do Produto',		 // nome da label (template)
		'required|min_length[3]'); 

		$this->form_validation->set_rules('idcategoria','Categoria do Produto','required');

		$this->form_validation->set_rules('vlpreco','Preço','required');

		$this->form_validation->set_rules('vllargura','Largura','required');

		$this->form_validation->set_rules('vlaltura','Altura','required');

		$this->form_validation->set_rules('vlcomprimento','Comprimento','required');

		$this->form_validation->set_rules('vlpeso','Peso','required');

		$this->form_validation->set_rules('vlpromocao','Valor Promoção','required');

		$this->form_validation->set_rules('txt-produtoativo','Produto Ativo?','required');

		$this->form_validation->set_rules('txt-produtodestaque','Produto Destaque?',
			'required');

		$this->form_validation->set_rules('txt-produtosite','Produto no Site?','required');

		$this->form_validation->set_rules('txt-img','Foto do Produto','required');

		if ($this->form_validation->run() == FALSE){

				$this->index();   // se nao validar, retorna para a pagina

		} else {

			$addproduto= $this->input->post(
				'idcategoria',
				'txt-desproduto',
				'vlpreco',
				'vllargura',
				'vlaltura',
				'vlcomprimento',
				'vlpeso',
				'vlpromocao',
				'txt-img', 
				'txt-produtoativo',
				'txt-produtodestaque',
				'txt-produtosite');

			if ($this->modelproduto->adicionar($addproduto)){
				$mensagem ="Categoria Adicionada Com Sucesso !"; 

				// usando seção da framework (session)
				$this->session->set_userdata('mensagem',$mensagem); 
				
			} else {

				$mensagem = "Houve um erro ao adicionar Categoria !"; 

				$this->session->set_userdata('mensagemErro',$mensagem); 

			}

			redirect(base_url('admin/produto'));

		}

	}

	/*
	public function excluir($id){

		if ($this->modelcategorias->excluir($id)){

			$mensagem ="Categoria Excluida Com Sucesso !"; 

			$this->session->set_userdata('mensagem',$mensagem); 

		} else {

			$mensagem ="Houve um ERRO ao Excluir Categoria !";

			$this->session->set_userdata('mensagemErro',$mensagem); 

		}

		redirect(base_url('admin/categoria'));

	}

	public function alterar($id){

		$dados['categoria'] = $this->modelcategorias->listar_categoria($id); 

		// dados a serem enviados para o cabeçalho
		$dados['titulo'] 		= 'Painel de Controle';
		$dados['subtitulo'] = 'Categoria - Alteração';

		$this->load->view('backend/template/html-header', $dados);
		$this->load->view('backend/template/template');
		$this->load->view('backend/alterar-categoria');
		$this->load->view('backend/template/html-footer'); 

	}


	public function salvar_alteracoes(){
		// validar form
		$this->load->library('form_validation');
		$this->form_validation->set_rules(
		'txt-categoria',        // id do input (template)
		'Nome da Categoria',		// nome da label (template)
		'required|min_length[3]|is_unique[categoria.titulo]'); //requerido|minimo 3 caract|
																													 //unico(nao repete o titulo
				
		if ($this->form_validation->run() == FALSE){

			$this->index();   // se nao validar, retorna para a pagina

		} else {

			$alterar_categoria= $this->input->post('txt-categoria');
			$id= $this->input->post('txt-id');

			if ($this->modelcategorias->alterar($alterar_categoria, $id)){

				$mensagem ="Categoria Alterada Com Sucesso !"; 

				// usando seção da framework (session)
				$this->session->set_userdata('mensagem',$mensagem); 

			} else {

				$mensagem = "Houve um erro ao Alterar Categoria!"; 

				$this->session->set_userdata('mensagemErro',$mensagem); 

			}


			redirect(base_url('admin/categoria'));

		}

	}

	*/

}
