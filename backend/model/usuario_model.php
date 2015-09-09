<?php

class Usuario_model extends Model {

    private $_id_usuario;
    ///////////////////////////////////////////////////////////////////////////    
    private $_email;
    private $_tipo_cuenta;
    private $_estado_cuenta;
    ////////////////////////////////////////////////////////////////////////////    
    private $_identificacion;
    private $_nombres;
    private $_apellidos;
    private $_direccion;
    private $_telefono;
    private $_celular;
    private $_barrio;
    ////////////////////////////////////////////////////////////////////////////
    private $_perfiles;
    ////////////////////////////////////////////////////////////////////////////
    private $_parametro1;

    ////////////////////////////////////////////////////////////////////////////
    public function set_id_usuario($id_usuario) {
        $this->_id_usuario = $id_usuario;
    }

    ////////////////////////////////////////////////////////////////////////////

    public function set_email($email) {
        $this->_email = strtolower(trim($email));
    }

    public function set_tipo_cuenta($tipo_cuenta) {
        $this->_tipo_cuenta = strtolower(trim($tipo_cuenta));
    }

    public function set_estado_cuenta($estado_cuenta) {
        $this->_estado_cuenta = strtolower(trim($estado_cuenta));
    }

    ////////////////////////////////////////////////////////////////////////////   
    public function set_identificacion($identificacion) {
        $this->_identificacion = $identificacion;
    }

    public function set_nombres($nombres) {
        $this->_nombres = strtolower(trim($nombres));
    }

    public function set_apellidos($apellidos) {
        $this->_apellidos = strtolower(trim($apellidos));
    }

    public function set_direccion($direccion) {
        $this->_direccion = strtolower(trim($direccion));
    }

    public function set_telefono($telefono) {
        $this->_telefono = trim($telefono);
    }

    public function set_celular($celular) {
        $this->_celular = trim($celular);
    }

    public function set_barrio($barrio) {
        $this->_barrio = strtolower(trim($barrio));
    }

    ////////////////////////////////////////////////////////////////////////////
    public function set_perfiles($perfiles) {
        $this->_perfiles = $perfiles;
    }

    ////////////////////////////////////////////////////////////////////////////
    public function set_parametro1($parametro1) {
        $this->_parametro1 = $parametro1;
    }

    ////////////////////////////////////////////////////////////////////////////

    public function __construct() {
        parent::__construct();
    }

    //Funciones para validar
    public function validar_identificacion($identificacion) {

        $identificacion = trim($_POST[$identificacion]);
        $query = $this->_db->prepare("SELECT * FROM usuario where identificacion = " . "'" . $identificacion . "'");
        $query->execute();
        $datos = $query->fetchAll();

        if( isset($datos[0]) && $datos[0]['Identificacion'] === $identificacion )
            return TRUE;
        elseif( isset($datos[0]) )
            return FALSE;
        return TRUE;
    }

