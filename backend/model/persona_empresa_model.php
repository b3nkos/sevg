<?php

class Persona_empresa_model extends Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getPersonas_empresas($eventId = NULL) {
        $query = $this->_db->prepare("CALL getPersonasInvolucradas(?)");
        $query->bindParam(1, $eventId, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>