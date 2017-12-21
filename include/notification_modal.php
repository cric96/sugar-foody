<script type="text/javascript" src="./js/async-notification.js"></script>
<link rel="stylesheet" href="./css/notification-modal.css">
<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
<?php
  require_once("./config.php");
  include_once("./class/notificationSet.php");
  $notificationSet = new NotificationSet($cn);
  $notifications=$notificationSet->getNotification($_SESSION["username"]);
  if($notifications === FALSE) {
      ?><script type="text/javascript">
      alert("Problemi con le notifiche contattare un tecnico");
      </script><?php
      $notifications=array();
  }
?>
<div class="notification" id="notification">
  <a>
     <span class="fa fa-bell brown"></span>
  </a>
  <?php if(count($notifications) != 0) {?>
    <span id="number-notification" class="badge badge-danger"><?php echo count($notifications) ?></span>
  <?php } ?>

  <dialog id="window">
    <a title="Close" id="exit">X</a>
    <div class="scrolling">
      <table class="table">
         <thead>
            <tr>
               <th>Ordine</th>
               <th>Stato</th>
            </tr>
         </thead>
           <tbody>
             <?php
               foreach ($notifications as $notification) {
                 ?>
                   <tr>
                      
                      <td><?php echo $notification->getOrder()?></td>
                      <td><?php echo $notification->getStatus()?></td>
                   </tr>
               <?php
             }
             ?>
           </tbody>
      </table>
    </div>
  </dialog>
</div>
