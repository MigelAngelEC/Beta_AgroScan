<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*

 * Aplicacion desarrollada por

 * Kevin TIpan v1.0
 * Miguel Esparza V2.0
 
 * Todos los derechos reservados

 * Controlador para la pagina principal

 */

class Mapa extends CI_Controller {





    function __construct(){

        parent::__construct();

        if( ! $this->session->userdata("login")){

        	redirect(base_url());

        }

        $this->load->model('M_cultivo');

        $this->load->model('M_marcas');

    }



	public function index(){

/*     $infoCult = $this -> M_cultivo -> traerCultivo($this->session->userdata('id'), $_GET['ncltv']);

    $vuelo = $this -> M_cultivo -> traerVueloReciente($infoCult->id_cultivo);

    $listarVuelos = $this -> M_cultivo -> listarVuelos($infoCult->id_cultivo);

    $marcas = $this -> M_marcas -> getMarcas($_GET['ncltv']);

    $data = array(

            'cultivo' => $infoCult,

            'vuelo' => $vuelo,

            'listaVuelos' => $listarVuelos,

            'marcas' => $marcas

        );  */

    //var_dump ($data['vuelo']);

    $this->load->view('plantilla_mapas/header');
    $this->load->view('plantilla_mapas/menu');
    $this->load->view('plantilla_mapas/sidebar');
    $this->load->view('plantilla_mapas/downsidebar');
    $this->load->view('mapa/mapa');
    $this->load->view('plantilla_mapas/footer');

    }
    public function insert(){
        $this->load->view('mapa/insert');
    }
    public function insertado(){		
		$this->load->view('mapa/inserto');
	}

    public function inizializerMap(){

    $cultivo = $_POST['cultivo'];

    $infoCult = $this -> M_cultivo -> traerCultivo($this->session->userdata('id'), $cultivo);

    $vuelo = $this -> M_cultivo -> traerVueloReciente($infoCult->id_cultivo);

    $listarVuelos = $this -> M_cultivo -> listarVuelos($infoCult->id_cultivo);

    $marcas = $this -> M_marcas -> getMarcas($cultivo);

    $data = array(

            'status' => 'ok',

            'cultivo' => $infoCult,

            'vuelo' => $vuelo,

            'listaVuelos' => $listarVuelos,

            'marcas' => $marcas

        ); 

    echo json_encode($data);

    }



    public function savePolygon(){

        $coordenadas = $_POST['coordenadas'];

        $popup = $_POST['popup'];

        $tipo = $_POST['tipo'];

        $cultivo = $_POST['cultivo'];

        $data =  array(

            'coor_marcas' => $coordenadas,

            'popup_marcas' => $popup,

            'id_tipoMarcas' => $tipo,

            'id_cultivo' => $cultivo,

        );

        $save = $this->M_marcas->saveMarca($data);

        if($save){

            $resp = array(

                'status' => 'ok',

                'msg' => 'Se guardo exitosamente la marca.'

            );

            echo json_encode($resp);

        }else {

            $errors = array(

                'msg' => 'Error al guardar marca'

            );

            echo json_encode($errors);

            $this->output->set_status_header(400);

        }

    }



    public function deleteMarkers(){

        $coordenadas = $_POST['coordenadas'];

        $cultivo = $_POST['cultivo'];

        $delete = $this->M_marcas->deleteMarker($coordenadas, $cultivo);

        if($delete){

            $resp = array(

                'status' => 'ok',

                'msg' => 'Se emimino la marca.'

            );

            echo json_encode($resp);

        }else {

            $errors = array(

                'msg' => 'Error al eliminar marca'

            );

            echo json_encode($errors);

            $this->output->set_status_header(400);

        }

    }

    public function cuenta(){
    
        $this->load->view('gestor-cuenta/gestorCuenta');    
        //$this->load->view('plantilla_mapas/header');
        //$this->load->view('mapa/cultivo1');
        //$this->load->view('plantilla_mapas/footer');
        
    }




}

