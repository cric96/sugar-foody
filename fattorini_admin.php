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
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
     <script src="./js/hide-accessibily.js"></script>
     <script src="./js/modal-hide.js"></script>
     <link rel="stylesheet" href="./css/catProdotti.css">
     <link rel="stylesheet" href="./css/fattori_admin.css">
     <link rel="stylesheet" href="./css/tabelle-style.css">
     <link rel="stylesheet" href="./css/fa-style.css">
     <link rel="stylesheet" href="./css/overlay-style.css">
     <link rel="stylesheet" href="./css/switch-style.css">
     <link rel="stylesheet" href="./css/popup-basic-style.css">
     <title>Gestione ordine </title>
   </head>
   <body>
    <nav w3-include-html="./include/navbarAdmin.html" class="navbar navbar-expand-lg navbar-light bg fixed-top"></nav>
    <main>
      <header>
        <div class="overlay">
          <h2 class="my-4">Ordini</h2>
        </div>
      </header>
      <section class="container">,
        <h2 class="hide-acc"> Gestione ordini</h2>
        <table class="table table-striped">
          <thead class="thead-inverse">
            <tr>
              <th>N° Ordine</th>
              <th>ID fattorino</th>
              <th>Stato</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td> 1231 </td>
              <td> <a data-toggle="modal" data-target="#bannerformmodal" class="fa fa-plus-square" aria-hidden="true" href="aggiungi_prodotto.php"><span class="hide-acc">+</span></a> </td>
              <td>Da confermare</td>
            </tr>
            <tr>
              <td> 1231 </td>
              <td> <a data-toggle="modal" data-target="#bannerformmodal" class="fa fa-plus-square" aria-hidden="true" href="aggiungi_prodotto.php"><span class="hide-acc">+</span></a></td>
              <td>Da confermare</td>
            </tr>
          </tbody>
        </table>
      </section>
    </main>
    <div w3-include-html="./include/notification.html" class="notification"></div>
    <footer w3-include-html="./include/footer.html" class="panel-footer"></footer>

    <div class="modal fade bannerformmodal" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" id="bannerformmodal">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group showable">
              <label for="my_select" class="control-label">Scegli il fattorino..</label>
              <select id="my_select" class="form-control col-sm-10 selectpicker" name="monthly_rental" >
                  <option>Maurizio costanzo</option>
                  <option>Peppa pig</option>
                  <option>Huppy</option>
              </select>
            </div>
            <p> Un nuovo fattorino? Aggiungilo! </p>
            <div class="switch">
              <label><input type="checkbox" name="show" value="showing" class="observable-source" id="showing" >
              <span class="slider"></span>
              <label for="showing" class="hide-acc">Mostra il contenuto</label>
            </div>
            <form class="form form-horizontal" action="index.html" method="post">
              <div class="form-group hideble">
                 <label for="user" class="control-label">Username</label>
                 <div class="col-sm-10 input-group">
                    <input type="text" required class="form-control form-control-sm rounded-0" name="user" id="user">
                 </div>
              </div>

              <div class="form-group hideble">
                 <label for="psw" class="control-label">Password</label>
                 <div class="col-sm-10 input-group">
                    <input type="password" required class="form-control form-control-sm rounded-0" name="psw" id="psw">
                 </div>
              </div>
              <div class="form-group hideble">
                 <label for="mail" class="control-label">Mail</label>
                 <div class="col-sm-10 input-group">
                    <input type="mail" required class="form-control form-control-sm rounded-0" name="mail" id="mail">
                 </div>
              </div>
              <button type="submit" class="btn btn-submit float-right hideble"><em class="fa fa-sign-in fa-lg" aria-hidden="true"></em> Aggiungi</button>
            </form>
        </div>
      </div>
    </div>
  </div>
  <script>
      w3.includeHTML();
  </script>
 </body>
</html>
