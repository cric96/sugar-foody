<?php
  include_once("ordine.php");
  include_once("notificationSet.php");
  include_once("DBSet.php");
  include_once("productSet.php");
  include_once("statusSet.php");
  //Astrazione della raffigurazione degli ingredienti del db
  class OrdineSet extends DBSet{

    private $stmInsert;
    private $stmUpdateFattorino;
    private $stmUpdateStandard;
    private $stmUpdate;
    private $stmSelectUser;
    private $stmSelectAdmin;
    private $stmDelete;
    private $statuses;
    public function __construct($con) {
      parent::__construct($con);
      $this->stmDelete = $this->con->prepare("DELETE FROM ORDINE WHERE stato = 'carello' AND utente = ?");
      $this->stmInsert = $this->con->prepare("INSERT INTO ORDINE (`data`, `utente`, `luogo`, `stato`,`amministratore`) VALUES (?,?,?,'carrello',?)");
      $this->stmUpdateFattorino = $this->con->prepare("UPDATE ORDINE SET `fattorino`=?, stato='elaborazione' WHERE  `numeroOrdine`=?");
      $this->stmUpdate = $con->prepare("UPDATE ORDINE SET  stato=? WHERE `numeroOrdine`=?");
      $this->stmSelectUser = $con->prepare("SELECT * FROM ORDINE WHERE `utente`=?");
      $this->stmSelectAdmin = $con->prepare("SELECT * FROM ORDINE WHERE `amministratore`=?");
      $this->stmSelect = $con->prepare("SELECT * FROM ORDINE WHERE `numeroOrdine`=?");
      $this->statuses = (new statusSet($con))->getStatuses();
    }

    public function clearChart($user) {
      $this->stmDelete->bind_param("s",$user);
      return parent::executeBasicQuery($this->stmDelete);
    }
    public function getOrdersUsers($user) {
      $this->stmSelectUser->bind_param("s",$user);
      return parent::executeSelectQuery($this->stmSelectUser);
    }

    public function getOrdersAdmin($admin) {
      $this->stmSelectAdmin->bind_param("s",$admin);
      return parent::executeSelectQuery($this->stmSelectAdmin);
    }

    public function insertOrder($data,$user,$locate,$status,$admin) {
      $this->stmInsert->bind_param("sssss",$data,$user,$status,$admin);
      return parent::executeBasicQuery($this->stmInsert);
    }

    public function confirmOrder($order,$fattorino) {
        $this->stmUpdateFattorino->bind_param("si",$fattorino,$order);
        if(!parent::executeBasicQuery($this->stmUpdateFattorino)) {
          return false;
        }
        $this->produceNotification($this->getOrder($order));
    }
    public function getOrder($order){
      $this->stmSelect->bind_param("i",$order);
      $res = parent::executeSelectQuery($this->stmSelect);
      if(!$res) {
        return false;
      }
      return $res[0];
    }
    public function nextStatusOn($order) {
      $query = $this->getOrder($order);
      if(!$query) {
        return false;
      }
      $current = $query;
      $iterableStatuses = $this->statuses;
      $correctStatus = null;
      while($value = current($iterableStatuses)) {
        if(key($iterableStatuses) === $current->getStatus()) {
          next($iterableStatuses);
          $correctStatus = key($iterableStatuses);
        }
        next($iterableStatuses);
      }
      $this->stmUpdate->bind_param("si",$correctStatus,$order);
      if(!parent::executeBasicQuery($this->stmUpdate)){
        return false;
      }
      $this->produceNotification(new Ordine($current->getId(),$current->getUser(),$current->getAdmin(),
                                            $correctStatus,$current->getProducts(),$current->getDate(),
                                            $current->getFattorino(),$current->getProducts(),$current->isPagato()));
      return true;
    }
    private function produceNotification($order) {
      $status_number = $this->statuses[$order->getStatus()];
      $notificationManager = new NotificationSet($this->con);
      if(in_array($status_number,AdminPolicy::notification)){
        $notificationManager->insertNotification($order->getAdmin(),$order->getId(),$order->getStatus());
      }
      if(in_array($status_number,UtentePolicy::notification)){
        $notificationManager->insertNotification($order->getUser(),$order->getId(),$order->getStatus());
      }
      if(in_array($status_number,FattorinoPolicy::notification)){
        $notificationManager->insertNotification($order->getFattorino(),$order->getId(),$order->getStatus());
      }
    }
    protected function createElement($row) {
      $products = (new ProductSet($this->con))->getProductInOrder($row["numeroOrdine"]);
      return new Ordine($row["numeroOrdine"],$row["utente"],$row["amministratore"],$row["stato"],$row["luogo"],$row["data"],$row["fattorino"],$products,$row["pagato"]);
    }
  }
 ?>
