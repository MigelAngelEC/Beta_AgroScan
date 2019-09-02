<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**

* Hace conexion con la bdd  tanto para Admin/socio
*trae info de los usuarios del sistema
*/

class M_cultivo extends CI_Model{
	/* Extrae los datos de la tabla cliente 
	 * de acuerdo al id de sesion
	 */
	public function getCliente($cliente){
		$this->db->where('id_cliente', $cliente);
		$result = $this->db->get('tb_cliente');
		if ($result->num_rows() >= 1) {
			return $result->result();
		}else {
			return false;
		}
	}
}

