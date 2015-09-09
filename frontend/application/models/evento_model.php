<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Evento_model extends CI_Model {

	public function get_events($eventId = NULL) {
		$this->db->select('evento.Id_Evento as id, evento.Nombre ,evento.Fecha_Inicial, evento.Fecha_Final, evento.Hora_Inicio, evento.Hora_Final, lugar_evento.Nombre as lugar');
		$this->db->join('lugar_evento', 'evento.Id_Lugar_Evento = lugar_evento.Id');		
		$this->db->where('evento.estado', 'activado');
		$this->db->where('evento.Fecha_Final >=', date('Y-m-d'));

		if(! is_null($eventId) ) {
			$this->db->where('evento.Id_Evento', $eventId);
			return $this->db->get('evento')->row();
		}

		return $this->db->get('evento')->result();
	}

	/**
	 * [get_profile_require description]
	 * @param  [type] $event_id   [description]
	 * @param  [type] $id_profile [description]
	 * @return [type]             [description]
	 */
	public function get_profile_require($event_id, $id_profile) {
		$this->db->select('perfil.Id, perfil.Nombre');
		$this->db->from('perfil');
		$this->db->join('detalle_perfil_evento', 'perfil.Id = detalle_perfil_evento.Id_Perfil');
		$this->db->join('evento', 'evento.Id_Evento	= detalle_perfil_evento.Id_Evento');
		$this->db->where('evento.Id_Evento', $event_id);
		$this->db->where('perfil.Id', $id_profile);
		return $this->db->get()->row_array();
	}

	/**
	 * obtiene la cantidad de perfiles de voluntarios que un evento necesita
	 * @param  int $event_id   [description]
	 * @param  int $id_profile [description]
	 * @return array             [description]
	 */
	public function get_amount_profile_require($event_id, $id_profile) {
		$this->db->select('detalle_perfil_evento.Cantidad');
		$this->db->from('detalle_perfil_evento');
		$this->db->join('evento', 'detalle_perfil_evento.Id_Evento = evento.Id_Evento');
		$this->db->join('perfil', 'perfil.Id = detalle_perfil_evento.Id_Perfil');
		$this->db->where('evento.Id_Evento', $event_id);
		$this->db->where('perfil.Id', $id_profile);
		return $this->db->get()->row();
	}

	/**
	 * obtiene la cantidad de usuarios o voluntarios que estan incritos para participar 
	 * en un evento
	 * @param  int $event_id   [description]
	 * @param  int $id_profile [description]
	 * @return array             [description]
	 */
	public function get_amount_profiles_reserved($event_id, $id_profile, $user_id) {

		$this->db->select('usuario.Id_Usuario');
		$this->db->from('detalle_usuario_evento');
		$this->db->join('evento', 'detalle_usuario_evento.Id_Evento = evento.Id_Evento');
		$this->db->join('perfil', 'perfil.Id = detalle_usuario_evento.Id_Perfil');
		$this->db->join('usuario', 'detalle_usuario_evento.Id_Usuario = usuario.Id_Usuario');
		$this->db->where('evento.Id_Evento', $event_id);
		$this->db->where('usuario.Id_Usuario', (int)$user_id);
		return $this->db->get()->result_array();
	}
}

/* End of file evento_model.php */
/* Location: ./application/models/evento_model.php */