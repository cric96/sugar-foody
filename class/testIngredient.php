<?php
  include("ingredientSet.php");
  include_once("ingredient.php");
  include_once("../config.php");

  var_dump((new IngredientSet($cn))->updateIngredient(1,"pizza",0,1));
?>
