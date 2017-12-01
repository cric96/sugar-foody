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
    <link rel="stylesheet" href="./css/componiOrdine.css">
    <link rel="stylesheet" href="./css/catProdotti.css">
    <script src="./js/hide-accessibily.js"></script>
    <title>Componi ordine</title>
  </head>
  <body>
    <nav w3-include-html="./include/navbarUtente.html" class="navbar navbar-expand-lg navbar-light bg fixed-top"></nav>
    <header>
      <div class="overlay">
        <h2 class="my-4">Ordine</h2>
      </div>
    </header>
    <main class="container">
      <section>
        <table class="table">
          <thead>
            <tr>
              <th>Nome piatto</th>
              <th>Prezzo</th>
              <th>Modifica</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Piada piadosa</td>
              <td>100€</a> </td>
              <td class="modify"><a class="fa fa-pencil fa-pencil-coloured" href=#> <span class="hide-acc">modifica</span> </a></td>
            </tr>
            <tr>
              <td>Pizza pizzosa</td>
              <td>100€</a> </td>
              <td class="modify"><a class="fa fa-pencil fa-pencil-coloured" href=#> <span class="hide-acc">modifica</span> </a></td>
            </tr>
            <tr>
              <td>Pasta pastosa</td>
              <td>100€</a> </td>
              <td class="modify"><a class="fa fa-pencil fa-pencil-coloured" href=#><span class="hide-acc">modifica</span></a></td>
            </tr>
            <tr>
              <td>Dolce dolcioso</td>
              <td>100€</a> </td>
              <td class="modify"><a class="fa fa-pencil fa-pencil-coloured" href=#><span class="hide-acc">modifica</span></a></td>
            </tr>
          </tbody>
        </table>
      </section>
    </main>
    <div w3-include-html="./include/notification.html" class="notification"></div>
    <footer w3-include-html="./include/footer.html" class="panel-footer"></footer>
    <script>
       w3.includeHTML();
    </script>
  </body>
</html>
