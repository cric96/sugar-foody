<?php include("./secureLogin/adminPage.php");
  include_once("./class/productSet.php");
  $listino = (new ProductSet($cn))->getListino($_SESSION["nomeRistorante"]);
?>

<!DOCTYPE html>
<html lang="it">
   <head>
     <meta charset="UTF-8">
     <link rel="SHORTCUT ICON" href="img/logo.ico" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
     <script src="https://use.fontawesome.com/42b65516fc.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
     <script src="https://www.w3schools.com/lib/w3.js"></script>
     <script src="./js/hide-accessibily.js"></script>
     <script type="text/javascript" src="./js/add-in-listino.js"></script>
     <link rel="stylesheet" href="./css/catProdotti.css">
     <link rel="stylesheet" href="./css/tabelle-style.css">
     <link rel="stylesheet" href="./css/listino.css">
     <link rel="stylesheet" href="./css/fa-style.css">
     <link rel="stylesheet" href="./css/overlay-style.css">
     <link rel="stylesheet" href="./css/switch-style.css">
     <link rel="stylesheet" href="./css/popup-basic-style.css">
     <title>Listino admin </title>
   </head>
   <body>
     <?php include("./include/navbarAdmin.php"); ?>
     <header>
       <div class="overlay">
         <h2 class="my-4">Listino</h2>
       </div>
     </header>
      <main class="container">
        <section>
          <table id="refreshable" class="table table-striped">
            <thead thead-inverse>
              <tr>
                <th>Nome prodotto</th>
                <th>Prezzo prodotto</th>
                <th>Modifica</th>
                <th>Elimina</th>
              </tr>
            </thead>
            <tbody >
              <?php
                foreach($listino as $prodotto) {
                  ?>
                  <tr scope="row">
                    <td><?php echo $prodotto->getName();?> </td>
                    <td><?php echo $prodotto->getPrice();?> €</td>
                    <td class="modify"><a class="fa fa-cogs" href=aggiungi_prodotto.php?prodotto=<?php echo $prodotto->getId()?>> <span class="hide-acc">modifica</span> </a></td>
                    <td class="delete"><a class="fa fa-trash" aria-hidden="true" href=deleteProductInListino.php?prodotto=<?php echo $prodotto->getId()?>> <span class="hide-acc"> modifica</span> </a></td>
                  </tr>
                <?php
                }
              ?>

            </tbody>
          </table>
        </section>
        <div class="adder">
          <a data-toggle="modal" data-target="#bannerformmodal" title="Aggiungi prodotto!" class="fa fa-plus-square" aria-hidden="true"><span class="hide-acc">+</span></a>
        </div>
      </main>
      <div class="modal fade bannerformmodal" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" id="bannerformmodal">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="closemodal">&times;</button>
            </div>
            <div class="modal-body">
              <div class="form-group showable">
                <form onsubmit="return false">
                  <fieldset>
                    <legend>Inserisci prodotto</legend>
                    <div class="form-group">

                      <label for="searching">Ricerca tra quelli già inseriti</label>
                      <input autocomplete="off" id="searching"  type="search" class="col-sm-12 form-control" list="set" name="found-value" required>
                      <datalist id="set" >
                          <?php
                            include_once("./class/productSet.php");
                            $products = (new ProductSet($cn))->getAllProducts();
                            foreach($products as $product) {
                              $print = true;
                              foreach ($listino as $presente) {
                                if($presente->getId() === $product->getId()) {
                                  $print = false;
                                }
                              }
                              if($print) {
                                ?>

                                <option data = <?php  echo $product->getId() ?>><?php echo $product->getName(); ?></option> <?php
                              }
                              $print = true;
                            }
                          ?>
                      </datalist>

                      <label for="prezzoProdotto">Inserisci il prezzo </label>
                      <input id="prezzoProdotto" min=0 step=0.01 class="col-sm-12 form-control"type="number" name="" value="">
                    </div>
                    <div class="form-group">
                      <button type="submit" onclick=addInListino()
                       class="btn btn-submit"> Aggiungi in listino</button>
                    </div>
                  </fieldset>
                </form>
                <form class="" action="aggiungi_prodotto.php" method="post">
                  <div class="form-group">
                    <button type="submit" class="btn btn-submit "> Nuovo Prodotto</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer w3-include-html="./include/footer.html" class="panel-footer"></footer>
      <script>
         w3.includeHTML();
      </script>
      <?php include('./include/notification_modal.php') ?>
   </body>
</html>
