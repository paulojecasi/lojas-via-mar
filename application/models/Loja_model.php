<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loja_model extends CI_Model {

	public function __construct(){

		parent::__construct(); 

	}

	public function listar_loja(){

		$this->db->order_by('nome','ASC'); 

		return $this->db->get('loja')->result(); 

	}

	public function lista_loja($id){

		$this->db->where('md5(id)=',$id); 
		return $this->db->get('loja')->result(); 

	}

	public function adicionar($nome,$endereco,$enderecosite,$promocaosite,$email,$emailsite,$facebook,$facebooksite,$instagram,$instagramsite,$whatsapp,$whatsappsite,$fonefixo,$fonefixosite,$fonecelular,$fonecelularsite,$localgoogle,$localgooglesite,$sobrenos,$sobrenossite,$siteonline){


		$dados["nome"]				= 	$nome; 
		$dados["endereco"]		= 	$endereco; 
		$dados["enderecosite"]= 	$enderecosite;
		$dados["promocaosite"]= 	$promocaosite ;
		$dados["email"]				= 	$email ;
		$dados["emailsite"]		= 	$emailsite ;
		$dados["facebook"]		= 	$facebook ;
		$dados["facebooksite"]= 	$facebooksite ;
		$dados["instagram"]		= 	$instagram ;
		$dados["instagramsite"]= 	$instagramsite ;
		$dados["whatsapp"]		= 	$whatsapp ;
		$dados["whatsappsite"]= 	$whatsappsite ;
		$dados["fonefixo"]		= 	$fonefixo ;
		$dados["fonefixosite"]= 	$fonefixosite ;
		$dados["fonecelular"]	= 	$fonecelular ;
		$dados["fonecelularsite"]= $fonecelularsite ;
		$dados["localgoogle"]	= 	$localgoogle ;
		$dados["localgooglesite"]= $localgooglesite ;
		$dados["sobrenos"]		= 	$sobrenos ;
		$dados["sobrenossite"]= 	$sobrenossite ;
		$dados["siteonline"]	= 	$siteonline ;

		return $this->db->insert('loja',$dados); 

	}

	public function salvar_alteracoes($idloja,$nome,$endereco,$enderecosite,$promocaosite,$email,$emailsite,$facebook,$facebooksite,$instagram,$instagramsite,$whatsapp,$whatsappsite,$fonefixo,$fonefixosite,$fonecelular,$fonecelularsite,$localgoogle,$localgooglesite,$sobrenos,$sobrenossite,$siteonline){


		$dados["nome"]				= 	$nome; 
		$dados["endereco"]		= 	$endereco; 
		$dados["enderecosite"]= 	$enderecosite;
		$dados["promocaosite"]= 	$promocaosite ;
		$dados["email"]				= 	$email ;
		$dados["emailsite"]		= 	$emailsite ;
		$dados["facebook"]		= 	$facebook ;
		$dados["facebooksite"]= 	$facebooksite ;
		$dados["instagram"]		= 	$instagram ;
		$dados["instagramsite"]= 	$instagramsite ;
		$dados["whatsapp"]		= 	$whatsapp ;
		$dados["whatsappsite"]= 	$whatsappsite ;
		$dados["fonefixo"]		= 	$fonefixo ;
		$dados["fonefixosite"]= 	$fonefixosite ;
		$dados["fonecelular"]	= 	$fonecelular ;
		$dados["fonecelularsite"]= $fonecelularsite ;
		$dados["localgoogle"]	= 	$localgoogle ;
		$dados["localgooglesite"]= $localgooglesite ;
		$dados["sobrenos"]		= 	$sobrenos ;
		$dados["sobrenossite"]= 	$sobrenossite ;
		$dados["siteonline"]	= 	$siteonline ;

		$this->db->where('id=',$idloja); 
		return $this->db->update('loja',$dados); 

	}

	public function excluir($id){

		$this->db->where('md5(id)=',$id);
		return $this->db->delete('loja');

	}

}