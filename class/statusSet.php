<?php
  include_once("DBSet.php");
  //Astrazione della raffigurazione degli ingredienti del db
  class StatusSet extends DBSet{
    private $statuses;
    public function __construct($con) {
      parent::__construct($con);
      $stm = $con->prepare("SELECT * FROM STATO");
      $this->statuses = parent::executeSelectQuery($stm);
    }
    public function getStatuses() {
      $res = array();
      foreach($this->statuses as $status) {
        $res[$status["nome"]] = $status["valore"];
      }
      return asort($res);
    }
    protected function createElement($row) {
      return $row;
    }
  }
 ?>
