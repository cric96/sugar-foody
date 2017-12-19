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
