<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**

* Hace conexion con la bdd  para el registro/ creacion de nuevos usuarios
* 
*/

class M_registro extends CI_Model{

	public function registrar($cliente,$usuario){

		/* tb_cliente
		* id_cliente, id_usuario,AppID,nombre_cliente,apellido_cliente,cedula_cliente,celular_cliente,direccion_cliente
		*/

		/* tb_usuarios
		* id_usuario, id_empresa, id_perfil, correo_usuario, clave_usuario, agregado_fecha, permiso_acceso, estado_reciclaje, estado_eliminado 

		*/
		$r1 = $this->db->insert('tb_usuarios', $usuario);
		$r2 = $this->db->insert('tb_cliente', $cliente);

		if ($r1==$r2) {
			return true;
		}else{
			return false;
		}
	}

}

