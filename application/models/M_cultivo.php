<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**

* Hace conexion con la bdd  tanto para Admin/socio

*trae info de los usuarios del sistema

*/

class M_cultivo extends CI_Model

{

	public function listarCultivo($cliente){

		$sql='select * from tb_cultivo cu,tb_cliente cl where id_usuario='.$cliente.' AND cu.id_cliente=cl.id_cliente';

		//$this->db->where('id_cliente', $cliente);

		//$result = $this->db->get('tb_cultivo');
		$result = $this->db->query($sql);



		//$sql='select * from tb_cultivo cu,tb_cliente cl where id_usuario='.$cliente.' AND cu.id_cliente=cl.id_cliente GROUP by id_usuario';

		if ($result->num_rows() >= 1) {

			return $result->result();

		}else {

			return false;

		}

	}



	public function traerCultivo($cliente, $cultivo){



		$this->db->where('id_cliente', $cliente);

		$this->db->where('id_cultivo', $cultivo);

		$result = $this->db->get('tb_cultivo');

		if ($result->num_rows() == 1) {

			return $result->row();

		}else {

			return false;

		}

	}



	public function listarVuelos($cultivo){

		$this->db->where('id_cultivo', $cultivo);

		$result = $this->db->get('tb_vuelo');

		if ($result->num_rows() >= 1) {

			return $result->result();

		}else {

			return false;

		}

	}



	public function traerVuelo($cultivo, $vuelo){



		$this->db->where('id_cultivo', $cultivo);

		$this->db->where('id_vuelo', $vuelo);

		$result = $this->db->get('tb_vuelo');

		if ($result->num_rows() == 1) {

			return $result->row();

		}else {

			return false;

		}

	}



	public function traerVueloReciente($cultivo){

		$result = $this->db->query('Select * from tb_vuelo WHERE id_cultivo = '."$cultivo".' order by fecha_vuelo DESC');

/* 		$this->db->where('id_cultivo', $cultivo);

		$result = $this->db->get('tb_vuelo'); */

		if ($result->num_rows() == 1) {

			return $result->row();

		}else {

			return false;

		}

	}

}

