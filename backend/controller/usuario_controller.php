<?php

class Usuario_controller extends Controller {

	private $_usuario_model;
	private $_configuracion_model;

	public function __construct() {
		parent::__construct();
		$this->_usuario_model = $this->load_model('usuario_model');
		$this->_configuracion_model = $this->load_model('configuracion_model');
	}

	public function index() {
		$this->_view->tittle = 'USUARIOS';
		$this->_view->perfil = $this->_configuracion_model->configuration_consult('perfil');
		$this->_view->renderizar('usuario');
	}

	public function insert_or_update_users() {

		if ($this->validar_campos_vacios('identificacion') == false)
			$this->_error[] = "La identificacion es requerida o debe ser un numero";

		if ($this->validar_campos_vacios('nombres') == false)
			$this->_error[] = "Los nombres son requeridos";

		if ($this->validar_campos_vacios('apellidos') == false)
			$this->_error[] = "Los apellidos son requeridos";

		if ($this->validar_campos_vacios('direccion') == false)
			$this->_error[] = "La dirección es requerida";

		if ($this->validar_campos_vacios('telefono') == false)
			$this->_error[] = "El telefono es requerido o debe ser un numero";

		if ($this->validar_campos_vacios('celular') == false)
			$this->_error[] = "El celular es requerido o debe ser un numero";

		if ($this->validar_campos_vacios('barrio') == false)
			$this->_error[] = "El barrio es requerido";

		if ($this->validar_campos_vacios('email') == false) {
			$this->_error[] = "El correo electronico es requerido";
		} elseif ($this->validar_email('email') == false) {
			$this->_error[] = "EL correo electronico no es valido";
		}

		if ($this->validar_campos_vacios('perfiles') == false)
			$this->_error[] = "Debe seleccionar uno (1) o mas perfiles";

		if (array_key_exists(0, $this->_error)) {
			echo json_encode(array('errors' => $this->_error));
		} else {
			if ($this->validar_campos_vacios('id_usuario') == true) {

				//la validacion de la identificacion para no repetir usuarios
				if ($this->_usuario_model->validar_identificacion('identificacion') === FALSE) {
					$this->_error[] = "Ya existe un usuario con esta identificación";
					echo json_encode(array('errors' => $this->_error));
				} else {
					$this->_usuario_model->set_id_usuario($_POST['id_usuario']);
					$this->_usuario_model->set_email($_POST['email']);
					$this->_usuario_model->set_tipo_cuenta($_POST['tipo_cuenta']);
					$this->_usuario_model->set_identificacion($_POST['identificacion']);
					$this->_usuario_model->set_nombres($_POST['nombres']);
					$this->_usuario_model->set_apellidos($_POST['apellidos']);
					$this->_usuario_model->set_direccion($_POST['direccion']);
					$this->_usuario_model->set_telefono($_POST['telefono']);
					$this->_usuario_model->set_celular($_POST['celular']);
					$this->_usuario_model->set_barrio($_POST['barrio']);
					$this->_usuario_model->set_estado_cuenta($_POST['estado_cuenta']);

					$this->_usuario_model->set_perfiles($_POST['perfiles']);

					echo json_encode( array( 'modify' => $this->_usuario_model->modificar_usuario() ) );
				}
			} else {

				if ($this->_usuario_model->validar_identificacion('identificacion') == false) {
					$this->_error[] = "Ya existe un usuario con esta identificación";
					echo json_encode(array('errors' => $this->_error));
				} else {
					$this->_usuario_model->set_email($_POST['email']);
					$this->_usuario_model->set_tipo_cuenta($_POST['tipo_cuenta']);
					$this->_usuario_model->set_identificacion($_POST['identificacion']);
					$this->_usuario_model->set_nombres($_POST['nombres']);
					$this->_usuario_model->set_apellidos($_POST['apellidos']);
					$this->_usuario_model->set_direccion($_POST['direccion']);
					$this->_usuario_model->set_telefono($_POST['telefono']);
					$this->_usuario_model->set_celular($_POST['celular']);
					$this->_usuario_model->set_barrio($_POST['barrio']);
					$this->_usuario_model->set_estado_cuenta($_POST['estado_cuenta']);

					$this->_usuario_model->set_perfiles($_POST['perfiles']);

					echo json_encode(array('register' => $this->_usuario_model->insertar_usuario()));
				}
			}
		}
	}       

