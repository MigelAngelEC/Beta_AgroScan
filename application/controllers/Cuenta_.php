<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Visualización de la informacion del usuario en sesion.
 */

class Cuenta_ extends CI_Controller {

    function __construct(){
        parent::__construct();
        if( ! $this->session->userdata("login")){
        	redirect(base_url());
        }
    }



	public function cuenta(){   
    $this->load->view('plantilla_mapas/header');
    $this->load->view('plantilla_mapas/menu');
    $this->load->view('gestor-cuenta/gestorCuenta'); 
    $this->load->view('plantilla/footer');
    
}

}
