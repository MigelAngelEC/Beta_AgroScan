<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Aplicacion desarrollada por
 * Kevin TIpan
 * Miguel Esparza V2.0
 * Todos los derechos reservados
 */

class Login extends CI_Controller {





    function __construct(){

        parent::__construct();
		$this->load->model('M_monitor');
		$this->load->model('M_login');
		
    }



	public function index($page = 'login')

	{

	if ( ! file_exists(APPPATH.'views/'.$page.'.php')){

                show_404();

        }else{

			$this->load->view('plantilla/header');
			$this->load->view('login');
			$this->load->view('plantilla/footer');
        }

	}

	public function monitordash(){
		$id=$this->session->userdata('id');
		if(!$id){
			redirect(base_url());
		}else{
		$this->load->model('M_monitor');
		$data['client'] = $this->M_monitor->client();
		$this->load->view('plantilla/header');		
		$this->load->view('monitordash',$data);
		$this->load->view('plantilla/footer');
		}
	}
	public function monitorEmpresa(){
		$id=$this->session->userdata('id');
		if(!$id){
			redirect(base_url());
		}else{

			$this->load->model('M_monitorEmpresa');
			$data2['company']=$this->M_monitorEmpresa->company();
			// $this->load->view('plantilla/header');	
			// $this->load->view('monitorEmpresa',$data2);
			$this->load->view('plantilla_empresa/header');
			$this->load->view('plantilla_empresa/barra');
			$this->load->view('plantilla_empresa/menu');
			$this->load->view('monitorEmpresa',$data2);
			$this->load->view('plantilla_empresa/footer');

		}
	

	}

	public function gestormarcas(){
		$id=$this->session->userdata('id');
		if(!$id){
			redirect(base_url());
		}else{
			$this->load->view('plantilla/header');		
			$this->load->view('gestor-marcas/gestormarcas');
			$this->load->view('plantilla/footer');
		}

	}
	public function insert(){		
		$this->load->view('gestor-marcas/insert.php');
	}
	public function select(){		
		$this->load->view('gestor-marcas/select.php');
	}
	public function fetch(){		
		$this->load->view('gestor-marcas/fetch.php');
	}


	public function gestorcultivos(){
		$id=$this->session->userdata('id');
		if(!$id){
			redirect(base_url());
		}else{
		$this->load->view('plantilla/header');	
		$this->load->view('gestor-cultivos/gestorcultivos');
		$this->load->view('plantilla/footer');
		}
	}
	public function insert2(){
		$this->load->view('gestor-cultivos/insert2');
	}
	public function fetch2(){
		$this->load->view('gestor-cultivos/fetch2');
	}
	public function select2(){
		$this->load->view('gestor-cultivos/select22');
	}

	public function select3(){
		$this->load->view('gestor-cultivos/select21');
	}

	public function ingresar(){

		 if ($this->input->is_ajax_request()) {

			$usuario = $this->input->post('txtEmail');

			$clave = md5($this->input->post('txtclave'));

			$res = $this->M_login->ingresar($usuario,$clave);

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

				$res2=$this->M_login->ingresarAdmin($usuario,$clave);
				if ($res2){	
					$data=[
						"id"=>$res2->id_admin,
						"login"=> TRUE
					];
					$this->session->set_userdata($data);
					echo('2');
				}else{
					echo ('0');
				}
				

			}

		 }else{

		 	 redirect(base_url());

		 }

	}



		public function cerrar_sesion(){
			$this->session->unset_userdata('id'); 
			$this->session->sess_destroy();
			redirect(base_url());

		}

}

