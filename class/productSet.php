<?php
  include_once("product.php");
  include_once("ingredientSet.php");

  require_once("DBSet.php");
  //astrazione dei prodotti presenti nel db
  class ProductSet extends DBSet{
    private $stmInsert;
    private $stmSelect;
    private $selectAll;
    private $stmUpdate;
    private $deleteListino;
    private $createListino;
    public function __construct($con) {
      parent::__construct($con);
      $this->stmInsert = $this->con->prepare("INSERT INTO PRODOTTO (`nome`,`descrizione`,`nomeCategoria`) VALUES (?,?,?)");
      $this->stmSelect = $this->con->prepare("SELECT * FROM `PRODOTTO` WHERE id =?");
      $this->selectAll = $this->con->prepare("SELECT P.*
                                              FROM `PRODOTTO` AS P, `LISTINO` as L
                                              WHERE L.nomeRistorante = ?
                                              AND L.idProdotto = P.id ");
      $this->stmUpdate = $this->con->prepare("UPDATE `PRODOTTO` SET `nome`= ?,`descrizione`=?,`nomeCategoria`=? WHERE id=?");
      $this->createListino = $this->con->prepare("INSERT INTO LISTINO (`nomeRistorante`,`idProdotto`,`prezzo`) VALUES(?,?,?)");
      $this->deleteListino = $this->con->prepare("DELETE FROM LISTINO WHERE idProdotto = ? and nomeRistorante=? ");
    }
    //inserisce un prodotto
    public function insertProduct($name,$desc,$cat) {
      $this->stmInsert->bind_param("sss",$name,$desc,$cat);
      return parent::executeBasicQuery($this->stmInsert);
    }
    //inserisce un prodotto e gli ingredienti annessi
    public function insertIngredientInProduct($name,$desc,$cat,$ingredients) {
      if(!$this->insertProduct($name,$desc,$cat)) {
        return false;
      }
      $id = $this->stmInsert->lastInsertId();
      $ingredientSet = new IngredientSet($this->con);
      foreach($ingredietns as $ingredient) {
          if(!$ingredientSet->insertIngredientInProduct($ingredient->getName(),$id,$ingredient->aggiunta,$ingredient->obbligatorio)) {
            return false;
          }
      }
    }
    //aggiorna gli ingredienti di un prodotto
    public function updateIngredientInProduct($id,$ingredients) {
      $ingredientSet = new IngredientSet($this->con);
      foreach($ingredietns as $ingredient) {
          if(!$ingredientSet->updateIngredient($id,$ingredient->getName(),$ingredient->aggiunta,$ingredient->obbligatorio)) {
            return false;
          }
      }
    }
    //aggiorna le informazioni di un prodotto
    public function updateProduct($id,$name,$descrizione,$category) {
      $this->stmUpdate->bind_param("sssi",$name,$descrizione,$category,$id);
      return parent::executeBasicQuery($this->stmUpdate);
    }
    //restituisce un prodotto
    public function getProduct($id) {
      $this->stmSelect->bind_param("i",$id);
      return parent::executeSelectQuery($this->stmSelect);
    }

    public function deleteProductInListino($id,$nomeRistorante) {
      echo $id . " " .$nomeRistorante;
      $this->deleteListino->bind_param("is",$id,$nomeRistorante);
      return parent::executeBasicQuery($this->deleteListino);
    }
    //restituisce il listion di un ristornte
    public function getListino($ristorante) {
      $this->selectAll->bind_param("s",$ristorante);
      return parent::executeSelectQuery($this->selectAll);
    }

    public function createListino($ids,$ristorante) {
      foreach($ids as $id) {
        $price = ($this->getProduct($id)[0])->getPrice();
        $this->createListino->bind_param("sii",$ristorante,$id,$price);
        parent::executeBasicQuery($this->createListino);
      }
    }

    protected function createElement($row) {
      $ingredients = (new IngredientSet($this->con))->getIngredientsOfProduct($row["id"]);
      return new Product($row["id"],$row["nome"],$row["descrizione"],$row["nomeCategoria"],$ingredients);
    }
  }
 ?>
