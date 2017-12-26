<?php
  include_once("ingredient.php");
  include_once("DBSet.php");
  //Astrazione della raffigurazione degli ingredienti del db
  class IngredientSet extends DBSet{

    private $stmInsert;
    private $stmSelect;
    private $stmInsertComp;
    private $stmSelectComp;
    private $stmUpdate;
    private $selectAll;
    private $deleteAllComp;
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
      $this->deleteAllComp = $con->prepare("DELETE FROM COMPOSIZIONE WHERE idProdotto=?");
      $this->stmUpdate = $con->prepare("UPDATE COMPOSIZIONE
                                        SET `aggiunta`=?,`obbligatorio`=?
                                        WHERE idProdotto = ? AND nomeIngrediente = ?");
    }
    //inserisci un ingrediente nel db
    public function insertIngredient($name,$price) {
      $this->stmInsert->bind_param("si",$name,$price);
      return parent::executeBasicQuery($this->stmInsert);
    }
    //associa un prodotto ad un ingrediente
    public function insertIngredientInProduct($name,$idProdotto,$aggiunta,$obbligatorio) {
      $this->stmInsertComp->bind_param("siii",$name,$idProdotto,intval($aggiunta),intval($obbligatorio));
      return parent::executeBasicQuery($this->stmInsertComp);
    }
    //resistuisce un determinato ingrediente
    public function getIngredient($name) {
      $this->stmSelect->bind_param("s",$name);
      return parent::executeSelectQuery($this->stmSelect);
    }
    //restituisce tutti gli ingredienti
    public function getAllIngredients() {
      return parent::executeSelectQuery($this->selectAll);
    }
    //restituisce gli ingredienti associati ad un prodotto
    public function getIngredientsOfProduct($idProdotto) {
      $this->stmSelectComp->bind_param("i",$idProdotto);
      return parent::executeSelectQuery($this->stmSelectComp);
    }
    //aggiorna gli ingredienti di un prodotto
    public function updateIngredient($idProdotto,$name,$aggiunta,$obbligatorio) {
      $this->stmUpdate->bind_param("iiis",intval($aggiunta),intval($obbligatorio),$idProdotto,$name);
      return parent::executeBasicQuery($this->stmUpdate);
    }

    public function refreshProductIngredients($idProdotto,$ingredients) {
      $this->deleteAllComp->bind_param("i",$idProdotto);
      if(parent::executeBasicQuery($this->deleteAllComp) !== false) {
        foreach($ingredients as $ingredient) {
          $this->insertIngredientInProduct($ingredient->getName(),$idProdotto,$ingredient->aggiunta(),$ingredient->obbligatorio());
        }
      } else {
        return false;
      }
      return true;
    }
    protected function createElement($row) {
      if(isset($row["aggiunta"])) {
        return new Ingredient($row["nome"],$row["prezzo"],$row["aggiunta"],$row["obbligatorio"]);
      } else {
        return Ingredient::createBaseIngredient($row["nome"],$row["prezzo"]);
      }
    }
  }
 ?>
