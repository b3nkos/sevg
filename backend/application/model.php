<?php

class Model {

    protected $_db;

    public function __construct() {
        $this->_db = new Database();
    }

    public function validar($tabla) {
        $query = $this->_db->prepare("SELECT * FROM " . $tabla . " WHERE Nombre = " . "'" . strtolower(trim($_POST['nombre'])) . "'");
        $query->execute();
        $datos = $query->fetchAll();
        if (isset($datos[0])) {
            return true;
        }

        return false;
    }

    public function validar_id_nombre($tabla) {
        $query = $this->_db->prepare("SELECT * FROM " . $tabla . " WHERE Id = " . trim($_POST['id']) . " AND Nombre = " . "'" . strtolower(trim($_POST['nombre'])) . "'");
        $query->execute();
        $datos = $query->fetchAll();

        if (isset($datos[0])) {
            return true;
        }
        return false;
    }
    
    //Para no repetir informacion en la base de datos cuando se inserta en las tablas que solo llevan CRUD
    public function validar_datos_repetidos($tabla, $campo, $dato) {
        $query = $this->_db->prepare("SELECT * FROM " . $tabla . " WHERE " . $campo . " = " . "'" . strtolower(trim($_POST[$dato])) . "'");
        $query->execute();
        $datos = $query->fetchAll();

        if (isset($datos[0])) {
            return true;
        }
        return false;
    }
    
    //Para validar que no hayan personas repetidas
    public function validar_persona_existe() {
        $query = $this->_db->prepare("SELECT * FROM persona_empresa_involucrada WHERE Id_Personas_Involucradas = " . trim($_POST['id_persona_empresa']) . " AND Nombre = " . "'" . strtolower(trim($_POST['nombre_persona_empresa'])) . "'");
        $query->execute();
        $datos = $query->fetchAll();

        if (isset($datos[0])) {
            return true;
        }
        return false;
    }
    
    //Para validar que no hayan herramientas con codigo repetido
    public function validar_herramienta_existe() {
        $query = $this->_db->prepare("SELECT * FROM herramienta WHERE Id_Herramienta = " . trim($_POST['id_herramienta']) . " AND Codigo = " . "'" . strtolower(trim($_POST['codigo_herramienta'])) . "'");
        $query->execute();
        $datos = $query->fetchAll();

        if (isset($datos[0])) {
            return true;
        }
        return false;
    }

}

