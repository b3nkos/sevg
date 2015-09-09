<?php

class Medicamento_controller extends Controller {

    private $_medicamento_model;
    private $_configuration_model;

    public function __construct() {
        parent::__construct();
        $this->_medicamento_model = $this->load_model('medicamento_model');
        $this->_configuration_model = $this->load_model('configuracion_model');
    }

    public function index() {
        $this->_view->tittle = 'MEDICAMENTOS';
        $this->_view->presentacion = $this->_configuration_model->configuration_consult_active('presentacion');
        $this->_view->renderizar('medicamento');
    }

    public function insert_or_update_medicine() {

        if ($this->validar_campos_vacios('nombre_medicamento') == false)
            $this->_error[] = "El nombre del medicamento es requerido";

        if ($this->validar_campos_vacios('lote') == false)
            $this->_error[] = "El lote del medicamento es requerido";

        if ($this->validar_fecha('fecha_vencimiento') == false)
            $this->_error[] = "Ingrese una fecha de vencimiento mayor por 7 dias a la actual";

        if ($this->validar_campos_vacios('cantidad_medicamento') == false) {
            $this->_error[] = "La cantidad del medicamento es requerida";
        } elseif ($this->validar_enteros('cantidad_medicamento') == false) {
            $this->_error[] = "Ingrese una cantidad mayor a cero";
        }

        if (array_key_exists(0, $this->_error)) {
            echo json_encode(array('errors' => $this->_error));
        } else {
            if ($this->validar_campos_vacios('id_medicamento') == false) {

                $this->_medicamento_model->set_id_presentacion($_POST['select_presentacion']);
                $this->_medicamento_model->set_nombre(trim(strtolower($_POST['nombre_medicamento'])));
                $this->_medicamento_model->set_lote(trim(strtolower($_POST['lote'])));
                $this->_medicamento_model->set_fecha_vencimiento($_POST['fecha_vencimiento']);
                $this->_medicamento_model->set_cantidad($_POST['cantidad_medicamento']);                
                $this->_medicamento_model->set_estado(trim(strtolower($_POST['estado_medicamento'])));

                echo json_encode(array('register' => $this->_medicamento_model->insertar_medicamento()));
            } else {

                $this->_medicamento_model->set_id_medicamento($_POST['id_medicamento']);
                $this->_medicamento_model->set_id_presentacion($_POST['select_presentacion']);
                $this->_medicamento_model->set_nombre(trim(strtolower($_POST['nombre_medicamento'])));
                $this->_medicamento_model->set_lote(trim(strtolower($_POST['lote'])));
                $this->_medicamento_model->set_fecha_vencimiento($_POST['fecha_vencimiento']);
                $this->_medicamento_model->set_cantidad($_POST['cantidad_medicamento']);                
                $this->_medicamento_model->set_estado(trim(strtolower($_POST['estado_medicamento'])));

                echo json_encode(array('modify' => $this->_medicamento_model->modificar_medicamento()));
            }
        }
    }

    public function consultar_medicamento_() {
        $parametro_medicamento = strtolower(trim($_POST['parametro_medicamento']));

        $parametro_medicamento = empty($parametro_medicamento) ? null : $parametro_medicamento;

        $this->_medicamento_model->set_parametro_medicamento($parametro_medicamento);

        echo json_encode($this->_medicamento_model->consultar_medicamento_());
    }
	
	public function consultar_medicamento() {
        $parameter = (isset($_POST['parametro_medicamento']))
                     ? $_POST['parametro_medicamento'] : NULL;
        $eventId = (isset($_POST['eventId'])) ? $_POST['eventId']: NULL;
        
        echo json_encode($this->_medicamento_model->
             consultar_medicamento($parameter, $eventId));
    }

    public function listar_medicamentos() {
        echo json_encode($this->_medicamento_model->listar_medicamentos());
    }

}

?>
