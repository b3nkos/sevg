<?php

class Evento_controller extends Controller {

//    private $_evento_model;
//    private $_configuracion_model;

   public function __construct() {
      parent::__construct();
      $this->_evento_model = $this->load_model('evento_model');
      $this->_configuracion_model = $this->load_model('configuracion_model');
      $this->_medicamento_model = $this->load_model('medi_uten_model');
      $this->_herramienta_model = $this->load_model('herramienta_model');
      $this->_usuario_model = $this->load_model('usuario_model');
      $this->_perfil_model = $this->load_model('perfil_model');
   }

   public function index($flag = FALSE) {

      $this->_view->caracterizacion_publico_participa = $this->_configuracion_model->configuration_consult_active('caracterizacion_publico_participa');
      $this->_view->ubicacion_asistente = $this->_configuracion_model->configuration_consult_active('ubicacion_asistente');
      $this->_view->perfil = $this->_configuracion_model->configuration_consult_active('perfil');
      $this->_view->lugar_evento = $this->_configuracion_model->configuration_consult_active('lugar_evento');
      $this->_view->caracter_evento = $this->_configuracion_model->configuration_consult_active('caracter_evento');
      $this->_view->ingreso_evento = $this->_configuracion_model->configuration_consult_active('ingreso_evento');
      $this->_view->sistema_control_ingreso_aforo = $this->_configuracion_model->configuration_consult_active('sistema_control_ingreso_aforo');
      $this->_view->tipo_evento = $this->_configuracion_model->configuration_consult_active('tipo_evento');
      $this->_view->cargo = $this->_configuracion_model->configuration_consult_active('cargo');
      $this->_view->persona_empresa = $this->_configuracion_model->configuration_consult_active('persona_empresa_involucrada');

      if ($flag == FALSE) {
         $this->_view->tittle = 'EVENTOS';
         $this->_view->renderizar('evento');
      } else {
         $this->_view->tittle = 'Modificar - evento';
         $this->_view->renderizar('evento_update');
      }
   }