    public function insertar_usuario() {
        $query = $this->_db->prepare("CALL InsertarCuentaAndUsuario(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $query->bindParam(1, $this->_email);
        $query->bindParam(2, $this->_tipo_cuenta);
        $query->bindParam(3, $this->_estado_cuenta);

        $query->bindParam(4, $this->_identificacion);
        $query->bindParam(5, $this->_nombres);
        $query->bindParam(6, $this->_apellidos);
        $query->bindParam(7, $this->_direccion);
        $query->bindParam(8, $this->_telefono);
        $query->bindParam(9, $this->_celular);
        $query->bindParam(10, $this->_barrio);

        $query->execute();

        $sql = $this->_db->prepare("SELECT MAX(Id_Usuario) as id FROM usuario");
        $sql->execute();
        $last_user_id = $sql->fetch();

        $pdo = $this->_db->prepare("INSERT INTO detalle_usuario_perfil(Id_Usuario, Id_Perfil) VALUES(?, ?)");
        foreach ($this->_perfiles as $key => $value) {
            $pdo->execute(array($last_user_id['id'], $value));
        }

        return true;
    }

    public function modificar_usuario() {
        $query = $this->_db->prepare("CALL ModificarUsuarios(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $query->bindParam(1, $this->_id_usuario);
        $query->bindParam(2, $this->_email);
        $query->bindParam(3, $this->_tipo_cuenta);
        $query->bindParam(4, $this->_estado_cuenta);

        $query->bindParam(5, $this->_identificacion);
        $query->bindParam(6, $this->_nombres);
        $query->bindParam(7, $this->_apellidos);
        $query->bindParam(8, $this->_direccion);
        $query->bindParam(9, $this->_telefono);
        $query->bindParam(10, $this->_celular);
        $query->bindParam(11, $this->_barrio);

        $sql = $this->_db->prepare("DELETE FROM detalle_usuario_perfil WHERE Id_Usuario = " . $this->_id_usuario);
        $sql->execute();

        $pdo = $this->_db->prepare("INSERT INTO detalle_usuario_perfil(Id_Usuario, Id_Perfil) VALUES(?, ?)");
        foreach ($this->_perfiles as $key => $value) {
            $pdo->execute(array($this->_id_usuario, $value));
        }

        $query->execute();

        return true;
    }

    public function consultar_usuario($parameter = NULL, $eventId = NULL) {
        $query = $this->_db->prepare("CALL ConsultarUsuario(?, ?)");
        $query->bindParam(1, $parameter);
        $query->bindParam(2, $eventId);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_perfiles_usuario ($user_id) {
        $query = $this->_db->prepare("CALL getPerfilesUser(?)");
        $query->bindParam(1, $user_id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function reset_password($userId) {
        $sql = "SELECT usuario.Id_Cuenta_Usuario, usuario.Identificacion FROM usuario JOIN cuenta_usuario";
        $sql .= " ON cuenta_usuario.Id_Cuenta_Usuario = usuario.Id_Cuenta_Usuario";
        $sql .= " WHERE usuario.Id_Usuario = ?";

        $query = $this->_db->prepare($sql);
        $query->bindParam(1, $userId, PDO::PARAM_INT);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);

        $query = $this->_db->prepare("UPDATE cuenta_usuario SET Password = ? WHERE Id_Cuenta_Usuario = ?");
        $query->bindParam(1, $data[0]['Identificacion'], PDO::PARAM_STR);
        $query->bindParam(2, $data[0]['Id_Cuenta_Usuario'], PDO::PARAM_INT);
        return $query->execute();
    }

    public function profile($userId) {
        $sql = 'select usuario.Id_Usuario,cuenta_usuario.Id_Cuenta_Usuario,';
        $sql.= 'usuario.Identificacion,usuario.Nombres,usuario.Apellidos,';
        $sql.= 'usuario.Direccion,cuenta_usuario.Email,usuario.Telefono,usuario.Celular,usuario.Barrio';
        $sql.= ' from usuario';
        $sql.= ' join cuenta_usuario on usuario.Id_Cuenta_Usuario = cuenta_usuario.Id_Cuenta_Usuario';
        $sql.= ' where usuario.Id_Usuario = ?';

        $query = $this->_db->prepare($sql);
        $query->bindParam(1, $userId, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function update_profile($userId, $data) {
        $sql = 'update usuario set Identificacion = ?, Nombres = ?, Apellidos = ?, Direccion = ?,';
        $sql.= 'Telefono = ?, Celular = ?, Barrio = ? where Id_Usuario = ?';

        // echo "<pre>";
        // print_r($data);
        // exit();

        $query = $this->_db->prepare($sql);
        $query->bindParam(1, $data['identificacion'], PDO::PARAM_STR);
        $query->bindParam(2, $data['nombre'], PDO::PARAM_STR);
        $query->bindParam(3, $data['apellido'], PDO::PARAM_STR);
        $query->bindParam(4, $data['direccion'], PDO::PARAM_STR);
        $query->bindParam(5, $data['telefono'], PDO::PARAM_STR);
        $query->bindParam(6, $data['celular'], PDO::PARAM_STR);
        $query->bindParam(7, $data['barrio'], PDO::PARAM_STR);
        $query->bindParam(8, $userId, PDO::PARAM_INT);
        $query->execute();

        if( trim( $data['password'] ) == "" ) {
            $sql = 'update cuenta_usuario set Email = ? where Id_Cuenta_Usuario = ?';
            $query = $this->_db->prepare($sql);
            $query->bindParam(1, $data['email'], PDO::PARAM_STR);
            $query->bindParam(2, $data['Id_Cuenta_Usuario'], PDO::PARAM_INT);
        } else {
            $sql = 'update cuenta_usuario set Email = ?, Password = ? where Id_Cuenta_Usuario = ?';
            $query = $this->_db->prepare($sql);
            $query->bindParam(1, $data['email'], PDO::PARAM_STR);
            $query->bindParam(2, $data['password'], PDO::PARAM_STR);
            $query->bindParam(3, $data['Id_Cuenta_Usuario'], PDO::PARAM_INT);
        }

        return $query->execute();
    }

}

?>
