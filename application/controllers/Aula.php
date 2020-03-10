<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aula extends CI_Controller {

	public function index($function=NULL)
	{
		if($function == 1){
			$this->listar();
		}
		if($function == 2){
			$this->adicionar();
		}
		if($function == 3){
			$this->alterar();
		}
		if($function == NULL){
			echo "usted debe pasar una funcción";
		}
	}

	private function listar()
	{
		echo 'listar';
	}

	public function adicionar()
	{
		echo 'adicionar';
	}

	public function alterar()
	{
		echo 'alterar';
	}
}
