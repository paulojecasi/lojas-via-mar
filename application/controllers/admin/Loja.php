<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loja extends CI_Controller {

	public function __construct()
	{

		parent::__construct(); 

		$this->load->model('loja_model','modelloja'); 
		$this->load->model('picklist_model','modellistaescolha'); 

		$this->loja 			= $this->modelloja->listar_loja(); 
		$this->opcoes 		= $this->modellistaescolha->lista_opcoes();

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
		$dados['subtitulo'] = 'Loja';
		$dados['loja']  = $this->loja;  
		$dados['opcoes'] = $this->opcoes; 

		$this->load->view('backend/template/html-header', $dados);
		$this->load->view('backend/template/template');
		$this->load->view('backend/mensagem');
		$this->load->view('backend/loja');
		$this->load->view('backend/template/html-footer'); 

	}

	public function inserir()
	{
		if (!$this->session->userdata('logado')){
				redirect(base_url('admin/login')); 
		}
		// validar form
		$this->load->library('form_validation');
		$this->form_validation->set_rules(
		'nome','Nome da Loja','required|min_length[3]|is_unique[loja.nome]');  

		if ($this->form_validation->run() == FALSE){

				$this->index();   // se nao validar, retorna para a pagina

		} else {

			$nome= $this->input->post('nome');
			$endereco= $this->input->post('endereco');
			$enderecosite= $this->input->post('enderecosite');
			$promocaosite= $this->input->post('promocaosite');
			$email= $this->input->post('email');
			$emailsite= $this->input->post('emailsite');
			$facebook= $this->input->post('facebook');
			$facebooksite= $this->input->post('facebooksite');
			$instagram= $this->input->post('instagram');
			$instagramsite= $this->input->post('instagramsite');
			$whatsapp= $this->input->post('whatsapp');
			$whatsappsite= $this->input->post('whatsappsite');
			$fonefixo= $this->input->post('fonefixo');
			$fonefixosite= $this->input->post('fonefixosite');
			$fonecelular= $this->input->post('fonecelular');
			$fonecelularsite= $this->input->post('fonecelularsite');
			$localgoogle= $this->input->post('localgoogle');
			$localgooglesite= $this->input->post('localgooglesite');
			$sobrenos= $this->input->post('sobrenos');
			$sobrenossite= $this->input->post('sobrenossite');
			$siteonline= $this->input->post('siteonline');

			if ($this->modelloja->adicionar($nome,$endereco,$enderecosite,$promocaosite,$email,$emailsite,$facebook,$facebooksite,$instagram,$instagramsite,$whatsapp,$whatsappsite,$fonefixo,$fonefixosite,$fonecelular,$fonecelularsite,$localgoogle,$localgooglesite,$sobrenos,$sobrenossite,$siteonline)) {
				
				$mensagem ="Loja Adicionada Com Sucesso !"; 

				// usando seção da framework (session)
				$this->session->set_userdata('mensagem',$mensagem); 
				
			} else {

				$mensagem = "Houve um erro ao adicionar Loja!"; 

				$this->session->set_userdata('mensagemErro',$mensagem); 

			}

			redirect(base_url('admin/loja'));

		}

	}

	public function alterar($id)
	{
		if (!$this->session->userdata('logado')){
				redirect(base_url('admin/login')); 
		}

		// dados a serem enviados para o cabeçalho
		$lista_loja= $this->modelloja->lista_loja($id);

		$dados['titulo'] 		= 'Painel de Controle';
		$dados['subtitulo'] = 'Loja - Alteração';
		$dados['lista_loja']  = $lista_loja; 
		$dados['opcoes'] = $this->opcoes; 

		$this->load->view('backend/template/html-header', $dados);
		$this->load->view('backend/template/template');
		$this->load->view('backend/mensagem');
		$this->load->view('backend/loja-altera');
		$this->load->view('backend/template/html-footer');

	}

	public function salvar_alteracoes()
	{
		if (!$this->session->userdata('logado')){
				redirect(base_url('admin/login')); 
		}
		// validar form
		$this->load->library('form_validation');
		$this->form_validation->set_rules(
		'nome','Nome da Loja','required|min_length[3]');  

		if ($this->form_validation->run() == FALSE){

				$this->index();   // se nao validar, retorna para a pagina

		} else {

			$idloja= $this->input->post('idloja');
			$nome= $this->input->post('nome');
			$endereco= $this->input->post('endereco');
			$enderecosite= $this->input->post('enderecosite');
			$promocaosite= $this->input->post('promocaosite');
			$email= $this->input->post('email');
			$emailsite= $this->input->post('emailsite');
			$facebook= $this->input->post('facebook');
			$facebooksite= $this->input->post('facebooksite');
			$instagram= $this->input->post('instagram');
			$instagramsite= $this->input->post('instagramsite');
			$whatsapp= $this->input->post('whatsapp');
			$whatsappsite= $this->input->post('whatsappsite');
			$fonefixo= $this->input->post('fonefixo');
			$fonefixosite= $this->input->post('fonefixosite');
			$fonecelular= $this->input->post('fonecelular');
			$fonecelularsite= $this->input->post('fonecelularsite');
			$localgoogle= $this->input->post('localgoogle');
			$localgooglesite= $this->input->post('localgooglesite');
			$sobrenos= $this->input->post('sobrenos');
			$sobrenossite= $this->input->post('sobrenossite');
			$siteonline= $this->input->post('siteonline');

			if ($this->modelloja->salvar_alteracoes($idloja,$nome,$endereco,$enderecosite,$promocaosite,$email,$emailsite,$facebook,$facebooksite,$instagram,$instagramsite,$whatsapp,$whatsappsite,$fonefixo,$fonefixosite,$fonecelular,$fonecelularsite,$localgoogle,$localgooglesite,$sobrenos,$sobrenossite,$siteonline)) {
				
				$mensagem ="Loja Alterada Com Sucesso !"; 

				// usando seção da framework (session)
				$this->session->set_userdata('mensagem',$mensagem); 
				
			} else {

				$mensagem = "Houve um erro ao Alterar Loja!"; 

				$this->session->set_userdata('mensagemErro',$mensagem); 

			}

			redirect(base_url('admin/loja'));

		}

	}

	public function excluir($id)
	{
		if (!$this->session->userdata('logado')){
				redirect(base_url('admin/login')); 
		}

		if ($this->modelloja->excluir($id)){

			$mensagem ="Loja Excluida Com Sucesso !"; 
			$this->session->set_userdata('mensagem',$mensagem);  

		} else {

			$mensagem ="Erro ao Excluir Loja!"; 
			$this->session->set_userdata('mensagemErro',$mensagem);

		}

		redirect(base_url('admin/loja')); 
	}

}
