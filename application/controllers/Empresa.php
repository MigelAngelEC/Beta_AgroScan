<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*

 * Aplicacion desarrollada por

 * Kevin TIpan

 * Todos los derechos reservados

 * Controlador para la pagina principal

 */

class Empresa extends CI_Controller {


    function __construct(){

        parent::__construct();

        if( ! $this->session->userdata("login")){

        	redirect(base_url());

        }

        $this->load->model('M_monitorEmpresa');

    }
    public function verClientes() {

        $result = $this->M_monitorEmpresa->listarClientes($this->session->userdata('id'));

        $data = array(

            'Clientes' => $result

        );

        $this->load->view('plantilla_empresa/header');
        $this->load->view('plantilla_empresa/barra');
        $this->load->view('plantilla_empresa/menu');
        $this->load->view('gestor-empresa/gestorCliente',$data);
        $this->load->view('plantilla_empresa/footer');

    }
    public function CrearEmpresa(){
        $this->load->view('plantilla_empresa/header');
        $this->load->view('plantilla_empresa/barra');
        $this->load->view('plantilla_empresa/menu');
        $this->load->view('gestor-empresa/gestorEmpresa');
        $this->load->view('plantilla_empresa/footer');
    }

    public function createAcountEmpresa(){

        if ($this->input->is_ajax_request()) {
           $nombre=$this->input->post('txtNombre');
           $correo=$this->input->post('txtCorreo');
           $clave=md5($this->input->post('password'));
           $descripcion=$this->input->post('txtDescripcion');
           $social=$this->input->post('txtSocial');
           $ruc=$this->input->post('txtRucEmpresa');
        //    $tipo=$this->input->post('txttipo');
           $res = $this->M_monitorEmpresa->crearEmpresa($nombre,$correo,$clave,$descripcion);
           if($res){
               $data = [
               "id" => $res->id_usuario,
               "nombre" => $res->nombre_cliente,
               "empresa" => $res->id_empresa,
               "perfil" => $res->id_perfil,
               "login" => TRUE
               ];
               $this->session->set_userdata($data);
                   echo('1');
           }else{
            echo('0');
        }

        }else{

             redirect(base_url());

        }

   }





    

}