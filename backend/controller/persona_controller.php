<?php

class Persona_controller extends Controller {

    private $_persona_model;

    public function __construct() {
        parent::__construct();
        $this->_persona_model = $this->load_model('persona_model');
    }

    public function index() {
        $this->_view->tittle = 'PERSONAS';
        $this->_view->renderizar('persona');
    }

    public function insert_or_update_person() {

        if ($this->validar_campos_vacios('nombre_persona_empresa') == false)
            $this->_error[] = "El nombre es requerido";

        if ($this->validar_campos_vacios('email_persona_empresa') == false) {
            $this->_error[] = "El correo electronico es requerido";
        } elseif ($this->validar_email('email_persona_empresa') == false) {
            $this->_error[] = "EL correo electronico no es valido";
        }

        if ($this->validar_campos_vacios('direccion_persona_empresa') == false)
            $this->_error[] = "La dirección es requerida";

        if ($this->validar_campos_vacios('celular_persona_empresa') == false)
            $this->_error[] = "El celular es requerido o debe ser un numero";

        if ($this->validar_campos_vacios('telefono_persona_empresa') == false)
            $this->_error[] = "El telefono es requerido o debe ser un numero";

        if (array_key_exists(0, $this->_error)) {
            echo json_encode(array('errors' => $this->_error));
        } else {
            $this->_persona_model->set_nombre(trim(strtolower($_POST['nombre_persona_empresa'])));
            $this->_persona_model->set_email(trim(strtolower($_POST['email_persona_empresa'])));
            $this->_persona_model->set_direccion(trim(strtolower($_POST['direccion_persona_empresa'])));
            $this->_persona_model->set_celular(trim(strtolower($_POST['celular_persona_empresa'])));
            $this->_persona_model->set_telefono(trim(strtolower($_POST['telefono_persona_empresa'])));
            $this->_persona_model->set_tipo(trim(strtolower($_POST['tipo_persona_empresa'])));
            $this->_persona_model->set_estado(trim(strtolower($_POST['estado_persona_empresa'])));

            if ($this->validar_campos_vacios('id_persona_empresa') == true) {
                if ($this->_persona_model->validar_persona_existe() == true) {
                    $this->_persona_model->set_id_persona_empresa(trim($_POST['id_persona_empresa']));
                    echo json_encode(array('modify' => $this->_persona_model->modificar_persona_empresa()));
                } else {
                    if ($this->_persona_model->validar_datos_repetidos('persona_empresa_involucrada', 'Nombre', 'nombre_persona_empresa') == true) {
                        $this->_error[] = "Esta persona y/o empresa ya se encuentra registrada";
                        echo json_encode(array('errors' => $this->_error));
                    } else {
                        $this->_persona_model->set_id_persona_empresa(trim($_POST['id_persona_empresa']));
                        echo json_encode(array('modify' => $this->_persona_model->modificar_persona_empresa()));
                    }
                }
            } else {
                if ($this->_persona_model->validar_datos_repetidos('persona_empresa_involucrada', 'Nombre', 'nombre_persona_empresa') == true) {
                    $this->_error[] = "Esta persona y/o empresa ya se encuentra registrada";
                    echo json_encode(array('errors' => $this->_error));
                } else {
                    echo json_encode(array('register' => $this->_persona_model->insertar_persona_empresa()));
                }
            }
        }
    }

    public function consultar_persona() {

        $parametro_persona = strtolower(trim($_POST['parametro_persona']));

        $parametro_persona = empty($parametro_persona) ? null : $parametro_persona;

        $this->_persona_model->set_parametro_persona($parametro_persona);

        echo json_encode($this->_persona_model->consultar_persona());
    }
}
?>

