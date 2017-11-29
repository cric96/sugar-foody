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
     <script src="./js/hide-accessibily.js"></script>
     <link rel="stylesheet" href="./css/catProdotti.css">
     <link rel="stylesheet" href="./css/fattori_admin.css">"
     <title>Gestione ordine </title>
   </head>
   <body>
     <body>
      <div w3-include-html="navbarAdmin.html"></div>
      <main>
        <header>
          <div class="overlay">
            <h2 class="my-4">Ordini</h2>
          </div>
        </header>
        <section class="container">
          <table class="table table-striped">
            <thead class="thead-inverse">
              <tr>
                <th>N° Ordine</th>
                <th>ID fattorino</th>
                <th>Stato</th>
              </tr>
            </thead>
            <tbody>
              <tr scope="row">
                <td> 1231 </td>
                <td> <a data-toggle="modal" data-target="#bannerformmodal" class="fa fa-plus-square" aria-hidden="true" href="aggiungi_prodotto.php"><span class="hide-acc">+</span></a> </td>
                <td>Da confermare</td>
              </tr>
              <tr scope="row">
                <td> 1231 </td>
                <td> <a data-toggle="modal" data-target="#bannerformmodal" class="fa fa-plus-square" aria-hidden="true" href="aggiungi_prodotto.php"><span class="hide-acc">+</span></a></td>
                <td>Da confermare</td>
              </tr>
            </tbody>
          </table>
        </section>
      </main>

<div class="modal fade bannerformmodal" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" id="bannerformmodal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
      <div class="form-group">
        <label for="my_select" class="control-label">Scegli il fattorino..</label>

        <select id="my_select" class="form-control col-sm-10" name="monthly_rental" class="selectpicker">
            <option>Maurizio costanzo</option>
            <option>Peppa pig</option>
            <option>Huppy</option>
        </select>
      </div>

        <p> Un nuovo fattorino? Aggiungilo! </p>
      <div class="form-group">
         <label for="user" class="control-label">Username</label>
         <div class="col-sm-10 input-group">
            <input type="text" class="form-control form-control-sm rounded-0" name="user" id="user">
         </div>
      </div>

      <div class="form-group">
         <label for="psw" class="control-label">Password</label>
         <div class="col-sm-10 input-group">
            <input type="password" class="form-control form-control-sm rounded-0" name="psw" id="psw">
         </div>
      </div>
      <button type="submit" class="btn btn-submit  float-right"><em class="fa fa-sign-in fa-lg" aria-hidden="true"></em> Aggiungi</button>

    </div>
  </div>
</div>
      <script>
         w3.includeHTML();
      </script>
   </body>
</html>
