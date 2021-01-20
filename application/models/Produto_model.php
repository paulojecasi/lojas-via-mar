<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto_model extends CI_Model {

	public $id;
	public $desproduto; 

	public function __construct(){

		parent::__construct(); 

	}

	public function listar_produtos(){

		//consulta no banco ondenando pelo titulo (ASC= Crescente, DESC= Decrescente)
		$this->db->order_by('desproduto','ASC'); 

		// vamos informar a tabela e trazer o resultado 
		return $this->db->get('produto')->result(); 

	}


	public function adicionar($addproduto){

		$dados["produto"]= $addproduto; 
		return $this->db->insert('produto',$dados); 

	}

/*
	public function excluir($id){

		$this->db->where('md5(id)=', $id);
		return $this->db->delete('categoria');  

	}

	public function listar_categoria($id){

		$this->db->from('categoria');
		$this->db->where('md5(id)=', $id);
		return $this->db->get()->result(); 
		
	}

	public function alterar($alterar_categoria, $id){
		
		$dados["titulo"]= $alterar_categoria; 
		$this->db->where('id=', $id); 
		return $this->db->update('categoria', $dados); 

	}

	-*/

}