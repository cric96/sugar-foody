<?php
  include_once("product.php");
  include_once("ingredientSet.php");
  include_once("statusSet.php");
  require_once("DBSet.php");
  //astrazione dei prodotti presenti nel db
  class ProductSet extends DBSet{
    private $stmInsert;
    private $stmSelect;
    private $selectAll;
    private $stmUpdate;
    private $stmSelectOrder;
    private $deleteListino;
    private $createListino;
    private $stmSelectAll;
    public function __construct($con) {
      parent::__construct($con);
      $this->stmInsert = $this->con->prepare("INSERT INTO PRODOTTO (`nome`,`descrizione`,`nomeCategoria`) VALUES (?,?,?)");
      $this->stmSelect = $this->con->prepare("SELECT * FROM `PRODOTTO` WHERE id =?");
      $this->selectAll = $this->con->prepare("SELECT P.*, L.prezzo
                                              FROM `PRODOTTO` AS P, `LISTINO` as L
                                              WHERE L.nomeRistorante = ?
                                              AND L.idProdotto = P.id ");
      $this->stmUpdate = $this->con->prepare("UPDATE `PRODOTTO` SET `nome`= ?,`descrizione`=?,`nomeCategoria`=? WHERE id=?");
      $this->createListino = $this->con->prepare("INSERT INTO LISTINO (`nomeRistorante`,`idProdotto`,`prezzo`) VALUES(?,?,?)");
      $this->deleteListino = $this->con->prepare("DELETE FROM LISTINO WHERE idProdotto = ? and nomeRistorante=? ");
      $this->stmSelectOrder = $this->con->prepare("SELECT P.id,P.nome,P.descrizione,P.nomeCategoria,D.prezzo,D.quantita
                                                   FROM PRODOTTO as P, DETTAGLIO as D
                                                   WHERE D.numeroOrdine = ?
                                                   AND P.id = D.idProdotto");
      $this->stmSelectInListino = $this->con->prepare("SELECT L.prezzo,P.id, P.nome,P.descrizione,P.nomeCategoria
                                                       FROM PRODOTTO as P , LISTINO as L
                                                       WHERE L.idProdotto = P.id
                                                       AND L.nomeRistorante=?
                                                       AND P.id = ?");
      $this->stmSelectAll = $this->con->prepare("SELECT * FROM PRODOTTO");

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

    public function getProductInOrder($order) {
      $this->stmSelectOrder->bind_param("i",$order);
      return parent::executeSelectQuery($this->stmSelectOrder);
    }
    public function deleteProductInListino($id,$nomeRistorante) {
      $this->deleteListino->bind_param("is",$id,$nomeRistorante);
      return parent::executeBasicQuery($this->deleteListino);
    }
    //restituisce il listion di un ristornte
    public function getListino($ristorante) {
      $this->selectAll->bind_param("s",$ristorante);
      return parent::executeSelectQuery($this->selectAll);
    }
    public function createListino($products,$ristorante) {
      foreach($products as $product) {
        $this->addInListino($product,$ristorante);
      }
    }

    public function addInListino($product,$price,$ristorante) {
      $this->createListino->bind_param("sii",$ristorante,$product,$price);
      return parent::executeBasicQuery($this->createListino);

    }
    public function getProductInListino($ristorante,$id) {
      $this->stmSelectInListino->bind_param("si",$ristorante,$id);
      return parent::executeSelectQuery($this->stmSelectInListino);
    }
    public function getAllProducts() {
      return parent::executeSelectQuery($this->stmSelectAll);
    }
    protected function createElement($row) {
      $price = 0;
      if(isset($row["prezzo"])) {
        $price= $row["prezzo"] / 100;
      }
      $ingredients = (new IngredientSet($this->con))->getIngredientsOfProduct($row["id"]);
      if(isset($row["quantita"])) {
        return new Product($row["id"],$row["nome"],$row["descrizione"],$row["nomeCategoria"],$ingredients,$price, $row["quantita"]);
      } else {
        return Product::createBaseProduct($row["id"],$row["nome"],$row["descrizione"],$row["nomeCategoria"],$ingredients,$price);
      }
    }
  }
 ?>
