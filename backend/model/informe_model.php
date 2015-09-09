<?php

class Informe_model extends Model {

    private $_id;
    private $_nombre;
    private $_estado;

    public function __construct() {
        parent::__construct();
    }

    public function mantenimientos_del_mes() {
        $query = $this->_db->prepare("CALL MantenimientosMes()");        
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function m_u_vencer_mes() {
        $query = $this->_db->prepare("CALL MedicaUtensiVencerMes()");        
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function eventos_del_mes() {
        $query = $this->_db->prepare("CALL EventosMes()");        
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function usuarios_activos() {
        $query = $this->_db->prepare("CALL UsuariosActivos()");        
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }    

    public function Persona_empresa_activa() {
        $query = $this->_db->prepare("CALL PersonaEmpresaActiva()");        
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function m_u_active() {
        $query = $this->_db->prepare("CALL MedicamentosUtensiliosActivos()");        
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function herramientas_activas() {
        $query = $this->_db->prepare("CALL HerramientasActivas()");        
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }



}
?>
