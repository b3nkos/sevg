<?php

class Herramienta_controller extends controller {

    private $_herramienta_model;

    public function __construct() {
        parent::__construct();
        $this->_herramienta_model = $this->load_model('herramienta_model');
    }

    public function index() {
        $this->_view->tittle = 'HERRAMIENTAS';
        $this->_view->renderizar('herramienta');
    }

    public function insert_or_update_tool() {

        if ($this->validar_campos_vacios('nombre_herramienta') == false)
            $this->_error[] = "El nombre de la herramienta es requerido";

        if ($this->validar_campos_vacios('codigo_herramienta') == false)
            $this->_error[] = "El codigo de la herramienta es requerido";

        if (array_key_exists(0, $this->_error)) {
            echo json_encode(array('errors' => $this->_error));
        } else {
            $this->_herramienta_model->set_nombre_herramienta(trim(strtolower($_POST['nombre_herramienta'])));
            $this->_herramienta_model->set_codigo_herramienta(trim(strtolower($_POST['codigo_herramienta'])));
            $this->_herramienta_model->set_estado_herramienta(trim(strtolower($_POST['estado_herramienta'])));

            if ($this->validar_campos_vacios('id_herramienta') == true) {

                if ($this->_herramienta_model->validar_herramienta_existe() == true) {
                    $this->_herramienta_model->set_id_herramienta(trim($_POST['id_herramienta']));
                    echo json_encode(array('modify' => $this->_herramienta_model->modificar_herramienta_()));
                } else {
                    if ($this->_herramienta_model->validar_datos_repetidos('herramienta', 'Codigo', 'codigo_herramienta') == true) {
                        $this->_error[] = "Ya existe una herramienta con este codigo";
                        echo json_encode(array('errors' => $this->_error));
                    } else {
                        $this->_herramienta_model->set_id_herramienta(trim($_POST['id_herramienta']));
                        echo json_encode(array('modify' => $this->_herramienta_model->modificar_herramienta_()));
                    }
                }
            } else {
                if ($this->_herramienta_model->validar_datos_repetidos('herramienta', 'Codigo', 'codigo_herramienta') == true) {
                    $this->_error[] = "Ya existe una herramienta con este codigo";
                    echo json_encode(array('errors' => $this->_error));
                } else {
                    echo json_encode(array('register' => $this->_herramienta_model->insertar_herramienta_()));
                }
            }
        }
    }

    public function consultar_herramienta() {

        $parametro_herramienta = strtolower(trim($_POST['parametro_herramienta']));

        $parametro_herramienta = empty($parametro_herramienta) ? null : $parametro_herramienta;

        $this->_herramienta_model->set_parametro_herramienta($parametro_herramienta);

        echo json_encode($this->_herramienta_model->consultar_herramienta_());
    }

}

?>
