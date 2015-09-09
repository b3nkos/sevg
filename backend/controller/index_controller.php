<?php

class Index_controller extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->_view->tittle = "SYSTEM SEVG"; //crea esta variable sin tener que instanciarla
        $this->_view->renderizar('index'); //llama a la vista porque el padre ya lo deja
    }

}

?>
