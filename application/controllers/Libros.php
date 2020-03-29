<?php

class Libros extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('logeado')) {
            $this->session->set_flashdata('error_login', '<div class="alert alert-danger" role="alert">Necesita iniciar sesión!</div>');
            redirect('login');
        }

        //agregar el modelo Libros_model.php
        $this->load->model('libros_model', 'libros');

        //agregar un helper funciones_helper
        //$this->load->helper('funciones_helper', 'funciones');
    
        //agregar form validation
        $this->load->library('form_validation');
    }

    public function index() {
        $this->listar();
    }

    public function listar() {
        //Titulo
        $data['titulo_sitio'] = 'Crud libros v. 1.0.0';
        $data['titulo_pagina'] = 'Lista de libros';
        $data['libros'] = $this->libros->listarLibros();

        $this->load->view('layout/header', $data);
        $this->load->view('libros/view_listar');
        $this->load->view('layout/footer');
    }
    
    public function adicionar(){
        
        $this->form_validation->set_rules('titulo', 'Titulo', 'trim|required|min_length[3]');
        
        if($this->form_validation->run() == TRUE){
            
            echo '<pre>';
            print_r($this->input->post());
            
        }else{
         
            $data['titulo_sitio'] = 'Crud libros v. 1.0.0';
            $data['titulo_pagina'] = 'Nuevo libro';

            $this->load->view('layout/header', $data);
            $this->load->view('libros/view_adicionar');
            $this->load->view('layout/footer');
            
        }
        
    }
    
    public function editar($id=NULL){
        
        if(!$id){
            $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">Error, necesitas seleccionar un libro.</div>');
            redirect('libros', 'refresh');
        }
        
        $query = $this->libros->capturaLibroID($id);
        
        if(!$query){
            $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">Error, libro no encontrado.</div>');
            redirect('libros', 'refresh');
        }
        
        $this->form_validation->set_rules('titulo', 'Titulo', 'trim|required|min_length[3]');
        
        if($this->form_validation->run() == TRUE){
            
            echo '<pre>';
            print_r($this->input->post());
            
        }else{
         
            $data['titulo_sitio'] = 'Crud libros v. 1.0.0';
            $data['titulo_pagina'] = 'Actualizar libro';
            $data['query'] = $query;

            $this->load->view('layout/header', $data);
            $this->load->view('libros/view_editar');
            $this->load->view('layout/footer');
            
        }
        
    }
    
    public function apagar($id=NULL){
        
    }

}
