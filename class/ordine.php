<?php
  include_once("product.php");
  class Ordine {
    private $products;
    private $id;
    private $user;
    private $admin;
    private $fattorino;
    private $status;
    private $place;
    private $date;
    public function __construct($id,$user,$admin,$status,$place,$date,$products){
      $this->products = $products;
      $this->id = $id;
      $this->user = $user;
      $this->admin = $admin;
      $this->status = $status;
      $this->place = $place;
      $this->date = $date;
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

    public function getStatus() {
      return $this->status;
    }

    public function getLocation() {
      return $this->place;
    }

    public function getDate() {
      return $this->date;
    }
  }

  class AdminPolicy {
    const see = array(2,3,4,5);
    const modify = array(2);
    const notification = array(2,4,5);
  }

  class UtentePolicy {
    const see = array(1,2,3,4,5);
    const modify = array(1);
    const notification = array(2,4,5);
  }

  class FattorinoPolicy {
    const see = array(3,4,5);
    const modify = array(3,4);
    const notification = array(3);
  }
?>
