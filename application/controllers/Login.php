<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('login_model');
        $this->load->library('form_validation');
        $this->load->helper('security');
        
    }
    public function index()
    {
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
        $this->form_validation->set_rules('contraseña', 'Contraseña', 'trim|required');

        if($this->form_validation->run() == TRUE){

            /*echo '<pre>';
                print_r($this->input->post());*/
            //echo do_hash($this->input->post('contraseña'));
            
            $email      = $this->input->post('email');
            $contraseña = do_hash($this->input->post('contraseña'));

            $login = $this->login_model->login($email , $contraseña);
            
            /*echo '<pre>';
                print_r($login);
            exit;*/

            if($login){

                if($login->activo == 0){
                    $this->session->set_flashdata('error_login','<div class="alert alert-danger" role="alert">Error al intentar iniciar sesión, póngase en contacto con el administrador del sistema.</div>');
                    redirect('login');
                }

                $datosAcceso = [
                    'logeado'   =>   TRUE,
                    'nombre'    =>   $login->nombre,
                    'email'     =>   $login->email
                ];
                
                $this->session->set_userdata($datosAcceso);

                if($this->session->userdata('logeado') == TRUE){
                    $this->session->set_flashdata('msg_login','<div class="alert alert-success" role="alert">Bienvenido, ' . '<strong> '. $this->session->userdata('nombre'). '</strong></div>');
                    redirect('/');
                }else{
                    $this->session->set_flashdata('error_login','<div class="alert alert-danger" role="alert">Error al intentar logear en el sistema.</div>');
                    redirect('login');
                }
            }

            redirect('login');

        } else{

            $data['titulo'] = 'Login';
            $this->load->view('login/view_login', $data);
        }
        
    }

    public function salir(){
        $this->session->sess_destroy();
        redirect('login');
    }
}