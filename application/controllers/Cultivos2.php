<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*

 * Aplicacion desarrollada por

 * Kevin TIpan

 * Todos los derechos reservados

 * Controlador para la pagina principal

 */

class Cultivos2 extends CI_Controller {





    function __construct(){

        parent::__construct();

        if( ! $this->session->userdata("login")){

        	redirect(base_url());

        }



    }



	public function index(){

        $this->load->view('plantilla/header');

        $this->load->view('plantilla/menu');

        $this->load->view('cultivos2');

        $this->load->view('plantilla/footer');

	}



}

