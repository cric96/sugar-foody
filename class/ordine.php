<?php
  include_once("product.php")
  class Ordine {
    private $products;
    private $id;
    private $user;
    private $utente;
    private $fattorino;

    public function __construct($id,$products){
      $this->products = $products;
      $this->id = $id
    }

    public function getProducts() {
      return $this->products;
    }

    public function getId() {
      return $this->id;
    }

    public function getUser() {
      return $this->user;
    }

    public function getAdmin() {
      return $this->admin;
    }

    public function getFattorino() {
      return $this->fattorino;
    }
  }

  class AdminPolicy {
    static const see = array(2,3,4,5);
    static const modify = array(2);
    static const notification = array(2,4,5);
  }

  class UtentePolicy {
    static const see = array(1,2,3,4,5);
    static const modify = array(1);
    static const notification = array(2,4,5);
  }

  class FattorinoPolicy {
    static const see = array(3,4,5);
    static const modify = array(3,4);
    static const notification = array(3);
  }
?>