	public function consultar_usuario() {

		$parametro1 = isset($_POST['parametro_usuario1']) ? strtolower(trim($_POST['parametro_usuario1'])) : NULL;
		$parametro1 = empty($parametro1) ? NULL : $parametro1;
		$user_id    = ( isset($_POST['user_id']) ) ? $_POST['user_id'] : NULL;


		if( is_null($parametro1) && is_null($user_id) ) {
			echo json_encode( array('error'=>true) );
			return false;
		} else if ( !is_null($user_id) ) {
			echo json_encode( array(
				$this->_usuario_model->consultar_usuario(NULL, $user_id),
				$this->_usuario_model->get_perfiles_usuario($user_id)
			));
			return true;
		}

		echo json_encode($this->_usuario_model->consultar_usuario($parametro1));
	}

	public function reset_password() {
		$http_header = isset($_SERVER['HTTP_X_REQUESTED_WITH'])
		? $_SERVER['HTTP_X_REQUESTED_WITH'] : NULL;

		if( ! is_null($http_header) && strtolower($http_header) === 'xmlhttprequest' ) {
			echo json_encode( $this->_usuario_model->reset_password($_POST['user_id']) );
		} else {
			echo json_encode( FALSE );
		}
	}

	public function get_perfiles_usuario() {
		$user_id = isset($_POST['user_id']) ? empty( trim($_POST['user_id']) ) 
		? NULL : trim($_POST['user_id']) : NULL; 

		echo json_encode( $this->_usuario_model->get_perfiles_usuario($user_id) );
	}

	public function profile() {
		$this->_view->tittle 	= 'Sevg :: perfil';
		$this->_view->errors 	= array();
		$this->_view->success 	= false;

		if( isset($_POST['Profile']) ) {
			if ($this->validar_campos_vacios('Profile','identificacion') == false)
				$this->_view->errors[] = "La identificacion es requerida o debe ser un numero";

			if ($this->validar_campos_vacios('Profile','nombre') == false)
				$this->_view->errors[] = "Los nombres son requeridos";

			if ($this->validar_campos_vacios('Profile','apellido') == false)
				$this->_view->errors[] = "Los apellidos son requeridos";

			if ($this->validar_campos_vacios('Profile','direccion') == false)
				$this->_view->errors[] = "La dirección es requerida";

			if ($this->validar_campos_vacios('Profile','telefono') == false)
				$this->_view->errors[] = "El telefono es requerido o debe ser un numero";

			if ($this->validar_campos_vacios('Profile','celular') == false)
				$this->_view->errors[] = "El celular es requerido o debe ser un numero";

			if ($this->validar_campos_vacios('Profile','barrio') == false)
				$this->_view->errors[] = "El barrio es requerido";

			if ($this->validar_campos_vacios('Profile','email') == false) {
				$this->_view->errors[] = "El correo electronico es requerido";
			} elseif ($this->validar_email('Profile','email') == false) {
				$this->_view->errors[] = "EL correo electronico no es valido";
			}

			if( !empty( trim($_POST['Profile']['password']) ) ||  !empty( trim($_POST['Profile']['repassword']) )){
				if( $_POST['Profile']['password'] != $_POST['Profile']['repassword'] ) {}
					$this->_view->errors[] = "Las contraseñas no coinciden";
			}

			if( count($this->_view->errors) == 0 ) {
				$this->_usuario_model->update_profile($_SESSION['Id_Usuario'], $_POST['Profile']);
				$_SESSION['Email'] = $_POST['Profile']['email'];
				$this->_view->success = true;
			}
		}

		$this->_view->data = $this->_usuario_model->profile( $_SESSION['Id_Usuario'] );
		$this->_view->renderizar('profile');
	}

	public function logout() {
		// Inicializar la sesión.
		// Si está usando session_name("algo"), ¡no lo olvide ahora!
		// session_start();

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

		// Finalmente, destruir la sesión.
		session_destroy();
		header('Location: '.BASE_URL);
	}

}

?>
