<script type="text/javascript" src="./js/async-notification.js"></script>
<link rel="stylesheet" href="./css/notification-modal.css">
<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
<?php
  require_once("./config.php");
  include("./class/notificationSet.php");
  $notificationSet = new NotificationSet($cn);
  $username = "default";
  $notifications=$notificationSet->getNotification($username);
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
<!-- The Modal
<div class="modal fade" id="notifications">
   <div class="modal-dialog">
      <div class="modal-content">

         <div class="modal-header">
            <h4 class="modal-title">Notifiche</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body">
           <table class="table table-striped">
              <thead>
                 <tr>
                    <th>Ordine</th>
                    <th>Descrizione</th>
                 </tr>
              </thead>
              <div>

                <tbody>

                  <?php
                    foreach ($notifications as $notification) {
                      ?>
                        <tr>
                           <td><?php echo $notification["numeroOrdine"]?></td>
                           <td><?php echo $notification["stato"]?></td>
                        </tr>
                    <?php
                  }
                  ?>
                </tbody>
              </div>
           </table>
         </div>
      </div>
   </div>
   -->
</div>