   public function insertar_evento() {

      //nombre_evento
      if (!$this->validar_campos_vacios('nombre_evento'))
         $this->_error[] = "El nombre del evento es requerido";

      //capacidad_area
      if ($this->validar_campos_vacios('capacidad_area') == false) {
         $this->_error[] = "La capacidad del area es requerida o debe ser un numero";
      } elseif ($this->validar_enteros('capacidad_area') === false) {
         $this->_error[] = "La capacidad del area debe ser un numero";
      }

      //aforo_esperado
      if ($this->validar_campos_vacios('aforo_esperado') === false) {
         $this->_error[] = "El aforo esperado es requerido";
      } elseif ($this->validar_enteros('aforo_esperado') === false) {
         $this->_error[] = "El aforo debe ser un numero";
      }

      //capacidad_area > aforo_esperado
      if (!$this->mayor_menor('capacidad_area', 'aforo_esperado'))
         $this->_error[] = "La capacidad del area debe ser mayor a la del aforo esperado";

      //fecha_inicio
      if (!$this->validar_campos_vacios('fecha_inicial'))
         $this->_error[] = "La fecha de inicio del evento es requerida";

      if (!$this->validar_fecha('fecha_inicial'))
         $this->_error[] = "La fecha de inicio del evento debe ser mayor a la fecha actual por 7 dias";

      //Fecha_final
      if (!$this->validar_campos_vacios('fecha_final'))
         $this->_error[] = "La fecha de fin del evento es requerida";

      //fecha_final >= fecha_inicio
      if (!$this->validar_fecha_mayor_igual('fecha_inicial', 'fecha_final'))
         $this->_error[] = "La fecha de fin del evento debe ser igual o superior a la fecha de inicio";

      //hora_inicial
      if (!$this->validar_campos_vacios('hora_inicial'))
         $this->_error[] = "La hora de inicio es requerida";

      //hora_final
      if (!$this->validar_campos_vacios('hora_final'))
         $this->_error[] = "La hora de fin es requerida";

      //hora_final > hora_inicial
      $date_hour_validate = $this->validar_hora('fecha_inicial', 'fecha_final', 'hora_inicial', 'hora_final');
      if ($date_hour_validate === FALSE) {
         $this->_error[] = "Las fechas y las horas son requeridas";
      } elseif ($date_hour_validate < 1) {
         $this->_error[] = "La hora de fin del evento debe ser mayor por una (1) o más horas a la hora de inicio";
      }

      $recurso_humano = array();
      $ubicacion_asistente = array();

      foreach ($_POST as $key => $value) {
         if (stristr($key, 'recurso_humano')) {
            if (is_numeric($value)) {
               if (strlen($key) == 16) {
                  array_push($recurso_humano, array($key => array('id' => substr($key, -1), 'cantidad' => $value)));
               } else {
                  array_push($recurso_humano, array($key => array('id' => substr($key, -2), 'cantidad' => $value)));
               }
            } else {
               $this->_error[] = 'Las cantidades del recurso humano son requridas o deben ser numéricas';
               break;
            }
         }
      }

      foreach ($_POST as $key => $value) {
         if (stristr($key, 'ubicacion_asistente')) {
            if (is_numeric($value)) {
               if (strlen($key) == 21) {
                  array_push($ubicacion_asistente, array($key => array('id' => substr($key, -1), 'cantidad' => $value)));
               } else {
                  array_push($ubicacion_asistente, array($key => array('id' => substr($key, -2), 'cantidad' => $value)));
               }
            } else {
               $this->_error[] = 'Las cantidades de las ubicaciones de los asistentes son requridas o deben ser numéricas';
               break;
            }
         }
      }

        if(isset($_POST['cargo'])) {
            if (count(array_unique($_POST['cargo'])) != count($_POST['cargo'])) {
                $this->_error[] = "No pueden haber cargos repetidos";
            }
        }

        if(isset($_POST['persona_empresa'])) {
          if (count(array_unique($_POST['persona_empresa'])) != count($_POST['persona_empresa'])) {
             $this->_error[] = "No pueden personas/empresas repetidas";
          }

        }

      if (isset($_POST['caracterizacion']) == false)
         $this->_error[] = "Debes seleccionar unas (1) o mas caracterizaciones";

      if (array_key_exists(0, $this->_error)) {
         echo json_encode(array('errors' => $this->_error));
      } else {

         $this->_evento_model->set_nombre($_POST['nombre_evento']);
         $this->_evento_model->set_fecha_inicio($_POST['fecha_inicial']);
         $this->_evento_model->set_fecha_fin($_POST['fecha_final']);
         $this->_evento_model->set_hora_inicio($_POST['hora_inicial']);
         $this->_evento_model->set_hora_fin($_POST['hora_final']);
         $this->_evento_model->set_capacidad($_POST['capacidad_area']);
         $this->_evento_model->set_aforo($_POST['aforo_esperado']);
         $this->_evento_model->set_estado($_POST['estado_evento']);
         $this->_evento_model->set_id((isset($_POST['event_id'])) ? $_POST['event_id'] : NULL);

         $this->_evento_model->set_recurso_humano($recurso_humano);
         $this->_evento_model->set_ubicacion_asistente($ubicacion_asistente);

         $cargos_personas = array_combine($_POST['cargo'], $_POST['persona_empresa']);
         $this->_evento_model->set_cargo_persona($cargos_personas);

         $this->_evento_model->set_caracterizacion($_POST['caracterizacion']);

         $params = array(
             'lugarEvento' => trim($_POST['lugar_evento']),
             'caracterEvento' => trim($_POST['caracter_evento']),
             'sistemaControlIngresoAforo' => trim($_POST['sistema_control_ingreso_aforo']),
             'ingresoEvento' => trim($_POST['ingreso_evento']),
             'tipoEvento' => trim($_POST['tipo_evento'])
         );

         if (isset($_POST['event_id'])) {
            echo json_encode(array('update' => $this->_evento_model->insertar_evento($params)));
         } else {
            echo json_encode(array('register' => $this->_evento_model->insertar_evento($params)));
         }
      }
   }

   public function consultar_evento() {

      $parametro1 = trim($_POST['parametro_evento1']);
      $parametro2 = trim($_POST['parametro_evento2']);
      $parametro3 = trim($_POST['parametro_evento3']);

      $parametro1 = empty($parametro1) ? NULL : $parametro1;
      $parametro2 = empty($parametro2) ? NULL : $parametro2;
      $parametro3 = empty($parametro3) ? NULL : $parametro3;

      $this->_evento_model->set_id(NULL);
      $this->_evento_model->set_parametro1($parametro1);
      $this->_evento_model->set_parametro2($parametro2);
      $this->_evento_model->set_parametro3($parametro3);

      echo json_encode($this->_evento_model->consultar_evento());
   }

