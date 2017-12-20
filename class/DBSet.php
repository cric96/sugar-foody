<?php
  class DBSet {
    protected $con;
    /*
      NB! tutte le query dovranno seguire la politica definita sotto!
    */
    public function __construct($con) {
      $this->con = $con;
    }
    /*
      La query restituisce false se c'è stato un errore di connessione
      il numero di righe modificate se la query è stata eseguita
      se il numero di righe == 0 allora vuol dire che non ci sono stati cambiamenti
      del db
    */
    protected final function executeBasicQuery($stm) {
      if(!$stm->execute()) {
        return false;
      } else {
        return $stm->affected_rows;
      }
    }
  }
?>
