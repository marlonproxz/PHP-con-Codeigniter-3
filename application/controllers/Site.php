<?php


class Site extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		if(!$this->session->userdata('logeado')){
			$this->session->set_flashdata('error_login','<div class="alert alert-danger" role="alert">Necesita iniciar sesión!</div>');
			redirect('login');
		}

		//agregar el modelo Libros_model.php
		$this->load->model('libros_model', 'libros');

		//agregar un helper funciones_helper
		$this->load->helper('funciones_helper', 'libros');
	}

	public function index(){
		//Titulo
		$data['titulo'] = 'Aula usando boostrap 4';

		$this->load->view('layout/header', $data);
		$this->load->view('sitio/contenido');
		$this->load->view('layout/footer');
	}

	public function libros(){
		//Titulo
		$data['titulo'] = 'Lista de Libros';

		//agregar datos de una base de datos
		$data['libros'] = $this->libros->listarLibros();

		/*echo '<pre>';
			print_r($libros);
		echo '</pre>';*/

		$this->load->view('layout/header', $data);
		$this->load->view('libros/index');
		$this->load->view('layout/footer');
	}

	public function info($id = NULL){

		if($id == NULL){
			echo 'Usted necesita pasar un id válido';
		}else{

			$query = $this->libros->getById($id);

			/*echo '<pre>';
				print_r($query);*/

			if($query){
				$data['titulo'] = $query->nombre_libro;
				$data['info'] = $query;

				$this->load->view('layout/header',$data);
				$this->load->view('libros/info');
				$this->load->view('layout/footer');
			}else{
				echo 'Usted necesita pasar un id válido';
			}
			
		}
	}

	public function formulario(){

		$data['titulo'] = 'Aula Helper Form';

		//cargar un helper form
		$this->load->helper('form');

		$this->load->view('layout/header',$data);
		$this->load->view('formulario/index');
		$this->load->view('layout/footer');

	}

	public function enviar(){

		if($this->input->post()){

			echo '<pre>';
				print_r($this->input->post());
		}

	}

	public function validar(){

		$data['titulo'] = 'Biblioteca Form_validation';

		//cargar un helper form
		$this->load->helper('form');

		//Cargando libreria form_validation
		$this->load->library('form_validation');

		//-> required
		//-> min_length[3]
		$this->form_validation->set_rules('nombre', 'NOMBRE', 'required|min_length[3]');

		//-> required
		//-> valid_email
		$this->form_validation->set_rules('email', 'E-MAIL', 'required|valid_email', 
			array('valid_email' => 'Usted debe pasar un e-mail válido'));

		//-> numeric
		$this->form_validation->set_rules('codigo', 'CÓDIGO', 'numeric', 
			array('numeric' => 'Usted debe pasar solamente números'));

		//-> trim
		//-> required	
		//-> min_length
		//-> max_length
		$this->form_validation->set_rules('contraseña', 'Contraseña', 'trim|required|min_length[3]|max_length[8]', 
			array(
					'required' 		=> 'Usted debe pasar una contraseña',
					'min_length'	=> 'La Contraseña debe tener mínimo 6 letras o numeros',
					'max_length'	=> 'La Contraseña debe tener máximo 8 letras o numeros'
				));
		
		//-> required
		//-> matches
		$this->form_validation->set_rules('contraseña2', 'Repita Contraseña', 'required|matches[contraseña]',
				array(
					'required' 		=> 'Usted debe llenar y repetir el campo contraseña',
					'matches'		=> 'Contraseña no coincide'
				));

		if($this->form_validation->run() == TRUE){
			echo 'Formulario validado con exito';
		}else{

			$this->load->view('layout/header',$data);
			$this->load->view('formulario/validar');
			$this->load->view('layout/footer');

		}

	}

	public function sesion(){

		echo '<h1>Trabajando con sesiones</h1>';
		//$_SESSION['clave'] = 'Curso de Codeigniter';
		//unset($_SESSION['clave']);
		//session_destroy();

		//usando CI
		//$this->session->set_userdata('aula21', 'La aula 21 estamos trabajando con sesiones con CI');
		//$this->session->unset_userdata('aula21');
		
		/*$datosSession = [
			'nombre'	=>	'Marlon',
			'email'		=>	'marlon.10993x@gmail.com',
			'logeo'		=>	TRUE
		];

		$this->session->set_userdata($datosSession);*/

		//$this->session->sess_destroy();

		//flash data
		$this->session->set_flashdata('msg', 'Registro realizado con exito!');
	}

	public function mostrar(){
		//echo $_SESSION['clave'];
		echo '<pre>';
		//echo $this->session->aula21;
			print_r($this->session);
		
		/*$nombre = $this->session->userdata('nombre');

		echo $nombre;*/

	}

	public function flash(){

		echo $this->session->flashdata('msg');
	}
}