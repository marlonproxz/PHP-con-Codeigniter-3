<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mensaje extends CI_Controller {

    function __construct()
	{
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->helper('form');
        
    }

	public function index()
	{
        if($this->input->post('valor')){

            $valor = $this->input->post('valor');

            if($valor > 10){

                $this->session->set_flashdata('msg', '<h1>Valor es mayor que 10</h1>');

            }else{

                $this->session->set_flashdata('msg', '<h4>Valor es menor que 10</h4>');
            }

            redirect('mensaje');
        }else{

            //Titulo
            $data['titulo'] = 'Ejemplo de como utilizar flashdata';

            $this->load->view('layout/header', $data);
            $this->load->view('flashdata/form');
            $this->load->view('layout/footer');
        }
    }
}