<?php
  include_once("DBSet.php");
  //Astrazione della raffigurazione degli ingredienti del db
  class OrdineSet extends DBSet{
    private $statuses;
    public function __construct($con) {
      parent::__construct($con);
      $stm = $con->prepare("SELECT * FROM STATO");
      $statuses = parent::executeSelectQuery($stm);
    }
    public function getStatuses() {
      return $this->statuses;
    }
    protected function createElement($row) {
      return $row;
    }
  }
 ?>
