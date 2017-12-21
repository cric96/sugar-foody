<?php
  class User {
    private $username;
    private $email;
    private $telefono;
    public function __construct($username,$telefono,$email){
      $this->username = $username;
      $this->email = $email;
      $this->telefono = $telefono;
    }

    public function getUsername() {
      return $this->username;
    }

    public function getEmail() {
      return $this->email;
    }

    public function getTelefono(){
      return $this->telefono;
    }
  }

  class Fattorino extends User {
    private $nomeRistorante;

    public function __construct($username,$telefono,$email,$nomeRistorante) {
      parent::__construct($username,$telefono,$email);
      $this->nomeRistorante = $nomeRistorante;
    }

    public function getNomeRistorante() {
      return $this->nomeRistorante;
    }
  }

  class Admin extends Fattorino {
  }
?>
