<?php
  class Ingredient {
    private $name;
    private $basePrice;
    private $_isAggiunta;
    private $_isObbligatorio;

    public function __construct($name,$basePrice,$isAggiunta,$isObbligatorio) {
      $this->name = $name;
      $this->basePrice = $basePrice;
      $this->_isAggiunta = $isAggiunta;
      $this->_isObbligatorio = $isObbligatorio;
    }

    public static function createBaseIngredient($name,$basePrice) {
      return new static($name,$basePrice,false,false);
    }
    public function getName() {
      return $this->name;
    }

    public function getPrice() {
      return $this->basePrice / 100.0;
    }

    public function obbligatorio() {
      return boolval($this->_isObbligatorio);
    }

    public function aggiunta() {
      return boolval($this->_isAggiunta);
    }
  }
?>
