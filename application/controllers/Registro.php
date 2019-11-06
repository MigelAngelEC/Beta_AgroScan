<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Visualización de la informacion del usuario en sesion.
 */

class Registro extends CI_Controller {

    function __construct(){

        parent::__construct();
        $this->load->model('M_registro');
    }
    

    public function index(){

        $this->load->view('plantilla/header');          
        $this->load->view('registro');        
        $this->load->view('plantilla/footer');

    }
    public function registrar(){
        // Captura de los datos del usuario
        /* tb_cliente
        * id_cliente, id_usuario,AppID,nombre_cliente,apellido_cliente,cedula_cliente,direccion_cliente
        */

        /* tb_usuarios
        * id_usuario, id_empresa, id_perfil, correo_usuario, clave_usuario, agregado_fecha, permiso_acceso, estado_reciclaje, estado_eliminado 
        */
        $code		= $this->generarCodigo(10);

        $cliente = array(
                'id_usuario'        =>$code,
                'nombre_cliente'    => $this->input->post('nombre'),
                'apellido_cliente'  => $this->input->post('apellido'),
                'cedula_cliente'    => $this->input->post('cedula'),
                'celular_cliente'   => $this->input->post('telefono'),
                'direccion_cliente' => $this->input->post('direccion')
        );

        $usuario = array(
            'id_usuario'        => $code,
            'id_empresa'        => '1',
            'id_perfil'         => '5',
            'permiso_acceso'    => '1',
            'estado_reciclaje'  => '0',
            'estado_eliminado'  => '0',
            'correo_usuario'    => $this->input->post('correo'),
            'clave_usuario'     => md5($this->input->post('clave1')),
            'agregado_fecha'    => 'NOW()'
        );

        
        $result = $this->M_registro->registrar($cliente,$usuario);

        if ($result) {
        	$data=[];
			$this->session->set_userdata($data);
            redirect('');
        }else{
        	echo "Error en registro(Registro)";
        	$data=[];
			$this->session->set_userdata($data);
        	redirect('Registro');
            
        }
        

    }
    public function vp(){
        $this->load->view('plantilla_mapas/header');          
        $this->load->view('validar-registro/validar');        
        $this->load->view('plantilla/footer');
    }
    
    public function send(){
    	/* Envia un correo con el código de 
    	 * verificación para activar la cuenta
    	 */

        $this->load->library('email');        
        $this->email->from('paulitlut@gmail.com', 'Prueba_paul');
        $this->email->to('softomic95@hotmail.com');
        
        $this->email->subject('prueba');
        
        $code=$this->generarCodigo(6);
        $this->email->message('message: '.$code);
        
        if($this->email->send()){
            echo $code;
        }else{
            echo "0";
            redirect(base_url());
        }
        
    }
    public function generarCodigo(int $length){
    	/*Genera y devuelve codigo de longitud $length*/
    	$code="";
        for ($i=0; $i <$length ; $i++) { 
            $code=$code.mt_rand(1,9);
        }
        return $code;
    }
    public function activarUsuario($id_usuario){
    	$result = $this->M_registro->obtenerCodigo($id_usuario)->result();
    	return $result->code;
    }


}