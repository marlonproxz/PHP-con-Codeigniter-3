<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('logeado')) {
            $this->session->set_flashdata('error_login', '<div class="alert alert-danger" role="alert">Necesita iniciar sesión!</div>');
            redirect('login');
        }

        $this->load->model('usuarios_model');
        $this->load->helper('security');
        //$this->load->helper('form');
        $this->load->library('form_validation');
    }
    
    public function index(){
        $this->listar();
    }

    //listar usuarios
    public function listar() {
        $data['titulo_sitio'] = 'Crud usuarios';
        $data['titulo_pagina'] = 'Listar usuarios';

        $data['usuarios'] = $this->usuarios_model->getUsuarios();

        $this->load->view('layout/header', $data);
        $this->load->view('usuarios/view_listar');
        $this->load->view('layout/footer');
    }

    //agregar usuarios
    public function adicionar() {

        //-> required
        //-> min_length[3]
        $this->form_validation->set_rules('nombre', 'NOMBRE', 'required|min_length[3]');

        //-> required
        //-> valid_email
        $this->form_validation->set_rules('email', 'E-MAIL', 'required|valid_email', array('valid_email' => 'Usted debe pasar un e-mail válido'));

        //-> trim
        //-> required	
        //-> min_length
        //-> max_length
        $this->form_validation->set_rules('contraseña', 'Contraseña', 'trim|required|min_length[3]|max_length[8]', array(
            'required' => 'Usted debe pasar una contraseña',
            'min_length' => 'La Contraseña debe tener mínimo 6 letras o numeros',
            'max_length' => 'La Contraseña debe tener máximo 8 letras o numeros'
        ));

        //-> required
        //-> matches
        $this->form_validation->set_rules('contraseña2', 'Repita Contraseña', 'required|matches[contraseña]', array(
            'required' => 'Usted debe llenar y repetir el campo contraseña',
            'matches' => 'Contraseña no coincide'
        ));

        if ($this->form_validation->run() == TRUE) {

            /* echo '<pre>';
              print_r($this->input->post()); */
            //Guardar en la bd
            $datos['nombre'] = $this->input->post('nombre');
            $datos['email'] = $this->input->post('email');
            $datos['contrasena'] = do_hash($this->input->post('contraseña'));
            $datos['activo'] = 1;

            $this->usuarios_model->doInsert($datos);

            redirect('usuarios', 'refresh');
        } else {

            $data['titulo_sitio'] = 'Crud usuarios';
            $data['titulo_pagina'] = 'Agregar usuarios';

            $this->load->view('layout/header', $data);
            $this->load->view('usuarios/view_adicionar');
            $this->load->view('layout/footer');
        }
    }

    //editar usuarios
    public function editar($id = NULL) {
        if (!$id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> Error, usted debe pasar un ID de usuário.</div>');
            redirect('usuarios');
        }

        $query = $this->usuarios_model->getUsuarioId($id);

        if (!$query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> Error, usuario no fue localizado, intente nuevamente.</div>');
            redirect('usuarios');
        }

        //-> required
        //-> min_length[3]
        $this->form_validation->set_rules('nombre', 'NOMBRE', 'required|min_length[3]');

        //-> required
        //-> valid_email
        $this->form_validation->set_rules('email', 'E-MAIL', 'required|valid_email', array('valid_email' => 'Usted debe pasar un e-mail válido'));

        if ($this->form_validation->run() == TRUE) {

            //Guardar en la bd
            $datos['nombre'] = $this->input->post('nombre');
            $datos['email'] = $this->input->post('email');

            $this->usuarios_model->doUpdate($datos, ['id' => $this->input->post('id')]);
            redirect('usuarios', 'refresh');

            /* echo '<pre>';
              print_r($this->input->post()); */
        } else {
            $data['titulo_sitio'] = 'Crud usuarios';
            $data['titulo_pagina'] = 'Editar usuarios';
            $data['query'] = $query;

            /* echo '<pre>';
              print_r($data['query']);
              exit; */

            $this->load->view('layout/header', $data);
            $this->load->view('usuarios/view_editar');
            $this->load->view('layout/footer');
        }
    }

    //eliminar usuarios
    public function apagar($id = NULL) {
        if (!$id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> Error, usted debe pasar un ID de usuário.</div>');
            redirect('usuarios');
        }

        // verifica se existe registro con id pasada
        $query = $this->usuarios_model->getUsuarioId($id);

        if (!$query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> Error, usuario no fue localizado, intente nuevamente.</div>');
            redirect('usuarios');
        }

        // Verifica si el usuario esta logeado
        if ($query->email == $this->session->userdata('email')) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> Error, No está permitido eliminar al usuario conectado en el sistema.</div>');
            redirect('usuarios');
        }

        // Apaga al usuario anterior.
        if ($this->usuarios_model->doDelete(['id' => $query->id])) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"> El usuario fue eliminado exitosamente!</div>');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> Error al eliminar usuario.</div>');
        }
        redirect('usuarios');
    }

    public function activo($id = NULL) {
        if (!$id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> Error, usted debe pasar un ID de usuário.</div>');
            redirect('usuarios');
        }

        // verifica se existe registro con id pasada
        $query = $this->usuarios_model->getUsuarioId($id);

        if (!$query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> Error, usuario no fue localizado, intente nuevamente.</div>');
            redirect('usuarios');
        }

        // Verifica si el usuario esta logeado
        if ($query->email == $this->session->userdata('email')) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> Error, No está permitido cambiar el estado del usuario conectado en el sistema.</div>');
            redirect('usuarios');
        }

        // cambiar el estado
        $datos['activo'] = 1;
        $this->usuarios_model->doUpdate($datos, ['id' => $query->id]);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"> Usuario activado correctamente</div>');
        redirect('usuarios');
    }

    public function inactivo($id = NULL) {
        if (!$id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> Error, usted debe pasar un ID de usuário.</div>');
            redirect('usuarios');
        }

        // verifica se existe registro con id pasada
        $query = $this->usuarios_model->getUsuarioId($id);

        if (!$query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> Error, usuario no fue localizado, intente nuevamente.</div>');
            redirect('usuarios');
        }

        // Verifica si el usuario esta logeado
        if ($query->email == $this->session->userdata('email')) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> Error, No está permitido cambiar el estado del usuario conectado en el sistema.</div>');
            redirect('usuarios');
        }

        // cambiar el estado
        $datos['activo'] = 0;
        $this->usuarios_model->doUpdate($datos, ['id' => $query->id]);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"> Usuario inactivado correctamente</div>');
        redirect('usuarios');
    }

}
