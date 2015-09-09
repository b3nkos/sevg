<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	public function login($email, $password) {

		$this->db->select('usuario.Id_Usuario,usuario.Id_Cuenta_Usuario,cuenta_usuario.Email,
			cuenta_usuario.Tipo, cuenta_usuario.Password,usuario.Identificacion,
			usuario.Nombres,usuario.Apellidos');
		$this->db->from('usuario');
		$this->db->join('cuenta_usuario', 'cuenta_usuario.Id_Cuenta_Usuario = usuario.Id_Cuenta_Usuario');
		$this->db->where('cuenta_usuario.Email', $email);
		$this->db->where('cuenta_usuario.Password', $password);
		return $this->db->get()->row_array();
	}

	public function get_profiles($userId) {
		$this->db->select('perfil.Id, perfil.Nombre');
		$this->db->from('perfil');
		$this->db->join('detalle_usuario_perfil', 'perfil.Id = detalle_usuario_perfil.Id_Perfil');
		$this->db->join('usuario', 'usuario.Id_Usuario = detalle_usuario_perfil.Id_Usuario');
		$this->db->where('usuario.Id_Usuario', $userId);
		return $this->db->get()->result_array();
	}

	public function participar($eventId, $userId, $profileId) {
		$this->db->set('Id_Usuario', $userId);
		$this->db->set('Id_Evento', $eventId);
		$this->db->set('Id_Perfil', $profileId);
		$this->db->insert('detalle_usuario_evento'); 
		return true;
	}

	public function get_data($userId) {
		$this->db->select('usuario.Id_Usuario,cuenta_usuario.Id_Cuenta_Usuario,
		usuario.Identificacion,usuario.Nombres,usuario.Apellidos,
		usuario.Direccion,cuenta_usuario.Email,usuario.Telefono,usuario.Celular,usuario.Barrio');

		$this->db->from('usuario');
		$this->db->join('cuenta_usuario', 'usuario.Id_Cuenta_Usuario = cuenta_usuario.Id_Cuenta_Usuario');
		$this->db->where('usuario.Id_Usuario', $userId);
		return $this->db->get()->row();
	}

	public function update($userId, $data) {

		$this->db->set('Identificacion', $data['identificacion']);
		$this->db->set('Nombres', $data['nombre']);
		$this->db->set('Apellidos', $data['apellido']);
		$this->db->set('Direccion', $data['direccion']);
		$this->db->set('Telefono', $data['telefono']);
		$this->db->set('Celular', $data['celular']);
		$this->db->set('Barrio', $data['barrio']);
		$this->db->where('Id_Usuario', $userId);
		$this->db->update('usuario'); 

		$this->db->select('Id_Cuenta_Usuario');
		$this->db->from('usuario');
		$this->db->where('Id_Usuario', $userId);
		$cuenta = $this->db->get()->row();

		if( trim( $data['password'] ) == "" ) {
			$data = array(
				'Email' => $data['email']
			);
		} else {
			$data = array(
				'Email' => $data['email'],
				'Password' => $data['password']
			);
		}

		$this->db->where('Id_Cuenta_Usuario', $cuenta->Id_Cuenta_Usuario);
		$this->db->update('cuenta_usuario', $data);
		return true;
	}
	

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */