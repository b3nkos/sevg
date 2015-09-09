<?php

class Perfil_model extends Model {

   public function getPerfiles ($eventId = NULL) {
      $query = $this->_db->prepare("CALL getPerfil_(?)");
      $query->bindParam(1, $eventId, PDO::PARAM_INT);
      $query->execute();
      return $query->fetchAll(PDO::FETCH_ASSOC);
   }

}
