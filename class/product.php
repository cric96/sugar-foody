<?php
  class Product {
    private const NO_QUANTITY = 0;
    private $id;
    private $name;
    private $desc;
    private $category;
    private $ingredients;
    private $price;
    private $quantity;
    public function __construct($id,$name,$desc,$category,$ingredients,$price,$quantity) {
      $this->id = $id;
      $this->name = $name;
      $this->desc = $desc;
      $this->category = $category;
      $this->ingredients = $ingredients;
      $this->price = $price;
      $this->quantity = $quantity;
    }
    public static function createBaseProduct($id,$name,$desc,$category,$ingredients,$price) {
      return new static($id,$name,$desc,$category,$ingredients,$price,NO_QUANTITY);
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

    public function getQuantity() {
      return $this->quantity;
    }
  }
?>
