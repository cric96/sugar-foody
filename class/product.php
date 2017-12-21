<?php
  class Product {
    private $id;
    private $name;
    private $desc;
    private $category;
    private $ingredients;
    private $price;
    public function __construct($id,$name,$desc,$category,$ingredients,$price) {
      $this->id = $id;
      $this->name = $name;
      $this->desc = $desc;
      $this->category = $this->category;
      $this->ingredients = $ingredients;
      $this->price = $price;
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
      return $this->price;
    }
  }
?>
