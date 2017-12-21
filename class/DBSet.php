<?php
  //classe root di tutte le astrazioni del db
  abstract class DBSet {
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
    //TEMPLATE METHOD
    protected final function executeSelectQuery($stm) {
      if(!$stm->execute()){
        return false;
      }
      $query = $stm->get_result();
      if($query === FALSE) {
        return false;
      }
      $res = array();
      $index = 0;
      if ($query->num_rows>0) {
        while($row_data = $query->fetch_assoc()) {
          $res[$index] = $this->createElement($row_data);
          $index = $index + 1;
        }
      }
      return $res;
    }
    //Crea un elemento da restituire data una riga della query
    protected abstract function createElement($row);
  }
?>
