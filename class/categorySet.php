<?php
  include_once("DBSet.php");
  //Astrazione della raffigurazione degli ingredienti del db
  class CategorySet extends DBSet{
    private $category;
    public function __construct($con) {
      parent::__construct($con);
      $selectAll = $this->con->prepare("SELECT * FROM `CATEGORIA`");
      $this->category = parent::executeSelectQuery($selectAll);
    }
    public function getCategories() {
      return $this->category;
    }
    protected function createElement($row) {
      return $row;
    }
  }
 ?>
