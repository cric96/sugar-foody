<!DOCTYPE html>
<html lang="it">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" title="stylesheet" href="./css/main-style.css">
      <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
      <script src="http://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>
      <script src="./js/scriptHide.js"></script>
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet"/>
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <title>Gestione ordine </title>
   </head>
   <body>
      <nav>
        <h1> Benvenuto fornitore</h1>
        <ul>
          <li> <a href="dati_persona.php"> Modifica </a> </li>
          <li> <a href="#"> Contatti </a> </li>
          <li> <a href="#"> Logout </a></li>
        </ul>
      </nav>
      <main>
        <h1> Listino</h1>
        <section>
          <table>
            <thead>
              <th>Nome prodotto</th>
              <th>Prezzo prodotto</th>
              <th>Modifica</th>
              <th>Elimina</th>
            </thead>
            <tbody>
              <td>Piada piadosa</td>
              <td>100€<a href="#">+</a> </td>
              <td></td>
              <td></td>
            </tbody>
          </table>
        </section>
        <div class="adder">
          <a href="aggiungi_prodotto.php">+</a>
        </div>
      </main>
      <div class="notification">
        <input type="button" name="notifiche" value="notifiche">
      </div>
      <div class="goback">
        <a href="home_admin.php"> Torna indietro.. </a>
      </div>
      <footer>
        info info info
      </footer>
   </body>
</html>
