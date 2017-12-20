<?php
  include("ingredient.php");
  include_once("DBSet.php");
  //int val to traduce bool into tiny int
  class IngredientSet extends DBSet{

    private $stmInsert;
    private $stmSelect;
    private $stmInsertComp;
    private $stmSelectComp;
    private $stmUpdate;
    private $selectAll;
    public function __construct($con) {
      parent::__construct($con);
      $this->stmInsert = $this->con->prepare("INSERT INTO INGREDIENTE (`nome`, `prezzo`) VALUES (?,?)");
      $this->stmSelect = $this->con->prepare("SELECT * FROM `INGREDIENTE` WHERE nome =?");
      $this->selectAll = $this->con->prepare("SELECT * FROM `INGREDIENTE`");
      $this->stmInsertComp = $con->prepare("INSERT INTO `COMPOSIZIONE` (`nomeIngrediente`,`idProdotto`,`aggiunta`,`obbligatorio`) VALUES(?,?,?,?)");
      $this->stmSelectComp = $con->prepare("SELECT I.nome, I.prezzo, C.aggiunta, C.obbligatorio
                                             FROM `INGREDIENTE` as I , `COMPOSIZIONE` as C
                                             WHERE C.nomeIngrediente = I.nome AND
                                                   C.idProdotto = ?");

      $this->stmUpdate = $con->prepare("UPDATE COMPOSIZIONE
                                        SET `aggiunta`=?,`obbligatorio`=?
                                        WHERE idProdotto = ? AND nomeIngrediente = ?");
    }
    //serve per inserire una determinata notifica destinata ad un certo utente
    public function insertIngredient($name,$price) {
      $this->stmInsert->bind_param("si",$name,$price);
      return parent::executeBasicQuery($this->stmInsert);
    }
    public function insertIngredientInProduct($name,$idProdotto,$aggiunta,$obbligatorio) {

      $this->stmInsertComp->bind_param("siii",$name,$idProdotto,intval($aggiunta),intval($obbligatorio));
      return parent::executeBasicQuery($this->stmInsertComp);
    }
    public function getIngredient($name) {
      $this->stmSelect->bind_param("s",$name);
      return $this->executeSelectQuery($this->stmSelect);
    }

    public function getAllIngredients() {
      return $this->executeSelectQuery($this->selectAll);
    }

    public function getIngredientsOfProduct($idProdotto) {
      $this->stmSelectComp->bind_param("i",$idProdotto);
      return $this->executeSelectQuery($this->stmSelectComp);
    }

    public function updateIngredient($idProdotto,$name,$aggiunta,$obbligatorio) {
      $this->stmUpdate->bind_param("iiis",intval($aggiunta),intval($obbligatorio),$idProdotto,$name);
      return parent::executeBasicQuery($this->stmUpdate);
    }

    private function executeSelectQuery($stm) {
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
          if(isset($row_data["aggiunta"])) {
            $res[$index] = new Ingredient($row_data["nome"],$row_data["prezzo"],$row_data["aggiunta"],$row_data["obbligatorio"]);
          } else {
            $res[$index] = Ingredient::createBaseIngredient($row_data["nome"],$row_data["prezzo"]);
            $index = $index + 1;
          }
        }
      }
      return $res;
    }
  }
 ?>
