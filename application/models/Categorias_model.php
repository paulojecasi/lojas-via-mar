<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_model extends CI_Model {

	public $id;
	public $titulo; 

	public function __construct(){

		parent::__construct(); 

	}

	public function listar_categorias(){

		//consulta no banco ondenando pelo titulo (ASC= Crescente, DESC= Decrescente)
		$this->db->order_by('titulo','ASC'); 

		// vamos informar a tabela e trazer o resultado 
		return $this->db->get('categoria')->result(); 

	}

	public function adicionar($addcategoria_titulo){

		$dados["titulo"]= $addcategoria_titulo; 
		return $this->db->insert('categoria',$dados); 

	}

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

}