<?php

class Request {

    private $_controlador;
    private $_metodo;
    private $_parametros;

    public function __construct() {

        if (isset($_GET['url'])) {
//se verifica que la variable url no este vacia, en caso de que no entra en la condicion y la filtra            
            $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
//se le envia la manera como va a llegar sea por post o get, despues la variable, y con el sanitize se limpia de caracteres especiales            
            $url = explode('/', $url);
//se recorre la url, y cada vez que encuentre un slas la separa y crea un array            
            $url = array_filter($url);
//recorre el array y lo limpia de los caracteres especiales

            $this->_controlador = strtolower(array_shift($url));
//coje la primera posicion del array, la convierte en minuscula con strlower y la asigna a la variable _controlador
            $this->_metodo = strtolower(array_shift($url));
//coje la primera posicion del array, la convierte en minuscula con strlower y la asigna a la variable _metodo
            $this->_parametros = $url;
//coje lo que queda en el array y lo mete en la variable _parametros            
        }

        if (!$this->_controlador) {
            $this->_controlador = DEFAULT_CONTROLLER;
        }
//en caso de que la url venga vacia asigna el controlador index por defecto el que se creo en el config
        if (!$this->_metodo) {
            $this->_metodo = 'index';
//en caso de que el metodo venga vacio asigna el metod index por defecto
        }

        if (!isset($this->_parametros)) {
            $this->_parametros = array();
//si los parametros no existen le dira a la variable que va a ser de tipo array            
        }
    }

    public function get_controlador() {
        return $this->_controlador;
    }

    public function get_metodo() {
        return $this->_metodo;
    }

    public function get_parametros() {
        return $this->_parametros;
    }

}

?>
