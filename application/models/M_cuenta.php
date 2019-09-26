<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**

* Hace conexion con la bdd  tanto para Admin/socio
*trae info de los usuarios del sistema
*/

class M_cuenta extends CI_Model{
	/* Extrae los datos de la tabla cliente 
	 * de acuerdo al id de sesión
	 */
	public function getCliente($cliente){
		$this->db->where('id_cliente', $cliente);
		$result = $this->db->get('tb_cliente');
		if ($result->num_rows() >= 1) {
			return $result;
		}else {
			return false;
		}
	}

	function obtenerUsuarios(){
		$query=$this->db->get('tb_cliente');
		if($query->num_rows()>0){
			return $query;
		}else{	
			return false;
		}
	}

	public function obtenerMarcas($idUsuario){
		$in=9;
		
		$nombre_cliente		='';
		$apellido_cliente	='';
		$direccion_cliente	='';
		$nombre_cult[] 		= array();
		$descripcion_cult[] = array();
		$pais_cult[] 		= array();
		$ciudad_cult[] 		= array();
		$coordenada[] 		= array();
		$area 				=0;
		$coordenadas[]		=array();

		$data[] = array();

		$result = $this->db->query('select distinct * FROM tb_cliente u, tb_cultivo cu, tb_marcas m WHERE u.id_usuario=cu.id_cliente and cu.id_cliente=1 and m.id_cultivo=cu.id_cultivo and id_tipoMarcas=1');
		


		for ( $i = 0; $i < $result->num_rows(); $i++ ) {
			$nombre_cliente			= $result->Row(1)->nombre_cliente;
			$apellido_cliente		= $result->Row(1)->apellido_cliente;
			$direccion_cliente		= $result->Row(1)->direccion_cliente;
			$nombre_cult[$i]		= $result->Row($i)->nombre_cult;
			$descripcion_cult[$i]	= $result->Row($i)->descripcion_cult;
			$pais_cult[$i]			= $result->Row($i)->pais_cult;
			$ciudad_cult[$i]		= $result->Row($i)->ciudad_cult;
			$coordenada[$i]			= explode(',',$result->Row($i)->coor_marcas);
			$area 					= $area+$result->Row($i)->area;
			
		}

		for ($i=0; $i <count($coordenada) ; $i++) {

			$lat	= explode(":",$coordenada[$i][0]);
			$long	= explode(":",$coordenada[$i][1]);
			$coordenadas[$i][0] = substr($lat[1],0,-1);
			$coordenadas[$i][1] = substr($long[1],0,-1);
		}
		
		$data[0] = $nombre_cliente;
		$data[1] = $apellido_cliente;
		$data[2] = $direccion_cliente;
		$data[3] = $nombre_cult;
		$data[4] = $descripcion_cult;
		$data[5] = $ciudad_cult;
		$data[6] = $pais_cult;
		$data[7] = $area;
		$data[8] = $coordenadas;

		/*
		foreach ($coordenadas as $value) {
			echo "lat: ".$value[0].'<br>';
			echo "lon: ".$value[1].'<br>';
		}
		
		
		*/
		return $data;	
	}
}

