<?php

class View {

    private $_controller;

    public function __construct(Request $request) {
        $this->_controller = $request->get_controlador();
    }

    public function renderizar($vista, $item = FALSE) {
        $route_view = ROOT . 'view' . DS . $this->_controller . DS . $vista . '.php';

        include_once ROOT . 'view' . DS . 'header.php';
        
        if (is_readable($route_view)) {

            include_once $route_view;
        } else {
            throw new Exception('Vista no encontrada');
        }
        
        include_once ROOT . 'view' . DS . 'footer.php';
    }

}
