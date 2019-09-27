<?php
defined('BASEPATH') or exit('No direct script access allowed');
/*
Obtencion de Datos para manejar AppID de cada usuario
*/
class M_monitorEmpresa extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    // public function client(){
    //     $query=$this->db->query("SELECT CLI.id_cliente, CLI.nombre_cliente,CLI.apellido_cliente ,CUL.nombre_cult, CUL.pais_cult,CUL.ciudad_cult ,CLI.AppID 
    //     FROM tb_cliente as CLI , tb_cultivo as CUL WHERE CLI.id_cliente=CUL.id_cliente ORDER BY CLI.id_cliente");
    //     return $query;
    // }
    public function company()
    {
        $query = $this->db->query("SELECT emp.id_empresa,emp.nombre_empresa, cli.id_usuario,cli.nombre_cliente,cli.apellido_cliente,cul.id_cultivo,cul.nombre_cult,cul.pais_cult,cul.ciudad_cult FROM tb_empresa AS emp,tb_usuarios AS usu ,tb_cliente AS cli ,tb_cultivo AS cul WHERE emp.id_empresa=usu.id_empresa
        AND usu.id_usuario=cli.id_cliente AND cli.id_cliente=cul.id_cliente ORDER BY usu.id_usuario");
        return $query;
    }
    public function crearEmpresa(
        $nombre_empresa,
        $correo_empresa,
        $clave_empresa,
        $descripcion_empresa,
        $razon_social_empresa,
        $ruc_empresa,
        $tipoplan

    ) { 
        $id_empresa=+1;
        $agregado_por='admi';
        $permiso_acceso=1;
        $estado_reciclaje=0;
        $estado_eliminado=0;
        $consulta="INSERT INTO `tb_empresa`(`id_empresa`, `nombre_empresa`, `correo_empresa`, `clave_empresa`, `descripcion_empresa`, `razon_social_empresa`, `ruc_empresa`, `agregado_por`, `agregado_fecha`, `permiso_acceso`, `estado_reciclaje`, `estado_eliminado`, `id_tipoplan`) 
        VALUES ('".$id_empresa."','".$nombre_empresa."','".$correo_empresa."','".$clave_empresa."','".$descripcion_empresa."','".$razon_social_empresa."','".$ruc_empresa."','".$agregado_por."',CURRENT_DATE(),'".$permiso_acceso."','".$estado_reciclaje."','".$estado_eliminado."','".$tipoplan."')";
        $createCompany=$this->db->query($consulta);
        if ($consulta->num_rows() == 1) {
			return $consulta->row();
		}else{
			return false;
		}

    // INSERT INTO `tb_empresa` (`id_empresa`, `nombre_empresa`, `correo_empresa`, `clave_empresa`, `descripcion_empresa`, `razon_social_empresa`, `ruc_empresa`, `agregado_por`, `agregado_fecha`, `permiso_acceso`, `estado_reciclaje`, `estado_eliminado`, `id_tipoplan`) VALUES ('2', 'asdasd', 'asdasd@asdasd.asd', 'asdasd', 'asdasd', 'asdasd', '54a6sd7as6', 'asdasdf', CURRENT_DATE(), '1', '0', '0', '3');
}



    public function ingresar($usuario, $clave)
    {
        $consulta = " SELECT clie.nombre_cliente,
		usu.correo_usuario, usu.id_empresa, usu.id_perfil, usu.id_usuario
		FROM tb_cliente clie
		INNER JOIN tb_usuarios usu ON clie.id_usuario = usu.id_usuario
		WHERE usu.correo_usuario = '" . $usuario . "' AND usu.clave_usuario = '" . $clave . "'
		AND usu.id_perfil = '5' AND usu.permiso_acceso = '1' ";
        $result = $this->db->query($consulta);
        if ($result->num_rows() == 1) {
            return $result->row();
        } else {
            return false;
        }
    }
    public function listarClientes($empresa)
    {
        $consulta = "SELECT cli.nombre_cliente,cli.apellido_cliente,usu.correo_usuario,cli.cedula_cliente,cli.celular_cliente,cli.direccion_cliente 
        FROM tb_empresa AS emp,tb_usuarios AS usu,tb_cliente AS cli 
        WHERE emp.id_empresa=usu.id_empresa AND usu.id_usuario=cli.id_usuario AND emp.id_empresa='".$empresa."'";
        $result = $this->db->query($consulta);

        if ($result->num_rows() == 1) {

            return $result->row();
        } else {

            return false;
        }
    }
}
// SELECT cli.id_cliente,cli.nombre_cliente,cli.apellido_cliente,emp.nombre_empresa,cul.nombre_cult,cul.pais_cult
// ,cul.ciudad_cult FROM tb_empresa as emp,tb_usuarios as usu,tb_cliente as cli, tb_cultivo as cul
