<?php

class Evento_model extends Model {

   private $_id;
   private $_nombre;
   private $_fecha_inicio;
   private $_fecha_fin;
   private $_hora_inicio;
   private $_hora_fin;
   private $_capacidad;
   private $_aforo;
   private $_estado;
   //////////////////////////////////////////////////////////////////////////
   private $_recurso_humano;
   private $_ubicacion_asistente;
   private $_cargo_persona;
   private $_caracterizacion;
   ///////////////////////////////////////////////////////////////////////////
   private $_parametro1;
   private $_parametro2;
   private $_parametro3;

   ///////////////////////////////////////////////////////////////////////////

   public function set_id($id) {
      $this->_id = $id;
   }

   public function set_nombre($nombre) {
      $this->_nombre = trim($nombre);
   }

   public function set_fecha_inicio($fecha_inicio) {
      $this->_fecha_inicio = trim($fecha_inicio);
   }

   public function set_fecha_fin($fecha_fin) {
      $this->_fecha_fin = trim($fecha_fin);
   }

   public function set_hora_inicio($hora_inicio) {
      $this->_hora_inicio = trim($hora_inicio);
   }

   public function set_hora_fin($hora_fin) {
      $this->_hora_fin = trim($hora_fin);
   }

   public function set_capacidad($capacidad) {
      $this->_capacidad = trim($capacidad);
   }

   public function set_aforo($aforo) {
      $this->_aforo = trim($aforo);
   }

   public function set_estado($estado) {
      $this->_estado = trim($estado);
   }

   ///////////////////////////////////////////////////////////////////////////
   public function set_recurso_humano($recurso_humano) {
      $this->_recurso_humano = $recurso_humano;
   }

   public function set_ubicacion_asistente($ubicacion_asistente) {
      $this->_ubicacion_asistente = $ubicacion_asistente;
   }

   public function set_cargo_persona($cargo_persona) {
      $this->_cargo_persona = $cargo_persona;
   }

   public function set_caracterizacion($caracterizacion) {
      $this->_caracterizacion = $caracterizacion;
   }

   ///////////////////////////////////////////////////////////////////////////
   public function set_parametro1($parametro1) {
      $this->_parametro1 = $parametro1;
   }

   public function set_parametro2($parametro2) {
      $this->_parametro2 = $parametro2;
   }

   public function set_parametro3($parametro3) {
      $this->_parametro3 = $parametro3;
   }

   ///////////////////////////////////////////////////////////////////////////

   public function __construct() {
      parent::__construct();
   }

   public function validar_evento_repetido() {
      
   }

