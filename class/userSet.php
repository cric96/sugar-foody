<?php
  include_once("user.php");
  include_once("DBSet.php");
  //Astrazione della raffigurazione degli ingredienti del db
  class UserSet extends DBSet{

    private $stmInsert;
    private $stmSelectUser;
    private $stmInsertUser;
    private $stmSelectComp;
    private $stmSelectFattorini;
    private $stmUpdate;
    private $selectAll;
    public function __construct($con) {
      parent::__construct($con);
      $this->stmInsertFattorini = $this->con->prepare("INSERT INTO `utente` (telefono, password, email, username, admin, nomeRistorante, salt)
                                              VALUES (?, ?, ?, ?, ?, ?, ?)");
      $this->stmInsertUser = $this->con->prepare("INSERT INTO `utente` (telefono, password, email, username, salt)
                                              VALUES (?, ?, ?, ?, ?)");
      $this->stmSelectUser = $this->con->prepare("SELECT * FROM `UTENTE` WHERE username = ?");
      $this->selectEmail = $this->con->prepare("SELECT * FROM UTENTE WHERE email= ?");
      $this->stmSelectFattorini = $this->con->prepare("SELECT * FROM UTENTE WHERE nomeRistorante=? and admin = 0");
      $this->stmDeleteUser = $this->con->prepare("DELETE FROM UTENTE WHERE username=?");
    }
    //inserisci un utente nel db, se restituisce false vuol dire che l'username o l'email erano già presenti
    public function insertUtente($telefono,$password,$email,$username) {
      if(checkPresence($email,$username)) {
        return false;
      }
      $psw = encryptPsw($password);
      $this->stmInsertUser->bind_param("isssiss",$telefono,$psw[1],$email,$username,$psw[0]);
      return parent::executeBasicQuery($this->stmInsertUser);
    }

    //inserisci un fattorino nel db
    public function insertFattorino($telefono,$password,$email,$username,$nomeRistorante) {
      if(checkPresence($email,$username)) {
        return false;
      }
      $psw = encryptPsw($password);
      $this->stmInsertFattorini->bind_param("isssiss",$telefono,$psw[1],$email,$username,0,$nomeRistorante,$psw[0]);
      return parent::executeBasicQuery($this->stmInsert);
    }

    //restituisici i fattorini di un ristorante
    public function getFattorini($nomeRistorante) {
      $this->stmSelectFattorini->bind_param("s",$nomeRistorante);
      return parent::executeSelectQuery($this->stmSelectFattorini);
    }

    public function removeUser($username) {
      $this->stmDeleteUser->bind_param("s",$username);
      return parent::executeBasicQuery($this->stmDeleteUser);
    }
    private function checkPresence($username,$email) {
      if(count($this->getPresent($usermane))!= 0 || count($this->getEmailPresent($email)) != 0) {
        return true;
      }
      return false;
    }
    private function getEmailPresent($email) {
      $this->selectUser->bind_param("s",$email);
      return parent::executeSelectQuery($this->stmSelectUser);
    }
    private function getPresent($username) {
      $this->stmSelectUser->bind_param("s",$username);
      return parent::executeSelectQuery($this->stmSelectUser);
    }

    //encrypt a password
    private function encryptPsw($psw) {
      $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
      // Crea una password usando la chiave appena creata.
      $psw = hash('sha512', $psw.$random_salt);
      return array($random_salt,$psw);
    }
    protected function createElement($row) {
      return new Fattorino($row["username"],$row["telefono"],$row["email"],$row["nomeRistorante"]);
    }
  }
 ?>
