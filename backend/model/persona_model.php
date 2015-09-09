<?php

class Persona_model extends Model {

    public function __construct() {
        parent::__construct();
    }

    private $_id_persona_empresa;
    private $_nombre;
    private $_email;
    private $_direccion;
    private $_celular;
    private $_telefono;
    private $_tipo;
    private $_estado;
    //////////////////////////////////////////////////////////////////////////////////////////
    private $_parametro_persona;

    //////////////////////////////////////////////////////////////////////////////////////////

    public function set_id_persona_empresa($id_persona_empresa) {
        $this->_id_persona_empresa = $id_persona_empresa;
    }

    public function set_nombre($nombre) {
        $this->_nombre = $nombre;
    }

    public function set_email($email) {
        $this->_email = $email;
    }

    public function set_direccion($direccion) {
        $this->_direccion = $direccion;
    }

    public function set_celular($celular) {
        $this->_celular = $celular;
    }

    public function set_telefono($telefono) {
        $this->_telefono = $telefono;
    }

    public function set_tipo($tipo) {
        $this->_tipo = $tipo;
    }

    public function set_estado($estado) {
        $this->_estado = $estado;
    }

    /////////////////////////////////////////////////////////////////////////////////////////////
    public function set_parametro_persona($parametro_persona) {
        $this->_parametro_persona = $parametro_persona;
    }

    /////////////////////////////////////////////////////////////////////////////////////////////

    public function insertar_persona_empresa() {
        $query = $this->_db->prepare("CALL InsertarPersonaEmpresa(?, ?, ?, ?, ?, ?, ?)");
        $query->bindParam(1, $this->_nombre);
        $query->bindParam(2, $this->_email);
        $query->bindParam(3, $this->_direccion);
        $query->bindParam(4, $this->_celular);
        $query->bindParam(5, $this->_telefono);
        $query->bindParam(6, $this->_tipo);
        $query->bindParam(7, $this->_estado);
        $query->execute();
        return true;
    }

    public function modificar_persona_empresa() {
        $query = $this->_db->prepare("CALL ModificarPersonaEmpresa(?, ?, ?, ?, ?, ?, ?, ?)");
        $query->bindParam(1, $this->_id_persona_empresa);
        $query->bindParam(2, $this->_nombre);
        $query->bindParam(3, $this->_email);
        $query->bindParam(4, $this->_direccion);
        $query->bindParam(5, $this->_celular);
        $query->bindParam(6, $this->_telefono);
        $query->bindParam(7, $this->_tipo);
        $query->bindParam(8, $this->_estado);
        $query->execute();
        return true;
    }

    public function consultar_persona() {
        $query = $this->_db->prepare("CALL ConsultarPersonaEmpresa(?)");
        $query->bindParam(1, $this->_parametro_persona);
        $query->execute();
        return $query->fetchAll();
    }

}

?>