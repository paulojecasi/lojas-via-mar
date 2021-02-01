<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto_model extends CI_Model
{

	public $id;
	public $desproduto; 

	public function __construct(){

		parent::__construct(); 

	}

	public function listar_produtos($pular=null, $produtos_por_pagina=null)
	{

		//echo "pular =".$pular;
		//echo "qt = ".$produtos_por_pagina;
		//exit;  

		if ($pular && $produtos_por_pagina){
			$this->db->limit($produtos_por_pagina, $pular);
		} else {
			$this->db->limit($this->session->userdata('itensPorPagina')); 
		}

		// vamos ver o tipo de listagem escolhido
		// se nao vier preenchido, vamos carregar como TODOS OS PRODUTOS 
		// geralmente acontece ao acessar o ADMIN, pois a SESSION ainda não
		// foi preenchida - PJCS 
		if (!$this->session->userdata('tipolista')){
			$this->session->set_userdata('tipolista','todos');
		} 
		$this->listagem_produto_escolha(); 
		
		$this->db->order_by('desproduto','ASC'); 
		return $this->db->get('produto')->result(); 

	}

	public function listar_produto($id)
	{
		$this->db->where('md5(idproduto)=', $id); 
		return $this->db->get('produto')->result(); 

	}

	public function listagem_produto_escolha(){

		if ($this->session->userdata('tipolista')=="destsim"){
			$this->db->where('produtodestaque=',1); 
		} elseif ($this->session->userdata('tipolista')=="destnao"){
			$this->db->where('produtodestaque=',2); 
		} elseif ($this->session->userdata('tipolista')=="sitesim"){
			$this->db->where('produtosite=',1); 
		} elseif ($this->session->userdata('tipolista')=="sitenao"){
			$this->db->where('produtosite=',2); 
		} elseif ($this->session->userdata('tipolista')=="ativos"){
			$this->db->where('produtoativo=',1);
		} elseif ($this->session->userdata('tipolista')=="inativos"){
			$this->db->where('produtoativo=',2);
		} elseif ($this->session->userdata('tipolista')=="destcatsim"){
			$this->db->where('destaquenacategoria=',1);
		} elseif ($this->session->userdata('tipolista')=="destcatnao"){
			$this->db->where('destaquenacategoria=',2);
		}

	}

	public function listar_produtos_promocao()
	{

		$this->db->where('vlpromocao > ',0);
		$this->db->where('vlpromocao < vlpreco'); 
		$this->db->order_by('desproduto','ASC'); 
		return $this->db->get('produto')->result(); 

	}

	public function adicionar($idcategoria,$nomeproduto,$desproduto,$corproduto,$vlpreco,$vllargura,$vlaltura,$vlcomprimento,$vlpeso,$vlpromocao,$produtoativo,$produtodestaque,$destaquenacategoria,$produtosite)
	{

		$dados["idcategoria"]	= $idcategoria;
		$dados["desproduto"]	= $desproduto;
		$dados["corproduto"]	= $corproduto;
		$dados["vlpreco"]			= $vlpreco;
		$dados["vllargura"]		= $vllargura;
		$dados["vlaltura"]		= $vlaltura;
		$dados["vlcomprimento"]= $vlcomprimento;
		$dados["vlpeso"]			= $vlpeso;
		$dados["vlpromocao"]	= $vlpromocao;
		$dados["produtoativo"]= $produtoativo;
		$dados["produtodestaque"]= $produtodestaque;
		$dados["destaquenacategoria"]= $destaquenacategoria;
		$dados["produtosite"]= $produtosite;

		return $this->db->insert('produto',$dados); 
	}

	public function alterar($idproduto,$idcategoria,$nomeproduto,$desproduto,$corproduto,$vlpreco,$vllargura,$vlaltura,$vlcomprimento,$vlpeso,$vlpromocao,$produtoativo,$produtodestaque,$destaquenacategoria,$produtosite)
	{
		$dados["idcategoria"]	= $idcategoria;
		$dados["desproduto"]	= $desproduto;
		$dados["corproduto"]	= $corproduto;
		$dados["vlpreco"]			= $vlpreco;
		$dados["vllargura"]		= $vllargura;
		$dados["vlaltura"]		= $vlaltura;
		$dados["vlcomprimento"]= $vlcomprimento;
		$dados["vlpeso"]			= $vlpeso;
		$dados["vlpromocao"]	= $vlpromocao;
		$dados["produtoativo"]= $produtoativo;
		$dados["produtodestaque"]= $produtodestaque;
		$dados["destaquenacategoria"]= $destaquenacategoria;
		$dados["produtosite"]= $produtosite;

		$this->db->where('idproduto=', $idproduto); 
		return $this->db->update('produto',$dados); 
	}

	public function excluir($id){

		$this->db->where('md5(idproduto)=', $id);
		return $this->db->delete('produto'); 

	}

	public function alterar_img($idproduto, $dir_imagem){
		$dados['img'] = $dir_imagem; // identifica que o usuario ja tem foto 

		$this->db->where('md5(idproduto)=', $idproduto);
		return $this->db->update('produto',$dados);
	}

	public function contar(){
		// vamos ver o tipo de listagem escolhido para contagem 
		$this->listagem_produto_escolha();
		$this->db->from('produto'); 
		return $this->db->count_all_results(); 
	}


	/* ================== FRONTEND ===============*/

	// seleciona somente produtos aptos para o site
	public function valida_produtos(){
		$this->db->where('produtoativo=',1);
		$this->db->where('produtosite=',1);
		$this->db->where('nomeproduto!=',"");
		$this->db->where('vlpreco > ',0); 
		$this->db->where('img!=',"");

	}

	public function lista_produtos_site($categoria=null){

		if ($categoria) {
				$this->db->where('md5(idcategoria)=',$categoria);
		}

		$this->valida_produtos(); 
		return $this->db->get('produto')->result(); 

	}

	// lista os produtos em destaques no site 
	public function produtos_destaques(){

		$this->valida_produtos(); 
		$this->db->where('produtodestaque=',1);

		return  $this->db->get('produto')->result();

	}

	// pra listar as categorias que ficarao em destaques no site
	public function produtos_da_categoria(){	
		
		$this->valida_produtos(); 
		$this->db->where('categoriadest=',1); 
		$this->db->where('destaquenacategoria=',1); 
		$this->db->from('produto');
		$this->db->join('categoria','categoria.id = produto.idcategoria');
		return  $this->db->get()->result();

	}


}