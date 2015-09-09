<?php
// Notificar todos los errores de PHP (ver el registro de cambios)
error_reporting(E_ALL);

// Notificar todos los errores de PHP
error_reporting(-1);

// Lo mismo que error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

session_start();

define('DS', DIRECTORY_SEPARATOR);
//una constante que con la funcion directory separarto obtiene el slas o backelas dependiendo
// el sistema operativo, del servidor donde se encuentre
define('ROOT', __DIR__.DS);
//la funcion file devuelve la ruta del archivo donde se encuentra declarado
//dirname obtiene el nombre del directorio donde se encuentra
//realpath comprueba si es una ruta real del proyecto o que existe
//se crea la constante y se le asigna el la ruta raiz del proyecto concatenando un backeslas
define('APP_PATH', ROOT . 'application' . DS);
//se crea la constante y se le asigna el valor de la constante ROOT mas la palabra application mas la constante de DS

require_once APP_PATH . 'config.php';
require_once APP_PATH . 'request.php';
require_once APP_PATH . 'bootstrap.php';
require_once APP_PATH . 'controller.php';
require_once APP_PATH . 'model.php';
require_once APP_PATH . 'view.php';
require_once APP_PATH . 'database.php';

if( array_key_exists('Id_Usuario', $_SESSION) ){

	try {
	    Bootstrap::run(new Request());
	} catch (Exception $ex) {
	    echo $ex->getMessage();
	}
} else {
	header('Location: http://localhost/sevg/frontend/');
	#header("Location: http://sevg-sena363405.rhcloud.com/frontend");
}
?>
