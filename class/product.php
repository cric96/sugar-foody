<?php
  class Product {
    private $id;
    private $name;
    private $desc;
    private $category;
    private $ingredients;
    public function __construct($id,$name,$desc,$category,$ingredients) {
      $this->id = $id;
      $this->name = $name;
      $this->desc = $desc;
      $this->category = $this->category;
      $this->ingredients = $ingredients;
    }

    public function getId() {
      return $this->id;
    }

    public function getName() {
      return $this->name;
    }

    public function getDescription() {
      return $this->desc;
    }

    public function getCategory() {
      return $this->category;
    }

    public function getIngredients() {
      return $this->ingredients;
    }

    public function getPrice() {
      $prezzo = 0;
      foreach($this->ingredients as $ingredient) {
        if(!$ingredient->aggiunta()) {
          $prezzo += $ingredient->getPrice();
        }
      }
      return $prezzo;
    }
  }
?>
