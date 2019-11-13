<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
Obtencion de Datos para manejar AppID de cada usuario
*/
class M_monitorEmpresa extends CI_Model
{

    function __construct(){
        parent::__construct();
		$this->load->database();
    }
    // public function client(){
    //     $query=$this->db->query("SELECT CLI.id_cliente, CLI.nombre_cliente,CLI.apellido_cliente ,CUL.nombre_cult, CUL.pais_cult,CUL.ciudad_cult ,CLI.AppID 
    //     FROM tb_cliente as CLI , tb_cultivo as CUL WHERE CLI.id_cliente=CUL.id_cliente ORDER BY CLI.id_cliente");
    //     return $query;
    // }
    // public function company(){
    //     $query=$this->db->query("SELECT cli.id_cliente,cli.nombre_cliente,cli.apellido_cliente,emp.nombre_empresa,cul.nombre_cult,cul.pais_cult,cul.ciudad_cult
    //      FROM tb_empresa as emp,tb_usuarios as usu,tb_cliente as cli, tb_cultivo as cul WHERE
    //      cli.id_cliente=clu.id_cliente AND cli.id_usuario=usu.id_usuario ");
    //     return $query;

    // }
}

?>
