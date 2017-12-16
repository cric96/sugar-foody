<!DOCTYPE html>
<html lang="it">
   <head>
      <meta charset="UTF-8">
      <link rel="SHORTCUT ICON" href="img/logo.ico" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
      <script src="https://use.fontawesome.com/42b65516fc.js"></script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://www.w3schools.com/lib/w3.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
      <script src="./js/scriptHide.js"></script>
      <script src="./js/hide-accessibily.js"></script>
      <link rel="stylesheet" href="./css/catProdotti.css">
      <link rel="stylesheet" href="./css/fa-style.css">
      <link rel="stylesheet" href="./css/tabelle-style.css">
      <link rel="stylesheet" href="./css/popup-basic-style.css">
      <link rel="stylesheet" href="./css/orders-style.css">
      <link rel="stylesheet" href="./css/overlay-style.css">
      <title>Ordini</title>
   </head>
   <body>
      <nav w3-include-html="./include/navbarUtente.html" class="navbar navbar-expand-lg navbar-light bg fixed-top"></nav>
      <header>
         <div class="overlay">
            <h2 class="my-4">Ordini</h2>
         </div>
      </header>
      <main class="container">
         <section>
            <h3 class="hide-acc">Storico ordini</h3>
            <table class="table table-striped">
               <thead>
                  <tr>
                     <th>#ordine</th>
                     <th>Stato</th>
                     <th>Luogo</th>
                     <th>Data / Ora</th>
                     <th>Dettagli</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>1234</td>
                     <td>Stato</td>
                     <td>Luogo</td>
                     <td>Data</td>
                     <td class="info"><a class="fa fa-info fa-2x" aria-hidden="true" data-toggle="modal" data-target="#dettagli_ordine" href=dettagli_ordine.php><span class="hide-acc">Dettagli</span></a></td>
                  </tr>
                  <tr>
                     <td>45343</td>
                     <td>Stato</td>
                     <td>Luogo</td>
                     <td>Data</td>
                     <td class="info"><a class="fa fa-info fa-2x" data-toggle="modal" data-target="#dettagli_ordine" aria-hidden="true" href=dettagli_ordine.php><span class="hide-acc">Dettagli</span></a></td>
                  </tr>
               </tbody>
            </table>
         </section>
      </main>
      <div w3-include-html="./include/notification.html" class="notification"></div>
      <footer class="panel-footer" w3-include-html="./include/footer.html"></footer>
      <?php include('./include/notification_modal.php') ?>
      <?php include('./include/dettagli_ordine.php') ?>
      <script>
         w3.includeHTML();
      </script>
   </body>
</html>
