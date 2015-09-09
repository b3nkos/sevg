<?php

class Mantenimiento_model extends Model {

    public function __construct() {
        parent::__construct();
    }

    /////////////////////////////////////////////////////////////////////////////////////
    private $_id_mantenimiento;
    private $_id_herramienta;
    private $_fecha_mantenimiento;
    private $_proximo_mantenimiento;
    private $_detalle;
    /////////////////////////////////////////////////////////////////////////////////////
    private $_parametro_mantenimiento;

    /////////////////////////////////////////////////////////////////////////////////////

    public function set_id_mantenimiento($id_mantenimiento) {
        $this->_id_mantenimiento = $id_mantenimiento;
    }

    public function set_id_herramienta($id_herramienta) {
        $this->_id_herramienta = $id_herramienta;
    }

    public function set_fecha_mantenimiento($fecha_mantenimiento) {
        $this->_fecha_mantenimiento = $fecha_mantenimiento;
    }

    public function set_proximo_mantenimiento($proximo_mantenimiento) {
        $this->_proximo_mantenimiento = $proximo_mantenimiento;
    }

    public function set_detalle($detalle) {
        $this->_detalle = $detalle;
    }

    ////////////////////////////////////////////////////////////////////////////////////////
    public function set_parametro_mantenimiento($mantenimiento) {
        $this->_parametro_mantenimiento = $mantenimiento;
    }

    ////////////////////////////////////////////////////////////////////////////////////////

    public function insertar_mantenimiento() {
        $query = $this->_db->prepare("CALL InsertarMantenimiento(?, ?, ?, ?)");
        $query->bindParam(1, $this->_id_herramienta);
        $query->bindParam(2, $this->_fecha_mantenimiento);
        $query->bindParam(3, $this->_proximo_mantenimiento);
        $query->bindParam(4, $this->_detalle);
        $query->execute();
        return true;
    }

    public function modificar_mantenimiento() {
        $query = $this->_db->prepare("CALL ModificarMantenimiento(?, ?, ?, ?, ?)");
        $query->bindParam(1, $this->_id_mantenimiento);
        $query->bindParam(2, $this->_id_herramienta);
        $query->bindParam(3, $this->_fecha_mantenimiento);
        $query->bindParam(4, $this->_proximo_mantenimiento);
        $query->bindParam(5, $this->_detalle);
        $query->execute();
        return true;
    }

    public function consultar_mantenimiento() {
        $query = $this->_db->prepare("CALL ConsultarMantenimiento(?)");
        $query->bindParam(1, $this->_parametro_mantenimiento);
        $query->execute();
        return $query->fetchAll();
    }

}
?>