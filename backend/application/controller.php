<?php

abstract class Controller {//se crea la clase abstracta, y toda clase abstracta debe llevar como minimo un metodo abstracto en este caso la funcion index

    protected $_view; //se crea una variable donde se instanciara la clase view en la variable protected
    protected $_error = array();

    public function __construct() {//se instancia la clase View con la variable protegida view, la cual recibe un objeto de la clase Request        
        $this->_view = new view(new Request());
    }

    abstract public function index(); //esta funcion por ser abstracta debe implementarse en todas las clases que hereden de esta    

    protected function load_model($modelo) {
        $route_model = ROOT . 'model' . DS . $modelo . '.php';

        if (is_readable($route_model)) {
            include_once $route_model;
            return new $modelo;
        }
    }

    protected function load_library($library) {
        $route_model = ROOT . 'lib' . DS . strtolower($library) . DS . $library . '.php';
        if ( is_readable($route_model) ) {
            include_once $route_model;
            return new $library;
        }
    }

    /**
     * valida que el dato exista y que no llege vacio
     * @param  string $campo
     * @param  string $campo2 este dato se utiliza para el caso en que la informacion
     * del metodo POST llege en forma de array como $_POST['example']['foo']
     * @return boolean
     * !empty(trim($_POST[$campo])) de la linea
     * 37 se le quito el trim porque cuando se le manda el array de perfiles se tosta
     */
    
    public function validar_campos_vacios($campo, $campo2 = null) {

        if( !is_null($campo2) && isset($_POST[$campo][$campo2]) && !empty( trim($_POST[$campo][$campo2]) ) ) {
            return true;
        } else if( is_null($campo2) && isset($_POST[$campo]) && !empty($_POST[$campo])){
            return true;
        }
        return false;
    }
    // public function validar_campos_vacios($campo) {

    //     if( isset($_POST[$campo]) && !empty(trim($_POST[$campo]))) {
    //         return true;
    //     }
    //     return false;
    // }


    //Para que la segunda fecha sea mayor o igual a la primera
    public function validar_fecha_mayor_igual($fecha1, $fecha2) {
        if (strtotime($_POST[$fecha2]) >= strtotime($_POST[$fecha1])) {
            return true;
        }
        return false;
    }

    //Para que el primer numero sea mayor al segundo
    public function mayor_menor($numero1, $numero2) {
        $numero1 = (isset($_POST[$numero1])) ? trim($_POST[$numero1]) : NULL;
        $numero2 = (isset($_POST[$numero2])) ? trim($_POST[$numero2]) : NULL;

        if (empty($numero1) == FALSE && empty($numero2) == FALSE) {
            if ($numero1 >= $numero2) {
                return true;
            }
        }
        return false;
    }

    public function validar_hora($fecha_inicial, $fecha_final, $hora_inicial, $hora_final) {
        $fecha_inicial = (isset($_POST[$fecha_inicial])) ? trim($_POST[$fecha_inicial]) : NULL;
        $fecha_final = (isset($_POST[$fecha_final])) ? trim($_POST[$fecha_final]) : NULL;
        $hora_inicial = (isset($_POST[$hora_inicial])) ? trim($_POST[$hora_inicial]) : NULL;
        $hora_final = (isset($_POST[$hora_final])) ? trim($_POST[$hora_final]) : NULL;

        if (empty($fecha_inicial) == FALSE && empty($fecha_final) == FALSE) {
            if (empty($hora_inicial) == FALSE && empty($hora_final) == FALSE) {
                if ($fecha_inicial === $fecha_final) {
                    return (strtotime($hora_final) - strtotime($hora_inicial)) / 3600;
                } else {
                    return TRUE;
                }
            }
        }
        return FALSE;
    }

    //Para validar que las fechas sean mayores a la actual por 7 dias
    public function validar_fecha($fecha) {
        if (isset($_POST[$fecha]) && !empty($_POST[$fecha]) && strtotime($_POST[$fecha]) > strtotime(date('Y-m-d')) + 86400 * 7) {
            return true;
        } else {
            return false;
        }
    }
    
    //Para validar que la segunda fecha sea mayor que la primera
    public function validar_fecha_mayor($fecha1, $fecha2) {
        if (isset($_POST[$fecha1]) && !empty($_POST[$fecha1]) && isset($_POST[$fecha2]) && !empty($_POST[$fecha2]) && strtotime($_POST[$fecha2]) > strtotime($_POST[$fecha1])) {
            return true;
        } else {
            return false;
        }
    }
    
    //Para validar que las fechas sean mayores a la actual por 30 dias
    public function validar_fecha_mes($fecha) {
        if (isset($_POST[$fecha]) && !empty($_POST[$fecha]) && strtotime($_POST[$fecha]) >= strtotime(date('Y-m-d')) + 86400 * 30) {
            return true;
        } else {
            return false;
        }
    }

    //Para validar que las fechas no sean menores a 30 dias de la fecha actual, ni mayores a la actual
    public function validar_fecha_m($fecha) {
        $fecha = trim($_POST[$fecha]);
        if (isset($_POST[$fecha]) && !empty($fecha) && strtotime($_POST[$fecha]) <= strtotime(date('Y-m-d')) && strtotime($_POST[$fecha]) >= strtotime(date('Y-m-d')) - 86400 * 30) {
            return true;
        }
        return false;
    }

//Para validar que el dato mandado si sea un numero y exista
    public function validar_enteros($numero) {
        if (isset($_POST[$numero]) && !empty($_POST[$numero])) {
            $_POST[$numero] = filter_input(INPUT_POST, $numero, FILTER_VALIDATE_INT);
            if (is_int($_POST[$numero]) && $_POST[$numero] > 0) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    public function validar_enteros_otra($valor) {
        if (isset($_POST[$clave]) && !empty($_POST[$clave])) {
            $_POST[$clave] = filter_input(INPUT_POST, $clave, FILTER_VALIDATE_INT);
            if (is_int($_POST[$clave]) && $_POST[$clave] > 0) {
                return $_POST[$clave];
            } else {
                return false;
            }
        }
        return false;
    }

    protected function getAlphaNum($clave) {
        if (isset($_POST[$clave]) && !empty($_POST[$clave])) {
            $_POST[$clave] = (string) preg_replace('/[^A-Z0-9_]/i', '', $_POST[$clave]);
            return trim($_POST[$clave]);
        }
    }

    protected function getSql($clave) {
        if (isset($_POST[$clave]) && !empty($_POST[$clave])) {
            $_POST[$clave] = strip_tags($_POST[$clave]);

            if (!get_magic_quotes_gpc()) {
                $_POST[$clave] = mysql_escape_string($_POST[$clave]);
            }
            return trim($_POST[$clave]);
        }
    }

    public function validar_email($campo, $campo2 = null) {
        $email = null;
        if( is_null($campo2) ) {
            $email = trim( $_POST[$campo] );
        } else {
            $email = trim( $_POST[$campo][$campo2] );
        }
        
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    protected function getTexto($clave) {
        if (isset($_POST[$clave]) && !empty($_POST[$clave])) {
            $_POST[$clave] = htmlspecialchars($_POST[$clave], ENT_QUOTES);
            return $_POST[$clave];
        }
        return '';
    }

//Para validar los enteros 


    protected function filtrarInt($int) {

        $int = (int) $int;

        if (is_int($int)) {
            return $int;
        } else {
            return 0;
        }
    }

//Para validar la edad del formulario del usuario
    public function validar_edad($edad) {
        if ($edad < 18) {
            return false;
        } else {
            return true;
        }
    }

}

