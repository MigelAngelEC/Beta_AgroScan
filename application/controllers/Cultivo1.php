<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*

 * Aplicacion desarrollada por

 * Kevin TIpan

 * Todos los derechos reservados

 * Controlador para la pagina principal

 */

class Cultivo1 extends CI_Controller {

    function __construct(){

        parent::__construct();

        if( ! $this->session->userdata("login")){

        	redirect(base_url());

        }



    }



	public function index(){

    $this->load->view('plantilla_mapas/header');

    $this->load->view('mapa/cultivo1');

    $this->load->view('plantilla_mapas/footer');


	}



}

