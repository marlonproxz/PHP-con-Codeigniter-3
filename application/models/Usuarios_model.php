<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
    }
    
    //funciones para registrar
    public function doInsert($datos=NULL){
        if(is_array($datos)){
            $this->db->insert('usuarios', $datos);
        }
    }
    //para conseguir a un usuario por su id
    public function getUsuarioId($id=NULL){
        if($id){
            $this->db->where('id', $id);
            $this->db->limit(1);
            $query = $this->db->get('usuarios');
            return $query->row();
        }
    }
    //para actualizar
    public function doUpdate($datos=NULL, $condicion=NULL){
        if(is_array($datos) && $condicion){
            $this->db->update('usuarios', $datos, $condicion);
        }
    }
    //listar todos usuarios
    public function getUsuarios(){
        return $this->db->get('usuarios')->result();
    }
    //para eliminar usuario
    public function doDelete($condicion=NULL){
        if($condicion){
            $this->db->delete('usuarios', $condicion);
            return true;
        }else{
            return false;
        }
    }

}