<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitio extends CI_Controller {

	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('site/content');
		$this->load->view('layout/footer');
	}
}
