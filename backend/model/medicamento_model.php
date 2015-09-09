<?php

class Medicamento_model extends Model {

    public function __construct() {
        parent::__construct();
    }

    ////////////////////////////////////////////////////////////////////////////
    private $_id_presentacion;
    private $_id_medicamento;
    private $_nombre;
    private $_lote;
    private $_fecha_vencimiento;
    private $_cantidad;
    private $_stock;
    private $_estado;
    ////////////////////////////////////////////////////////////////////////////
    private $_parametro_medicamento;

    ////////////////////////////////////////////////////////////////////////////

    public function set_id_presentacion($id_presentacion) {
        $this->_id_presentacion = $id_presentacion;
    }

    public function set_id_medicamento($id_medicamento) {
        $this->_id_medicamento = $id_medicamento;
    }

    public function set_nombre($nombre) {
        $this->_nombre = $nombre;
    }

    public function set_lote($lote) {
        $this->_lote = $lote;
    }

    public function set_fecha_vencimiento($fecha_vencimiento) {
        $this->_fecha_vencimiento = $fecha_vencimiento;
    }

    public function set_cantidad($cantidad) {
        $this->_cantidad = $cantidad;
    }

    public function set_stock($stock) {
        $this->_cantidad = $stock;
    }

    public function set_estado($estado) {
        $this->_estado = $estado;
    }

    ////////////////////////////////////////////////////////////////////////////
    public function set_parametro_medicamento($parametro_medicamento) {
        $this->_parametro_medicamento = $parametro_medicamento;
    }

    ////////////////////////////////////////////////////////////////////////////

    public function insertar_medicamento() {
        $query = $this->_db->prepare("CALL InsertarMedicamento(?, ?, ?, ?, ?, ?)");
        $query->bindParam(1, $this->_id_presentacion);
        $query->bindParam(2, $this->_nombre);
        $query->bindParam(3, $this->_lote);
        $query->bindParam(4, $this->_fecha_vencimiento);
        $query->bindParam(5, $this->_cantidad);
        $query->bindParam(6, $this->_estado);
        $query->execute();
        return true;
    }

    public function modificar_medicamento() {
        $query = $this->_db->prepare("CALL ModificarMedicamento(?, ?, ?, ?, ?, ?, ?)");
        $query->bindParam(1, $this->_id_medicamento);
        $query->bindParam(2, $this->_id_presentacion);
        $query->bindParam(3, $this->_nombre);
        $query->bindParam(4, $this->_lote);
        $query->bindParam(5, $this->_fecha_vencimiento);
        $query->bindParam(6, $this->_cantidad);
        $query->bindParam(7, $this->_estado);
        $query->execute();
        return true;
    }

    public function consultar_medicamento_() {
        $query = $this->_db->prepare("CALL ConsultarMedicamento(?)");
        $query->bindParam(1, $this->_parametro_medicamento);
        $query->execute();
        return $query->fetchAll();
    }

//////////////////////estos son las funciones cris
    public function consultar_medicamento($parametro_medicamento, $event_id = NULL) {
        $query = $this->_db->prepare("CALL ConsultarMedicamentoUtensilio(?, ?)");
        $query->bindParam(1, $parametro_medicamento, PDO::PARAM_STR);
        $query->bindParam(2, $event_id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAmounts($ids) {
        $sql  = "SELECT Id_Medicamento, Nombre, Cantidad FROM medicamento_utensilio";
        $sql .= " WHERE Id_Medicamento IN ($ids);";

        $query = $this->_db->prepare($sql);
        $query->execute();
        $result = $query->fetchALL(PDO::FETCH_ASSOC);
        return $result;
    }

}

?>
