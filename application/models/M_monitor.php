<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
Obtencion de Datos para manejar AppID de cada usuario
*/
class M_monitor extends CI_Model
{

    function __construct(){
        parent::__construct();
		$this->load->database();
    }
    public function client(){
        $query=$this->db->query("SELECT CLI.id_cliente, CLI.nombre_cliente,CLI.apellido_cliente ,CUL.nombre_cult, CUL.pais_cult,CUL.ciudad_cult ,CLI.AppID FROM tb_cliente as CLI , tb_cultivo as CUL WHERE CLI.id_cliente=CUL.id_cliente ORDER BY CLI.id_cliente");
        return $query;
    }
}

?>
