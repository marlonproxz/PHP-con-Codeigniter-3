<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function login($email=NULL, $contraseña=NULL)
	{
        if($email && $contraseña){

            $this->db->where(['email' => $email, 'contrasena' => $contraseña]);
            $this->db->limit(1);
            $query = $this->db->get('usuarios');
            /*return $query->row();
            exit;*/

            if($query->num_rows() == 1) {
                return $query->row();
            } else{
                $this->session->set_flashdata('error_login','<div class="alert alert-danger" role="alert">Error al intentar logear en el sistema.</div>');
                return FALSE;
                
            }

        }else{
            $this->session->set_flashdata('error_login','<div class="alert alert-danger" role="alert">Error al intentar logear en el sistema.</div>');
            return FALSE;
            
        }
    }
}