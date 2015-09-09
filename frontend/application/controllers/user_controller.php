<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->model('user_model');
		$this->load->model('evento_model');
	}

	public function index() {

	}

	public function update_profile() {

		$response = array();

		if( $this->input->post('Profile') ) {

			$repassword = trim( $this->input->post("Profile")['repassword'] );

			$this->form_validation->set_rules('Profile[identificacion]', 'identificación', 'required');
			$this->form_validation->set_rules('Profile[nombre]', 'nombre', 'required');
			$this->form_validation->set_rules('Profile[apellido]', 'apellido', 'trim|required');
			$this->form_validation->set_rules('Profile[email]', 'email', 'trim|required|valid_email');
			$this->form_validation->set_rules('Profile[direccion]', 'dirección', 'trim|required');
			$this->form_validation->set_rules('Profile[telefono]', 'telefono', 'trim|required');
			$this->form_validation->set_rules('Profile[celular]', 'celular', 'trim|required');
			$this->form_validation->set_rules('Profile[barrio]', 'barrio', 'trim|required');
			$this->form_validation->set_rules('Profile[password]', 'password', 'callback_check_password['.$repassword.']');

			$this->form_validation->set_message('required', 'El campo %s es requerido');
			$this->form_validation->set_message('matches', 'Las contraseñas no coinciden');
			$this->form_validation->set_message('valid_email', 'El email no es correcto');

			if( ! $this->form_validation->run() ) {
				$response['success'] = false;
			} else {
				$userId = $this->session->userdata('Id_Usuario');
				$response['success'] = $this->user_model->update( $userId, $this->input->post('Profile') );
			}
		}

		$response['title'] = 'Perfil';
		$response['content'] = 'user/profile';
		$response['data'] = $this->user_model->get_data( $this->session->userdata('Id_Usuario') );
		$this->load->view('includes/template', $response);
	}

	public function get_profiles() {
		if( $this->input->is_ajax_request() ) {
			echo json_encode( $this->user_model->get_profiles( $this->session->userdata('Id_Usuario') ) );
		}
	}

	public function login() {
		$url = explode('/', base_url());
		
		$response 	= array();
		$email 		= trim( $this->input->post('email') );
		$password 	= trim( $this->input->post('password') );
		$data 		= $this->user_model->login($email, $password);

		if( count($data) > 0 ) {
			if( $data['Tipo'] === 'administrador' ) {
				session_start();
				$_SESSION = $data;
				header('Location: http://'.$url[2].'/sevg/backend');
			} elseif( $data['Tipo'] === 'usuario' ) {
				$this->session->set_userdata($data);
			}
		} else {
			$response['error_status'] = 'has-error';
		}

		$response['title'] = 'Index';
		$response['content'] = 'home';
		$this->load->view('includes/template', $response);
	}

	public function logout() {
		$this->session->unset_userdata('Email');
		$this->session->sess_destroy();
		$this->remove_cache();

		redirect('/home');

		session_start();

		// Destruir todas las variables de sesión.
		$_SESSION = array();

		// Si se desea destruir la sesión completamente, borre también la cookie de sesión.
		// Nota: ¡Esto destruirá la sesión, y no la información de la sesión!
		if (ini_get("session.use_cookies")) {
			$params = session_get_cookie_params();
			setcookie(session_name(), '', time() - 42000,
			$params["path"], $params["domain"],
			$params["secure"], $params["httponly"]
			);
		}
	}

	public function remove_cache() {

		header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");

		$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
		$this->output->set_header('Pragma: no-cache');
	}

	public function participar() {

		if( $this->input->is_ajax_request() ) {
			$event_id 	= $this->input->post('eventId');
			$idProfile 	= $this->input->post('idProfile');
			$userId 		= $this->session->userdata('Id_Usuario');
			$flag 		= false;

			$amount_profiles_require 	= $this->evento_model->get_amount_profile_require($event_id, $idProfile);
			$amount_profiles_reserved	= $this->evento_model->get_amount_profiles_reserved($event_id, $idProfile, $userId);

			if( isset( $amount_profiles_require->Cantidad ) && $amount_profiles_require->Cantidad > 0
				&& count($amount_profiles_reserved) < $amount_profiles_require->Cantidad ) {

				if( count($amount_profiles_reserved) > 0 ) {
					foreach ($amount_profiles_reserved as $key => $value) {
						if( $value['Id_Usuario'] == $userId )
							$flag = true; break;
					}
				}

				if( $flag ) {
					echo json_encode( array('error' => 'No se puede participar en el mismo evento') );
				} else {
					if( $this->user_model->participar($event_id, $userId, $idProfile) )
						echo json_encode( array('success' => 'Registro realizado') );
				}
			} else {
				echo json_encode(array(
					'error' => 'No se requiere este perfil para este evento o no hay aun perfiles registrados'
				));
			}
		}
	}

	public function check_password($password, $repassword) {
		if( $password === $repassword ) {
			return true;
		}
		$this->form_validation->set_message('check_password', 'Las contraseñas no coinciden');
		return false;
	}
}

/* End of file user_controller.php */
/* Location: ./application/controllers/user_controller.php */