   public function insertar_evento($params) {

      $sql = $this->_db->prepare("CALL InsertarUpdateEvento(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $sql->bindParam(1, $this->_id);
      $sql->bindParam(2, $this->_nombre);
      $sql->bindParam(3, $this->_fecha_inicio);
      $sql->bindParam(4, $this->_fecha_fin);
      $sql->bindParam(5, $this->_hora_inicio);
      $sql->bindParam(6, $this->_hora_fin);
      $sql->bindParam(7, $this->_capacidad);
      $sql->bindParam(8, $this->_aforo);
      $sql->bindParam(9, $this->_estado);
      $sql->bindParam(10, $params['lugarEvento'], PDO::PARAM_INT);
      $sql->bindParam(11, $params['caracterEvento']);
      $sql->bindParam(12, $params['sistemaControlIngresoAforo']);
      $sql->bindParam(13, $params['ingresoEvento']);
      $sql->bindParam(14, $params['tipoEvento']);
      $sql->execute();

      $last_event_id = NULL;

      if ($this->_id == NULL) {
         $sql = $this->_db->prepare("SELECT MAX(Id_Evento) as id FROM evento");
         $sql->execute();
         $last_event_id = $sql->fetch();
      } else {
         $last_event_id['id'] = $this->_id;
      }

      $pdo = $this->_db->prepare('INSERT INTO detalle_perfil_evento(Id_Evento, Id_Perfil, Cantidad) VALUES(?, ?, ?)');
      foreach ($this->_recurso_humano as $llave => $valor) {
         foreach ($valor as $key => $value) {
            $pdo->execute(array($last_event_id['id'], $value['id'], $value['cantidad']));
         }
      }

      $pdo = $this->_db->prepare("INSERT INTO detalle_ubicacion_asistente_evento(Id_Evento, Id_Ubicacion_Asistente, Cantidad) VALUES(?, ?, ?)");
      foreach ($this->_ubicacion_asistente as $llave => $valor) {
         foreach ($valor as $key => $value) {
            $pdo->execute(array($last_event_id['id'], $value['id'], $value['cantidad']));
         }
      }

      $pdo = $this->_db->prepare("INSERT INTO detalle_cargo_persona_empresa_evento(Id_Evento, Id_Personas_Involucradas, Id_Cargo) VALUES(?, ?, ?)");
      foreach ($this->_cargo_persona as $key => $value) {
         $pdo->execute(array((int) $last_event_id['id'], (int) $value, (int) $key));
      }

      $pdo = $this->_db->prepare('INSERT INTO detalle_caracterizacion_publico_participa_evento(Id_Evento, Id_Caracterizacion_Publico_Participa) VALUES(?, ?)');
      foreach ($this->_caracterizacion as $key => $value) {
         $pdo->execute(array($last_event_id['id'], $value));
      }

      return TRUE;
   }

   public function consultar_evento() {
      $query = $this->_db->prepare("CALL ConsultarEvento(?, ?, ?, ?)");
      $query->bindParam(1, $this->_id, PDO::PARAM_INT);
      $query->bindParam(2, $this->_parametro1, PDO::PARAM_STR);
      $query->bindParam(3, $this->_parametro2, PDO::PARAM_STR);
      $query->bindParam(4, $this->_parametro3, PDO::PARAM_STR);
      $query->execute();
      return $query->fetchAll();
   }

   //insertar y/o modificacion de medicamentos, utensilios, herramientas y voluntarios
   public function inOrUpDetails($eventId, $mediUtenAmount, $herramientas, $voluntarios) {

      $pdo = $this->_db->prepare('DELETE FROM detalle_herramienta_evento WHERE Id_Evento = ' . $eventId);
      $pdo->execute();

      $pdo = $this->_db->prepare('DELETE FROM detalle_usuario_evento WHERE Id_Evento = ' . $eventId);
      $pdo->execute();

      $pdo = $this->_db->prepare("CALL insertDetailMedUtenEvent(?, ?, ?)");
      foreach ($mediUtenAmount as $medUten => $cantidad) {
         $pdo->execute( array( (int)$eventId, (int)$medUten, (int)$cantidad ) );
      }
      
      $pdo = $this->_db->prepare("CALL insertDetailHerramientaEvent(?, ?)");
      foreach ($herramientas as $key => $value) {
         $pdo->execute( array( (int)$eventId, (int)$value ) );
      }
      
      $pdo = $this->_db->prepare("CALL insertDetailVoluntaPer(?, ?, ?)");
      foreach ($voluntarios as $voluntario => $perfil) {
         $pdo->execute( array( (int)$eventId, (int)$voluntario, (int)$perfil ) );
      }
      
      return true;

//        foreach ($this->_caracterizacion as $key => $value) {
//            $pdo->execute(array($last_event_id['id'], $value));
//        }
//       
//        $sql = $this->_db->prepare("CALL insertDetailMedUtenEvent(?, ?, ?)");
//        $sql->bindParam(1, $eventId, PDO::PARAM_INT);
//        $sql->bindParam(2, $medUtenId, PDO::PARAM_INT);
//        $sql->bindParam(3, $amount, PDO::PARAM_INT);
//        $sql->execute();
   }

}
