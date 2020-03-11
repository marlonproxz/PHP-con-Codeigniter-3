<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Libros_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

        // LISTA TODO LIBROS REGISTRADOS
	public function listarLibros()
	{
            return $this->db->get('libros')->result();
	}
        
        // REGISTRAR LIBROS
        public function registrarLibro($datos=NULL){
            if(is_array($datos)){
                $this->db->insert('libros', $datos);
            }
        }

        // CAPTURAR UN DETERMINADO LIBRO POR ID
	public function capturaLibroID($id = NULL){
            if($id){
                $this->db->where('id', $id);
                $this->db->limit(1);
                return $this->db->get('libros')->row();
            }
            
	}
        
        // ACTUALIZAR LIBRO
        public function actualizaLibro($datos=NULL, $condicion=NULL){
            if(is_array($datos) && is_array($condicion)){
                $this->db->update('libros', $datos, $condicion);
            }
        }

        // ELIMINAR UN LIBRO
        
        public function eliminarLibro($id=NULL){
            if($id){
                $this->db->delete('libros', ['id' => $id]);
            }
        }
}