   public function update($event_id = NULL) {

      if (is_numeric($event_id)) {
         $this->_evento_model->set_id($event_id);
         $this->_evento_model->set_parametro1(NULL);
         $this->_evento_model->set_parametro2(NULL);
         $this->_evento_model->set_parametro3(NULL);

         $this->_view->event = $this->_evento_model->consultar_evento();

         if (empty($this->_view->event)) {
            header('Location: ' . BASE_URL . 'evento');
         }
         //Caracterizacion del publico que participa
         $this->_view->cpqp_event = array_column($this->_configuracion_model->configuration_consult_active('caracterizacion_publico_participa', $event_id), 'Id');
         $this->_view->ubicacion_asistente_event = $this->_configuracion_model->configuration_consult_active('ubicacion_asistente', $event_id);
         $this->_view->perfil_event = $this->_configuracion_model->configuration_consult_active('perfil', $event_id);
         $this->_view->lugar_evento_event = $this->_configuracion_model->configuration_consult_active('lugar_evento', $event_id);
         $this->_view->caracter_evento_event = $this->_configuracion_model->configuration_consult_active('caracter_evento', $event_id);
         $this->_view->ingreso_evento_event = $this->_configuracion_model->configuration_consult_active('ingreso_evento', $event_id);
         //Sistema control de ingreso a foro
         $this->_view->sciaf = $this->_configuracion_model->configuration_consult_active('sistema_control_ingreso_aforo', $event_id);
         $this->_view->tipo_evento_event = $this->_configuracion_model->configuration_consult_active('tipo_evento', $event_id);
         $this->_view->cargo_event = array_column($this->_configuracion_model->configuration_consult_active('cargo', $event_id), 'Id');
         $this->_view->persona_empresa_event = $this->_configuracion_model->configuration_consult_active('persona_empresa_involucrada', $event_id);
         $this->index(TRUE);
      } else {
         header('Location: ' . BASE_URL . 'evento');
      }
   }

   //inser y/o modificacion de medicamentos, utensilios, herramientas y voluntarios
   public function inOrUpDetails() {

      $eventId = ( isset($_POST['eventId']) ) ? $_POST['eventId'] : NULL;
      $saveDetail = ( isset($_POST['clicked']) ) ? ( $_POST['clicked'] === 'on' ) ? TRUE : FALSE  : FALSE;

      if (is_numeric($eventId) && !$saveDetail) {

         //cargar de la DB los medicamentos/utensilios
         $response = array(
             'medicamentos' => $this->_medicamento_model->consultar_medicamento(NULL, NULL),
             'detalleMedicamentos' => $this->_medicamento_model->consultar_medicamento(NULL, $eventId),
             'herramientas' => $this->_herramienta_model->consultar_herramienta(),
             'detalleHerramientas' => $this->_herramienta_model->consultar_herramienta(NULL, $eventId),
             'voluntarios_detalle' => $this->_usuario_model->consultar_usuario(NULL, $eventId),
             'voluntarios' => $this->_usuario_model->consultar_usuario(),
             'perfiles' => $this->_perfil_model->getPerfiles(NULL)
         );

         echo json_encode($response);
      } else {

         //medUten, herramientas, voluntarios, perfiles
         $mediUtenAmount      = NULL;
         $herramientas        = NULL;
         $voluntarios_perfil  = NULL;
         $ids = "";

         if (array_unique($_POST['medUten']) != $_POST['medUten']) {

            $this->_error[] = 'El medicamento o utensilio no puede ser el mismo';
         } elseif (array_unique($_POST['herramientas']) != $_POST['herramientas']) {

            $this->_error[] = 'Las herramienstas no puedenser las mismas';
         } elseif (array_unique($_POST['voluntarios']) != $_POST['voluntarios']) {

            $this->_error[] = 'Los voluntarios no se pueden repetir';
         } else {

            $mediUtenAmount = array_combine($_POST['medUten'], $_POST['medUtenAmount']);
            foreach ($mediUtenAmount as $key => $value) {
               $ids .= $key . ',';
            }

            $ids = rtrim($ids, ',');
            $amounts = $this->_medicamento_model->getAmounts($ids);

            foreach ($mediUtenAmount as $key => $value) {

               foreach ($amounts as $_key => $_value) {

                  if ($key == $_value['Id_Medicamento'] && $value > $_value['Cantidad']) {
                     $this->_error[] = 'El medicamento ' . $_value['Nombre'] . ' No tiene suficientes unidades en stock';
                     break(2);
                  }
               }
            }
         }

         if (!array_key_exists(0, $this->_error)) {

            $herramientas = $_POST['herramientas'];
            $voluntarios_perfil = array_combine($_POST['voluntarios'], $_POST['perfiles']);
            echo json_encode($this->_evento_model->inOrUpDetails($eventId, $mediUtenAmount, $herramientas, $voluntarios_perfil));
         } else {
            echo json_encode(array('error'=>$this->_error));
         }
      }
   }

}
