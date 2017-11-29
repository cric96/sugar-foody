<!DOCTYPE html>
<html lang="it">
   <head>
     <meta charset="UTF-8">
     <link rel="SHORTCUT ICON" href="img/logo.ico" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
     <script src="https://use.fontawesome.com/42b65516fc.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
     <script src="https://www.w3schools.com/lib/w3.js"></script>
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="./css/catProdotti.css">
     <link rel="stylesheet" href="./css/fattori_admin.css">
     <title>Gestione ordine </title>
   </head>
   <body>
     <body>
      <div w3-include-html="navbarAdmin.html"></div>
      <main>
        <h1> Ordini</h1>
        <section>
          <table class="table table-striped">
            <thead class="thead-inverse">
              <tr>
                <th>N° Ordine</th>
                <th> D fattorino</th>
                <th>Stato</th>
              </tr>
            </thead>
            <tbody>
              <tr scope="row">
                <td> 1231 </td>
                <td>??? <a href="#">+</a> </td>
                <td>Da confermare</td>
              </tr>
              <tr scope="row">
                <td> 1231 </td>
                <td>??? <a href="#">+</a> </td>
                <td>Da confermare</td>
              </tr>
            </tbody>
          </table>
        </section>
      </main>
      <section>
        <h1>Crea fattorino</h1>
        <form class="" action="#" method="post">
          <fieldset>
            <legend>Dati personali</legend>
            <label>Username <input type="text" name="username"></label>
            <label>Password <input type="password" name="username"></label>
          </fieldset>
          <input type="submit" name="invio" value="aggiungi">
        </form>
      </section>
      <section>
        <a href="home_admin.php"> Torna indietro.. </a>
      </section>
      <div w3-include-html="footer.html"></div>
      <script>
         w3.includeHTML();
      </script>
   </body>
</html>
