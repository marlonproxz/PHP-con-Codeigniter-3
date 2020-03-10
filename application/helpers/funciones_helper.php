<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	function formatoFecha($data = NULL){
		/* FORMATO DE BANCO  => 2019-10-29 
		   FORMATO PERU      => 29/10/2019
		*/

		if($data){

			//SEPARA LA FECHA EN 3 PARTES
			$data_funcion = explode("-", $data);
			/*	$data_funcion[0] = 2019
				$data_funcion[1] = 10
				$data_funcion[2] = 29
			*/

			//retornar la fecha en otro formato
			return $data_funcion[2] .'/'. $data_funcion[1] .'/'. $data_funcion[0];

		}

	}

	function formatoMoneda($valor = NULL){

		/*
			$valor = 10.00
		*/
		if($valor){

			//retorno con valor S/.10,00
			return 'S/.'. number_format($valor, 2, ',', '.');

		}

	}