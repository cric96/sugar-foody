<?php
  include("../secureLogin/secureLogin.php");
  include("../class/ingredientSet.php");
  include("../class/productSet.php");
  include("../config.php");
  if(isset($_POST["create"])){
    $db = new ProductSet($cn);
    $dbIngredienti = new IngredientSet($cn);
    $ingredienti = array();
    $i = 0;
    foreach($_POST["ingredienti"] as $ingrediente) {
      $aggiunta = 0;
      $obbligatorio = 0;
      if($ingrediente["aggiunta"] === "true") {
        $aggiunta = 1;
      }
      if($ingrediente["obbligatorio"] === "true") {
        $obbligatorio = 1;
      }
      $ingredienti[$i] = new Ingredient($ingrediente["name"],$ingrediente["price"],$aggiunta,$obbligatorio);
      $i += 1;
    }
    if($_POST["create"] === "true") {
      if($db->insertIngredientInProduct($_POST["nome"],$_POST["descrizione"],$_POST["categoria"],$ingredienti)){
        echo "ok";
      } else {
        echo "bad";
      }
    } else {
      $db->updateProduct($_POST["id"],$_POST["nome"],$_POST["descrizione"],$_POST["categoria"]);
      if($dbIngredienti->refreshProductIngredients($_POST["id"],$ingredienti)) {
        echo "ok";
      } else {
        echo "bad";
      }
    }
  }
?>
