<?php

class Mantenimiento_controller extends Controller {

    private $_mantenimiento_model;
    private $_configuracion_model;

    public function __construct() {
        parent::__construct();
        $this->_mantenimiento_model = $this->load_model('mantenimiento_model');
        $this->_configuracion_model = $this->load_model('configuracion_model');
    }

    public function index() {
        $this->_view->tittle = 'MANTENIMIENTOS';
        $this->_view->herramienta = $this->_configuracion_model->configuration_consult('herramienta');
        $this->_view->renderizar('mantenimiento');
    }

    public function insert_or_update_maintenance() {

        if ($this->validar_fecha_mayor('fecha_mantenimiento', 'proximo_mantenimiento') == false) {
            $this->_error[] = "El proximo mantenimiento debe ser mayor a la fecha de mantenimieno";
        }

        if ($this->validar_campos_vacios('detalle') == false) {
            $this->_error[] = "El detalle del mantenimiento es requerido";
        }

        if (array_key_exists(0, $this->_error)) {
            echo json_encode(array('errors' => $this->_error));
        } else {

            $this->_mantenimiento_model->set_id_herramienta(trim($_POST['select_herramienta']));
            $this->_mantenimiento_model->set_fecha_mantenimiento(trim($_POST['fecha_mantenimiento']));
            $this->_mantenimiento_model->set_proximo_mantenimiento(trim($_POST['proximo_mantenimiento']));
            $this->_mantenimiento_model->set_detalle(strtolower(trim($_POST['detalle'])));

            if ($this->validar_campos_vacios('id_mantenimiento') == true) {
                $this->_mantenimiento_model->set_id_mantenimiento($_POST['id_mantenimiento']);
                echo json_encode(array('modify' => $this->_mantenimiento_model->modificar_mantenimiento()));
            } else {
                echo json_encode(array('register' => $this->_mantenimiento_model->insertar_mantenimiento()));
            }
        }
    }

    public function consultar_mantenimiento() {

        $parametro_mantenimiento = strtolower(trim($_POST['parametro_mantenimiento']));

        $parametro_mantenimiento = empty($parametro_mantenimiento) ? null : $parametro_mantenimiento;

        $this->_mantenimiento_model->set_parametro_mantenimiento($parametro_mantenimiento);

        echo json_encode($this->_mantenimiento_model->consultar_mantenimiento());
    }

}

?>
