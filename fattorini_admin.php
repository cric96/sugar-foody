<!DOCTYPE html>
<?php include("./secureLogin/adminPage.php");

  include_once("./class/ordineSet.php");
  if(isset($_GET["found-value"])) {
    (new OrdineSet($cn))->confirmOrder($_GET["order"],$_GET["found-value"]);

  }
?>
<html lang="it">
   <head>
     <meta charset="UTF-8">
     <link rel="SHORTCUT ICON" href="img/logo.ico" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
     <script src="https://use.fontawesome.com/42b65516fc.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
     <script src="https://www.w3schools.com/lib/w3.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
     <script src="./js/hide-accessibily.js"></script>
     <script src="./js/modal-hide.js"></script>
     <script type="text/javascript" src="./js/url-getter.js"> </script>
     <script src="./js/datalist-click.js"></script>
     <script src="./js/remove-ingredient.js"></script>
     <link rel="stylesheet" href="./css/catProdotti.css">
     <link rel="stylesheet" href="./css/fattori_admin.css">

     <link rel="stylesheet" href="./css/fa-style.css">
     <link rel="stylesheet" href="./css/overlay-style.css">
     <link rel="stylesheet" href="./css/switch-style.css">
     <link rel="stylesheet" href="./css/popup-basic-style.css">
     <title>Gestione ordine </title>
   </head>
   <body>
     <?php include("./include/navbarAdmin.php"); ?>
    <main>
      <header>
        <div class="overlay">
          <h2 class="my-4">Ordini</h2>
        </div>
      </header>
      <section class="container">
        <h2 class="hide-acc"> Gestione ordini</h2>
        <table class="table table-striped">
          <thead class="thead-inverse">
            <tr>
              <th>#ordine</th>
              <th>ID fattorino</th>
              <th>Stato</th>
              <th>Luogo</th>
              <th>Data / Ora</th>
              <th>Dettagli</th>
            </tr>
          </thead>
          <tbody id="refreshable">
          <?php
            $statuses = (new StatusSet($cn))->getStatuses();
            $ordini = (new OrdineSet($cn))->getOrdersAdmin($_SESSION["username"]);

          ?>
            <?php
              foreach($ordini as $ordine) {
                $statusOrder = $statuses[$ordine->getStatus()];
                if(in_array($statusOrder, AdminPolicy::see)) {
                ?>

                <tr>
                  <td><?php echo $ordine->getId();?></td>
                  <?php
                    if(in_array($statusOrder,AdminPolicy::modify)) {
                  ?>
                    <td> <a value=<?php echo $ordine->getId();?> data-toggle="modal" data-target="#bannerformmodal" class="source fattorino fa fa-plus-square" aria-hidden="true"><span class="hide-acc">+</span></a> </td>
                  <?php
                    } else {
                  ?>
                    <td> <?php echo $ordine->getFattorino();?> </td>
                  <?php
                    }
                  ?>
                  <td><?php echo $ordine->getStatus();?></td>
                  <td><?php echo $ordine->getLocation();?></td>
                  <td><?php echo $ordine->getDate();?></td>
                  <td> <a value=<?php echo $ordine->getId()?> class="dettagli fa fa-info" aria-hidden="true" data-toggle="modal" data-target="#dettagli_ordine" ><span class="hide-acc">Dettagli</span></a></td>

                </tr>
              <?php }
              }
            ?>
          </tbody>
        </table>
      </section>
    </main>

    <footer w3-include-html="./include/footer.html" class="panel-footer"></footer>
    <?php include('./include/notification_modal.php') ?>
    <?php include('./include/dettagli_ordine.php') ?>
    <div class="modal fade bannerformmodal" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" id="bannerformmodal">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group showable">
              <label for="my_select" class="control-label">Scegli il fattorino..</label>
              <input autocomplete="off" id="searching" oninput="search()" type="search" class="col-sm-12 form-control" list="set" name="found-value">
              <datalist id="set" >
                <?php
                include_once("./class/userSet.php");
                 $fattorini = (new UserSet($cn))->getFattorini($_SESSION["nomeRistorante"]);

                ?>
                <?php
                   foreach ($fattorini as $fattorino) {
                     ?>
                      <option><?php echo $fattorino->getUsername(); ?></option>
                     <?php
                   }
                  ?>
              </datalist>
            </div>
          </div>
        </div>
      </div>
  <script>
      w3.includeHTML();
  </script>
 </body>
</html>
