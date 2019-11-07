<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Visualiza de la informacion del usuario en sesion.
 */

class Cuenta_ extends CI_Controller {

    function __construct(){

        parent::__construct();
        $this->load->model('M_cuenta');
        if( ! $this->session->userdata("login")){
        	redirect(base_url());
        }
    }



	public function index(){

        $data['usuario'] = $this->M_cuenta->obtenerMarcas($this->session->userdata('id_cl'));

        $cliente = $this->M_cuenta->getCliente($this->session->userdata('id'));
        $row = $cliente->row_array();
        $data['cliente'] = array(
                'nombre'    => $row['nombre_cliente'],
                'apellido'  => $row['apellido_cliente'],
                'cedula'    => $row['cedula_cliente'],
                'celular'   => $row['celular_cliente'],
                'direccion' => $row['direccion_cliente'],
                'dir'       => $this->leerimagen()
        );

        $this->load->view('plantilla_mapas/header');   
        $this->load->view('plantilla_mapas/menu');  
        $this->load->view('gestor-cuenta/gestorCuenta',$data);
        $this->load->view('plantilla/footer');
        
    }

    public function actualizar(){

        $query= $this->M_cuenta->getCliente($this->session->userdata('id'));
        $row = $query->row_array();


        $array['prueba'] = array(
                'nombre'    => $row['nombre_cliente'],
                'apellido'  => $row['apellido_cliente'],
                'cedula'    => $row['cedula_cliente'],
                'celular'   => $row['celular_cliente'],
                'direccion' => $row['direccion_cliente'],
                'dir'       => $this->leerimagen()
        );
        $this->load->view('plantilla_mapas/header');
        $this->load->view('plantilla/menu');     
        $this->load->view('gestor-cuenta/actualizar',$array);        
        $this->load->view('plantilla/footer');
    }

    public function leerimagen(){
        $ruta = "upload/".$this->session->userdata('id')."/";
        
        if (!is_dir($ruta)) {
            mkdir("upload/".$this->session->userdata('id')."/",777);            
        }else{
            $filehandle = opendir($ruta);
            while ($file = readdir($filehandle)) {
                if ($file != "." && $file != "..") {
                    $tamanyo = GetImageSize($ruta . $file);
                    return $ruta.$file;
                } 
            } 
            closedir($filehandle);
        }
    }




    public function subir(){

        $data = array('nombre_cliente'      => $this->input->post('nombre'),
                      'apellido_cliente'    => $this->input->post('apellido'),
                      'cedula_cliente'      => $this->input->post('cedula'),
                      'celular_cliente'     => $this->input->post('celular'),
                      'direccion_cliente'   => $this->input->post('direccion')
         );
        

        $flag = $this->M_cuenta->actualizarUsuario($this->session->userdata('id'),$data);

        if ($flag) {
            //Actualiza el nombre del usuario visualizado en el menú
            $data=["nombre"=>$this->input->post('nombre')];
            $this->session->set_userdata($data);
        }

        $mi_archivo = 'upload';
        if (!is_dir("upload/".$this->session->userdata('id')."/")) {
            mkdir("upload/".$this->session->userdata('id')."/",777);
        }
         
        $config['upload_path'] = "upload/".$this->session->userdata('id')."/";
        $config['file_name'] = $this->session->userdata('id');
        $config['allowed_types'] = "jpg|png";
        $config['max_size'] = "5000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";
        $config['overwrite']=true;

        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload($mi_archivo)) {            
            $this->actualizar();
            return;
        }
        $this->actualizar();
    }
}
