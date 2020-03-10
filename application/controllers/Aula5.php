<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aula5 extends CI_Controller {

	public function index()
	{
		//Parametros
		$data['title'] = 'Titulo Aula 5';
		$data['content'] = 'Hola estamos aprendiendo como trabajar con las vistar.';
		$data['title_pagina'] = 'Aula #5';

		//Agregar un view
		$this->load->view('aula5_view', $data);
	}

	public function pagina($pagina=NULL){

		//Titulo
		$data['titulo'] = 'Aula con varias view';

		//Contenido
		$data['contenido'] = 'Hola estamos aprendiendo como trabajar con las vistar.';

		//Rodaje
		$data['rodaje'] = 'Todos los derechos reservados';

		$this->load->view('layout/tipo', $data);

		if($pagina == 'contacto'){
			$this->load->view('sitio/contacto');
		}

		if($pagina == NULL){
			$this->load->view('sitio/contenido');
		}
		
		$this->load->view('sitio/rodaje');
	}
}
