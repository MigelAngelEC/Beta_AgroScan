<?php



/**

* Hace conexion con la bdd  tanto para Admin/socio

*trae info de los usuarios del sistema

*/

class M_login extends CI_Model

{

	public function ingresar($usuario,$clave){
		$consulta = 	" SELECT clie.nombre_cliente,
		usu.correo_usuario, usu.id_empresa, usu.id_perfil, usu.id_usuario
		FROM tb_cliente clie
		INNER JOIN tb_usuarios usu ON clie.id_usuario = usu.id_usuario
		WHERE usu.correo_usuario = '".$usuario."' AND usu.clave_usuario = '".$clxave."'
		AND usu.id_perfil = '5' AND usu.permiso_acceso = '1' ";
		$result = $this->db->query($consulta);
		if ($result->num_rows() == 1) {
					return $result->row();
		}else{
			return false;
		}
	}
	public function ingresarAdmin($uAdmin,$uAclave){
		$queryAdmin="SELECT socio.id_admin, socio.email_admin,socio.password_admin 
		FROM tb_socio as socio 
		WHERE socio.email_admin='".$uAdmin."' 
		AND socio.password_admin='".$uAclave."'";
		$eject=$this->db->query($queryAdmin);

		if ($eject->num_rows() == 1) {
			return $eject->row();
		}else{
			return false;
		}

	}
	public function ingresarEmpresa($uEmpresa,$uEclave){
		$queryEmpresa="SELECT empresa.id_empresa,empresa.correo_empresa,empresa.clave_empresa
		FROM tb_empresa as empresa 
		WHERE empresa.corre_empresa='".$uEmpresa."' 
		AND empresa.clave_empresa='".$uEclave."'";
		$empress=$this->db->query($queryEmpresa);

		if ($empress->num_rows() == 1) {
			return $empress->row();
		}else{
			return false;
		}
		
	}




	/*public function ingresar($usuario,$clave){

		$this->db->select('ID_USUARIO, CORREO_USUARIO, ID_EMPRESA, ID_PERFIL');

		$this->db->from('tb_usuarios');

		$this->db->where('CORREO_USUARIO', $usuario);

		$this->db->where('CLAVE_USUARIO', $clave);

		$this->db->where('ID_PERFIL', 5);

		$this->db->where('PERMISO_ACCESO', 1);

		$result = $this->db->get();

		if ($result->num_rows() == 1) {



			return $result->row();

		}else{

			return false;

		}

	}*/





}