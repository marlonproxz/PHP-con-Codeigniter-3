<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Libros_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function listarLibros()
	{
		//$this->db->where('autor_libro', 'Clayton');
		$this->db->order_by('nombre_libro', 'asc');
		$query = $this->db->get('libros');
		return $query->result();
	}

	public function getById($id = NULL){

		if($id){

			/*
			$this->db->where('id', $id);
			$this->db->limit(1);
			$query = $this->db->get('libros');
			return $query->row()*/

			$this->db->select('libros.*, resumen.resumen');
			$this->db->from('libros');
			$this->db->join('resumen', 'libros.id = resumen.id_libro', 'left');
			$this->db->where('libros.id', $id);
			$this->db->limit(1);
			$query = $this->db->get();
			return $query->row();

		}
	}
}