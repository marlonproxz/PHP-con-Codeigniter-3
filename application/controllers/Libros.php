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
        $this->load->helper('funciones_helper', 'funciones');
    }

    public function index() {
        $this->listar();
    }

    public function listar() {
        //Titulo
        $data['titulo_sitio'] = 'Crud libros v. 1.0.0';
        $data['titulo_pagina'] = 'Lista de libros';

        $this->load->view('layout/header', $data);
        $this->load->view('libros/view_listar');
        $this->load->view('layout/footer');
    }
    
    public function adicionar(){
        
        $this->load->view('layout/header', $data);
        $this->load->view('libros/view_adicionar');
        $this->load->view('layout/footer');
        
    }
    
    public function editar($id=NULL){
        
        $this->load->view('layout/header', $data);
        $this->load->view('libros/view_editar');
        $this->load->view('layout/footer');
        
    }
    
    public function apagar($id=NULL){
        
    }

}
