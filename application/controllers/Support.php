<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*

 * Aplicacion desarrollada por

 * Kevin TIpan

 * Todos los derechos reservados

 * Controlador para la pagina principal

 */

class Support extends CI_Controller {





    function __construct(){

        parent::__construct();

        if(!$this->session->userdata("login")){

        	redirect(base_url());

        }



    }



	public function index(){

		$this->load->view('plantilla/header');

    $this->load->view('plantilla/menu');

    $this->load->view('support/formulario');

		$this->load->view('plantilla/footer');

	}



  public function preguntas(){

    if(!$this->session->userdata("login")){

      redirect(base_url());

    }else{

      $this->load->view('plantilla/header');

      $this->load->view('plantilla/menu');

      $this->load->view('support/preguntas_frecuentes');

      $this->load->view('plantilla/footer');



    }

  }



  public function tutoriales(){

    if(!$this->session->userdata("login")){

      redirect(base_url());

    }else{

      $this->load->view('plantilla/header');

      $this->load->view('plantilla/menu');

      $this->load->view('support/tutoriales');

      $this->load->view('plantilla/footer');



    }

  }



  public function send_mail_support(){

      if ($this->input->is_ajax_request()) {

        $destinatario = "";

        $asunto = $this->input->post('txtAsunto');

        $mensaje = $this->input->post('txtMensaje');

        if (mail($destinatario,$asunto,$mensaje)) {

          echo "1";

        }

      }

  }





}

