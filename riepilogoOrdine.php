<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <link rel="SHORTCUT ICON" href="img/logo.ico" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <script src="https://use.fontawesome.com/42b65516fc.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  <script src="https://www.w3schools.com/lib/w3.js"></script>
  <script src="./js/hide-accessibily.js"></script>
  <script src="./js/modal-hide.js"></script>
  <link rel="stylesheet" href="./css/catProdotti.css">
  <link rel="stylesheet" href="./css/tabelle-style.css">
  <link rel="stylesheet" href="./css/popup-basic-style.css">
  <link rel="stylesheet" href="./css/riepilogoOrdine.css">
  <link rel="stylesheet" href="./css/google-map.css">
  <title>Riepilogo ordine</title>
</head>
<body>
  <?php include("./include/navbarUtente.php"); ?>
  <header>
    <div class="overlay">
      <h2 class="my-4">Riepilogo ordine</h2>
    </div>
  </header>
   <main class="container">
     <section>
       <table class="table table-striped">
         <thead thead-inverse>
           <tr>
             <th>Nome piatto</th>
             <th>Prezzo</th>
             <th>Ingredienti</th>
             <th>Quantità</th>
           </tr>
         </thead>
         <tbody>
           <tr scope="row">
             <td>Piada piadosa</td>
             <td>10€</td>
           <td>
             <div>
               <ul class="prova">
                 <li class="ingredienti">Ingrediente1</li>
                 <li class="ingredienti">Ingrediente2</li>
                 <li class="ingredienti">Ingrediente3</li>
               </ul>
             </div>
         </td>
             <td>2</td>
           </tr>
           <tr scope="row">
             <td>Pizza pizzosa</td>
             <td>5€</a> </td>
             <td>
               <div>
                 <ul class="prova">
                   <li class="ingredienti">Ingrediente1</li>
                   <li class="ingredienti">Ingrediente2</li>
                   <li class="ingredienti">Ingrediente3</li>
                 </ul>
               </div>
             </td>
             <td>2</td>
           </tr>
           <tr scope="row">
             <td>Pasta pastosa</td>
             <td>1€</a> </td>
             <td>
               <div>
                 <ul class="prova">
                   <li class="ingredienti">Ingrediente1</li>
                   <li class="ingredienti">Ingrediente2</li>
                   <li class="ingredienti">Ingrediente3</li>
                 </ul>
               </div>
             </td>
             <td>2</td>
           </tr>
           <tr scope="row">
             <td>
               Totale: 32€
             </td>
           </tr>
         </tbody>
       </table>
     </section>
     <form action="confermaPagamento.php" method="post">
       <section>
         <div class="google">
           <input id="pac-input" class="controls" type="text" placeholder="Ricerca" required>
           <div id="map"></div>
           <script src="./js/script-google.js"></script>
           <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzSBGbvTC78VHiHMLfKfCsjiW81zRByYk&libraries=places&callback=initAutocomplete"
                async defer></script>
         </div>

         <label class="orario">Scegli l'orario di consegna:
            <input type="time" name="" value="" required>
        </label>
       </section>

      <input class="pagamento btn btn-submit float-right" type="submit" name="Paga" value="Paga">
     </form>
   </main>
  <footer w3-include-html="./include/footer.html" class="panel-footer"></footer>
  <?php include('./include/notification_modal.php') ?>
  <script>
     w3.includeHTML();
  </script>
</body>
</html>
