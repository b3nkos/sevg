<?php

class Configuracion_model extends Model {

    private $_id;
    private $_nombre;
    private $_estado;

    public function set_id($_id) {
        $this->_id = trim($_id);
    }

    public function set_nombre($_nombre) {
        $this->_nombre = trim($_nombre);
    }

    public function set_estado($_estado) {
        $this->_estado = trim($_estado);
    }

    public function __construct() {
        parent::__construct();
    }

    public function insert_configuration($table_name) {
        $table_name = strtolower($table_name);
        $query = NULL;
        switch ($table_name) {

            case 'tipo_evento':
                $query = $this->_db->prepare("CALL InsertarTipoEvento(?, ?)");
                break;

            case 'caracter_evento':
                $query = $this->_db->prepare("CALL InsertarCaracterEvento(?, ?)");
                break;

            case 'ingreso_evento':
                $query = $this->_db->prepare("CALL InsertarIngresoEvento(?, ?)");
                break;

            case 'sistema_control_ingreso_aforo':
                $query = $this->_db->prepare("CALL InsertarSistemaControlIngresoAforo(?, ?)");
                break;

            case 'caracterizacion_publico_participa':
                $query = $this->_db->prepare("CALL InsertarCaracterizacionPublicoParticipa(?, ?)");
                break;

            case 'lugar_evento':
                $query = $this->_db->prepare("CALL InsertarLugarEvento(?, ?)");
                break;

            case 'ubicacion_asistente':
                $query = $this->_db->prepare("CALL InsertarUbicacionAsistente(?, ?)");
                break;

            case 'cargo':
                $query = $this->_db->prepare("CALL InsertarCargo(?, ?)");
                break;

            case 'perfil':
                $query = $this->_db->prepare("CALL InsertarPerfil(?, ?)");
                break;
            
            case 'presentacion':
                $query = $this->_db->prepare("CALL InsertarPresentacion(?, ?)");
                break;

            default :
                return false;
                break;
        }
        $query->bindParam(1, $this->_nombre);
        $query->bindParam(2, $this->_estado);
        return $query->execute();
    }

    public function update_configuration($table_name) {
        $table_name = strtolower($table_name);
        $query = NULL;
        switch ($table_name) {

            case 'tipo_evento':
                $query = $this->_db->prepare("CALL ModificarTipoEvento(?, ?, ?)");
                break;

            case 'caracter_evento':
                $query = $this->_db->prepare("CALL ModificarCaracterEvento(?, ?, ?)");
                break;

            case 'ingreso_evento':
                $query = $this->_db->prepare("CALL ModificarIngresoEvento(?, ?, ?)");
                break;

            case 'sistema_control_ingreso_aforo':
                $query = $this->_db->prepare("CALL ModificarSistemaControlIngresoAforo(?, ?, ?)");
                break;

            case 'caracterizacion_publico_participa':
                $query = $this->_db->prepare("CALL ModificarCaracterizacionPublicoParticipa(?, ?, ?)");
                break;

            case 'lugar_evento':
                $query = $this->_db->prepare("CALL ModificarLugarEvento(?, ?, ?)");
                break;

            case 'ubicacion_asistente':
                $query = $this->_db->prepare("CALL ModificarUbicacionAsistente(?, ?, ?)");
                break;

            case 'cargo':
                $query = $this->_db->prepare("CALL ModificarCargo(?, ?, ?)");
                break;

            case 'perfil':
                $query = $this->_db->prepare("CALL ModificarPerfil(?, ?, ?)");
                break;
            
            case 'presentacion':
                $query = $this->_db->prepare("CALL ModificarPresentacion(?, ?, ?)");
                break;

            default :
                return false;
                break;
        }
        $query->bindParam(1, $this->_id);
        $query->bindParam(2, $this->_nombre);
        $query->bindParam(3, $this->_estado);
        return $query->execute();
    }

    public function configuration_consult($table) {
        $query = $this->_db->prepare("SELECT * FROM " . $table);
        $query->execute();
        return $query->fetchAll();
    }

    public function configuration_consult_active($tabla, $event_id = NULL) {

      $query = $this->_db->prepare('');

      switch ($tabla) {
         case 'caracter_evento':
            $query = $this->_db->prepare("CALL SelectCaracterEvento(?)");
            break;

         case 'caracterizacion_publico_participa':
            $query = $this->_db->prepare("CALL getCPQP(?)");
            break;

         case 'ubicacion_asistente':
            $query = $this->_db->prepare("CALL getUbicacionAsistente(?)");
            break;

         case 'perfil':
            $query = $this->_db->prepare("CALL getPerfil(?)");
            break;

         case 'lugar_evento':
            $query = $this->_db->prepare("CALL SelectLugarEvento(?)");
            break;

         case 'ingreso_evento':
            $query = $this->_db->prepare("CALL SelectIngresoEvento(?)");
            break;

         case 'sistema_control_ingreso_aforo':
            $query = $this->_db->prepare("CALL SelectSistemaControlEvento(?)");
            break;

         case 'tipo_evento':
            $query = $this->_db->prepare("CALL SelectTipoEvento(?)");
            break;

         case 'cargo':
            $query = $this->_db->prepare("CALL getCargos(?)");
            break;

         case 'persona_empresa_involucrada':
            $query = $this->_db->prepare("CALL getPersonasInvolucradas(?)");
            break;

         case 'herramienta':
            $query = $this->_db->prepare("SELECT * FROM " . $tabla . " WHERE estado = 'activado'");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);

         case 'presentacion':
            $query = $this->_db->prepare("SELECT * FROM " . $tabla . " WHERE estado = 'activado'");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);

         default:
            echo "No contrado <br/>";
            break;
      }

      $query->bindParam(1, $event_id);
      $query->execute();
      return $query->fetchAll(PDO::FETCH_ASSOC);
   }

}