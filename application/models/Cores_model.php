<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cores_model extends CI_Model {

	public function __construct(){

		parent::__construct(); 

	}

	public function listar_cores(){

		$this->db->order_by('descor','ASC'); 

		return $this->db->get('cores')->result(); 

	}
}