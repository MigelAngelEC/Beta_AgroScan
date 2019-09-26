<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*

 * Aplicacion desarrollada por

 * Kevin TIpan

 * Todos los derechos reservados

 * Controlador para la pagina principal

 */

class Dashboard extends CI_Controller {





    function __construct(){

        parent::__construct();

        if( ! $this->session->userdata("login")){

        	redirect(base_url());

        }

        $this->load->model('M_cultivo');

    }



	public function index(){

    $result = $this -> M_cultivo -> listarCultivo($this->session->userdata('id'));

        $data = array(

            'cultivos' => $result

        );

    $this->load->view('plantilla/header');

    $this->load->view('plantilla/menu');

    $this->load->view('dashboard', $data);

    $this->load->view('plantilla/footer');

    }
    public function insert(){
		$this->load->view('mapa/insert');
	}

    public function cuenta(){
        $this->load->view('gestor-cuenta/gestorCuenta');

    }
   


}

