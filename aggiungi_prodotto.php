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
      <link rel="stylesheet" href="./css/catProdotti.css">
      <title>Aggiungi prodotto</title>
   </head>
   <body>
      <div w3-include-html="navbarAdmin.html"></div>
      <main>
         <h1>Aggiungi prodotto</h1>
         <form class="" action="index.html" method="post">
            <fieldset>
               <legend>Informazioni generali</legend>
               <label>Nome prodotto <input type="text" value="nome"></label>
            </fieldset>
            <fieldset>
               <legend> Seleziona gli ingredienti </legend>
               <label> Ingredienti : <select class="" name="">
               </select>
               </label>
         <form class="" action="#" method="">
         <fieldset>
         <legend>Nuovo ingrediente </legend>
         <label>Nome <input type="text" value="nome_ingrediente"</label>
         <label>Prezzo <input type="number" value="prezzo"</label>
         </fieldset>
         <input type="button" name="" value="aggiungi ingrediente">
         </form>
         <table>
         <thead>
         <tr>
         <th>Ingrediente</th>
         <th>Prezzo</th>
         </tr>
         </thead>
         </table>
         </fieldset>
         <input type="submit" name="agggiungi prodotto" value="aggiunti prodotto">
         <div class="goback">
            <a href="home_admin.php"> Torna indietro.. </a>
         </div>
         <div w3-include-html="footer.html"></div>
         <script>
            w3.includeHTML();
         </script>
         </form>
      </main>
</html>
