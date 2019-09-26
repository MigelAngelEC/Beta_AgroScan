<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Visualización de la informacion del usuario en sesion.
 */

class Cuenta_ extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('M_cuenta');
        if( ! $this->session->userdata("login")){
        	redirect(base_url());
        }
    }



	public function cuenta(){

        $data['usuario'] = $this->M_cuenta->obtenerMarcas($this->session->userdata('id'));

        $this->load->view('plantilla_mapas/header');   
        $this->load->view('plantilla_mapas/menu');  
        $this->load->view('gestor-cuenta/gestorCuenta',$data);
        $this->load->view('plantilla/footer');
        
    }

    public function prueba(){

        $data['usuario'] = $this->M_cuenta->obtenerMarcas($this->session->userdata('id'));
        $this->load->view('plantilla_mapas/header');
        $this->load->view('plantilla_mapas/menu');            
        $this->load->view('gestor-cuenta/edicionPerfil',$data);        
        $this->load->view('plantilla/footer');
        
    }

    function index(){
        
        $this->load->view('codigofacilito/headers');        
        $data['usuarios']=$this->usuarios_model->obtenerUsuarios();     
        $this->load->view('usuarios/blank',$data);
    }


}
