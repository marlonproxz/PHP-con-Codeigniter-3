<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aula18 extends CI_Controller {

	public function index()
	{
        //$this->load->helper('string');
        /* 
        alpha: A string with lower and uppercase letters only.
        alnum: Alpha-numeric string with lower and uppercase characters.
        basic: A random number based on mt_rand().
        numeric: Numeric string.
        nozero: Numeric string with no zeros.
        md5: An encrypted random number based on md5() (fixed length of 32).
        sha1: An encrypted random number based on sha1() (fixed length of 40).
        */
        //echo random_string('alnum', 16);

        $this->load->helper('security');
        $contraseña = 'admin';

        echo do_hash($contraseña); // SHA1
        echo '<br />';
        echo do_hash($contraseña, 'md5'); //MD5


	}
}
