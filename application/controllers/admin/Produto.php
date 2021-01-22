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
		$this->load->view('backend/mensagem');
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
		$this->form_validation->set_rules('corproduto','Cor do Produto','required');

		$this->form_validation->set_rules('idcategoria','Categoria do Produto','required');

		$this->form_validation->set_rules('vlpreco','Preço','required');

		$this->form_validation->set_rules('vllargura','Largura');

		$this->form_validation->set_rules('vlaltura','Altura');

		$this->form_validation->set_rules('vlcomprimento','Comprimento');

		$this->form_validation->set_rules('vlpeso','Peso');

		$this->form_validation->set_rules('vlpromocao','Valor Promoção');

		$this->form_validation->set_rules('produtoativo','Produto Ativo?','required');

		$this->form_validation->set_rules('produtodestaque','Produto Destaque?',
			'required');

		$this->form_validation->set_rules('produtosite','Produto no Site?','required');

		if ($this->form_validation->run() == FALSE){

				$this->index();   // se nao validar, retorna para a pagina

		} else {

			$idcategoria= $this->input->post('idcategoria');
			$desproduto= $this->input->post('txt-desproduto');
			$corproduto= $this->input->post('corproduto');
			$vlpreco= $this->input->post('vlpreco');
			$vllargura= $this->input->post('vllargura');	
			$vlaltura= $this->input->post('vlaltura');
			$vlcomprimento= $this->input->post('vlcomprimento');
			$vlpeso= $this->input->post('vlpeso');
			$vlpromocao= $this->input->post('vlpromocao');
			$produtoativo= $this->input->post('produtoativo');
			$produtodestaque= $this->input->post('produtodestaque');
			$produtosite= $this->input->post('produtosite');

			if ($this->modelproduto->adicionar($idcategoria,$desproduto,$corproduto, $vlpreco,$vllargura,$vlaltura,$vlcomprimento,$vlpeso,$vlpromocao,$produtoativo,$produtodestaque,$produtosite)){

				$mensagem ="Produto Adicionado Com Sucesso !"; 
				$this->session->set_userdata('mensagem',$mensagem); 
				
			} else {

				$mensagem = "Houve um erro ao adicionar Produto !"; 
				$this->session->set_userdata('mensagemErro',$mensagem); 

			}

			redirect(base_url('admin/produto'));
		}
	}

	public function alterar($id)
	{
		// vamos carregar a biblioteca de TABELAS
		$produto = $this->modelproduto->listar_produto($id); 

		$dados = array(
			'produto' 		=> $produto, 
		  'categorias' 	=> $this->categorias,
			'titulo' 			=> 'Painel de Controle',
			'subtitulo' 	=> 'Manutenção de Produtos', 
			'opcoes'			=> $this->opcoes,
			'cores'				=> $this->cores 
		); 

		$this->load->view('backend/template/html-header', $dados);
		$this->load->view('backend/template/template');
		$this->load->view('backend/mensagem');
		$this->load->view('backend/altera-produto');
		$this->load->view('backend/template/html-footer'); 
	}

	public function excluir($id){

		if ($this->modelproduto->excluir($id)) {
			$mensagem ="Produto Excluido Com Sucesso!"; 
			$this->session->set_userdata('mensagem',$mensagem); 
		} else {
			$mensagem ="Erro ao Excluir Produto!"; 
			$this->session->set_userdata('mensagemErro',$mensagem);
		}

		redirect(base_url('admin/produto'));
	}

	public function salvar_alteracoes(){

		// validar form
		$this->load->library('form_validation');
		$this->form_validation->set_rules(
		'txt-desproduto',          // name do input (template)
		'Descrição do Produto',		 // nome da label (template)
		'required|min_length[3]'); 
		$this->form_validation->set_rules('corproduto','Cor do Produto','required');

		$this->form_validation->set_rules('idcategoria','Categoria do Produto','required');

		$this->form_validation->set_rules('vlpreco','Preço','required');

		$this->form_validation->set_rules('vllargura','Largura');

		$this->form_validation->set_rules('vlaltura','Altura');

		$this->form_validation->set_rules('vlcomprimento','Comprimento');

		$this->form_validation->set_rules('vlpeso','Peso');

		$this->form_validation->set_rules('vlpromocao','Valor Promoção');

		$this->form_validation->set_rules('produtoativo','Produto Ativo?','required');

		$this->form_validation->set_rules('produtodestaque','Produto Destaque?',
			'required');

		$this->form_validation->set_rules('produtosite','Produto no Site?','required');

		if ($this->form_validation->run() == FALSE){
				// se nao validar, retorna para a pagina
				$this->alterar($this->input->post('idproduto'));   
		} else {
			$idproduto= $this->input->post('idproduto');
			$idcategoria= $this->input->post('idcategoria');
			$desproduto= $this->input->post('txt-desproduto');
			$corproduto= $this->input->post('corproduto');
			$vlpreco= $this->input->post('vlpreco');
			$vllargura= $this->input->post('vllargura');	
			$vlaltura= $this->input->post('vlaltura');
			$vlcomprimento= $this->input->post('vlcomprimento');
			$vlpeso= $this->input->post('vlpeso');
			$vlpromocao= $this->input->post('vlpromocao');
			$produtoativo= $this->input->post('produtoativo');
			$produtodestaque= $this->input->post('produtodestaque');
			$produtosite= $this->input->post('produtosite');

			if ($this->modelproduto->alterar($idproduto,$idcategoria,$desproduto,$corproduto, $vlpreco,$vllargura,$vlaltura,$vlcomprimento,$vlpeso,$vlpromocao,$produtoativo,$produtodestaque,$produtosite)){

				$mensagem ="Produto Alterado Com Sucesso !"; 
				$this->session->set_userdata('mensagem',$mensagem); 
				
			} else {

				$mensagem = "Houve um erro ao Alterar Produto !"; 
				$this->session->set_userdata('mensagemErro',$mensagem); 

			}

			redirect(base_url('admin/produto/alterar/'.md5($idproduto)));

		}


	}

	public function nova_imagem(){

		if (!$this->session->userdata('logado')){
				redirect(base_url('admin/login')); 
		}

		$idproduto = $this->input->post('id_produto'); 
		$config['upload_path']= './assets/frontend/img/products'; 
		$config['allowed_types']= 'jpg'; 
		$config['file_name']= $idproduto.'.jpg';
		$config['overwrite']= TRUE;  // sobrepor a imagem sempre que for alterada(mesmo ID)
		$this->load->library('upload', $config); 

		$redirect = base_url('admin/produto/alterar/'.$idproduto);

		if (!$this->upload->do_upload()){

				$mensagem = "ERRO!".$this->upload->display_errors(); 
				$this->session->set_userdata('mensagemErro',$mensagem);

				redirect($redirect);

		} else {

				$config2['source_image']= './assets/frontend/img/products/'.$idproduto.'.jpg';
				$config2['create_thumb']= FALSE;
				$config2['width']= 800;   // largura da imagem
				$config2['height']= 600; 	// altura da imagem

				$this->load->library('image_lib', $config2); 

				if ($this->image_lib->resize()){

						$dir_imagem = $config2['source_image'];

						if ($this->modelproduto->alterar_img($idproduto, $dir_imagem)){

								$mensagem = "Upload da Imagem Realizado Com Sucesso!";
								$this->session->set_userdata('mensagem',$mensagem);
						} else{
								$mensagem = "Erro ao Realizar o Upload da Imagem!";
								$this->session->set_userdata('mensagemErro',$mensagem);
						}

						redirect($redirect); 

				} else {

						$mensagem = "ERRO!".$this->image_lib->display_errors();
						$this->session->set_userdata('mensagemErro',$mensagem);

						redirect($redirect); 
						
				}

		}

	}

}
