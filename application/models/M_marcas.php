<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Hace conexion con la bdd  tanto para Admin/socio
*trae info de los usuarios del sistema
*/
class M_marcas extends CI_Model
{
	public function saveMarca($data){
		$result = $this->db->insert('tb_marcas', $data);
		if ($result) {
			return true;
		}else {
			return false;
		}
	}

	public function getMarcas($cultivo){
		$this->db->where('id_cultivo', $cultivo);
		$result = $this->db->get('tb_marcas');
		if ($result->num_rows() >= 1) {
			return $result->result();
		}else {
			return false;
		}
	}

	public function deleteMarker($cor, $cltv){
		$this->db->where('id_cultivo', $cltv);
		$this->db->where('coor_marcas', $cor);
		$this->db->delete('tb_marcas');
		//var_dump ($result);
		if ($this->db->affected_rows() > 0){
			return true;
		}else {
			return false;
		}
	}

	
}
