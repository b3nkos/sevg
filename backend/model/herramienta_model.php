<?php

class Herramienta_model extends Model {

    public function __construct() {
        parent::__construct();
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////
    private $_id_herramienta;
    private $_nombre_herramienta;
    private $_codigo_herramienta;
    private $_estado_herramienta;
    /////////////////////////////////////////////////////////////////////////////////////////////////
    private $_parametro_herramienta;

    /////////////////////////////////////////////////////////////////////////////////////////////////

    public function set_id_herramienta($id_herramienta) {
        $this->_id_herramienta = $id_herramienta;
    }

    public function set_nombre_herramienta($nombre_herramienta) {
        $this->_nombre_herramienta = $nombre_herramienta;
    }

    public function set_codigo_herramienta($codigo_herramienta) {
        $this->_codigo_herramienta = $codigo_herramienta;
    }

    public function set_estado_herramienta($estado_herramienta) {
        $this->_estado_herramienta = $estado_herramienta;
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////
    public function set_parametro_herramienta($parametro_herramienta) {
        $this->_parametro_herramienta = $parametro_herramienta;
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////
    
    //Procedimiento para el crud este es el insert
    public function insertar_herramienta_() {
        $query = $this->_db->prepare("CALL InsertarHerramienta_(?, ?, ?)");
        $query->bindParam(1, $this->_nombre_herramienta);
        $query->bindParam(2, $this->_codigo_herramienta);
        $query->bindParam(3, $this->_estado_herramienta);
        $query->execute();
        return true;
    }
    
    //Procedimiento para el crud este es el modificar
    public function modificar_herramienta_() {
        $query = $this->_db->prepare("CALL ModificarHerramienta_(?, ?, ?, ?)");
        $query->bindParam(1, $this->_id_herramienta);
        $query->bindParam(2, $this->_nombre_herramienta);
        $query->bindParam(3, $this->_codigo_herramienta);
        $query->bindParam(4, $this->_estado_herramienta);
        $query->execute();
        return true;
    }
    
    //Procedimiento para el crud este es el consultar
    public function consultar_herramienta_() {
        $query = $this->_db->prepare("CALL ConsultarHerramienta_(?)");
        $query->bindParam(1, $this->_parametro_herramienta);
        $query->execute();
        return $query->fetchAll();
    }	   
	
    //cris
	public function consultar_herramienta($parametro_herramienta = NULL, $eventId = NULL) {
        $query = $this->_db->prepare("CALL ConsultarHerramienta(?, ?)");
        $query->bindParam(1, $parametro_herramienta, PDO::PARAM_STR);
        $query->bindParam(2, $eventId, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>
