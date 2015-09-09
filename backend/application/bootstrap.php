<?php

class Bootstrap {

    public static function run(Request $peticion) {
        $controller = $peticion->get_controlador() . '_controller';
//se obtiene el nombre del controlador por medio del get de la clase request, y se concatena con _controller         
        $rutaControlador = ROOT . 'controller' . DS . $controller . '.php';
//se concatena con la ruta raiz creada en el index, se concatena con la palabra "controller" mas un slas "DS" mas la terminacion ".php"        
        $metodo = $peticion->get_metodo();
//obtiene el metodo con el get del request instanciado con $peticion        
        $parametros = $peticion->get_parametros();
//obtiene los parametros con el get del request instanciado con $peticion

        if (is_readable($rutaControlador)) {
            require_once $rutaControlador;
//si el fichero existe y es legible entra en la condicion y crea el require once con $ruta controlador
            $controller = new $controller;
//crea la instancia con el "controller" porque los controladores y las clases se llaman igual
            if (is_callable(array($controller, $metodo))) {
//verifica que un array contenga un objeto, en este caso seria $controller que adentro tiene la instancia
//y la variable metodo contiene la funcion que se puede ejecutar, si es verdadero se ejecuta el codigo 
                $metodo = $peticion->get_metodo();
//se le asigna a la variable metodo el metodo obtenido con el get de la instancia de request                
            } else {
                $metodo = 'index';
//si no se le asigna el index por defecto                
            }

            if (isset($parametros)) {
                call_user_func_array(array($controller, $metodo), $parametros);
//si los parametros existen se los asigna al metodo por medio de la funcion de call_user_func_array que recibe un array con el objeto y la funcion
// y otro array con los parametros necesarios para esa funcion                
            } else {
                call_user_func(array($controller, $metodo));
//si no ejecuta solo el controlador y la funcion a llamar
            }
        } else {
            throw new Exception('No encontrado');
//si la ruta no existe creara un objeto con la excepcion y arrojara un mensaje
//el cual se obtiene con el try cath de la clase index cuando se llama y se visualiza el mensaje con get message            
        }
    }

}

?>

