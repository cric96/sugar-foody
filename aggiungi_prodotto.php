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
      <link rel="stylesheet" href="./css/catProdotti.css">
      <link rel="stylesheet" href="./css/prodotti-style.css">
      <link rel="stylesheet" href="./css/tabelle-style.css">
      <link rel="stylesheet" href="./css/popup-style.css">
      <title>Aggiungi prodotto</title>
   </head>
   <body>
     <nav w3-include-html="./include/navbarAdmin.html" class="navbar navbar-expand-lg navbar-light bg fixed-top"></nav>
     <div class="overlay">
       <h2 class="my-4">Prodotti</h2>
     </div>
     <main class="container-fluid content">
      <form method="post" class="form-horizontal">
        <div class="form-group row">
        <label for="user" class="control-label col-sm-2">Nome prodotto</label>
          <div class="col-sm-10">
            <input type="text" class="form-control form-control-sm" name="prodotto" id="prodotto" readonly value="Mio prodotto">
          </div>
        </div>
        <div class="form-group row">
          <label for="mail" class="control-label col-sm-2">Prezzo</label>
          <div class="col-sm-10">
            <input type="number" class="form-control form-control-sm" name="mail" id="mail">
          </div>
        </div>
        <div class="form-group row">
          <label for="mail" class="control-label col-sm-2">Ingredienti</label>
          <div class="col-sm-10">
            <table class="table">
              <thead>
                <tr>
                  <th>Nome ingrediente</th>
                  <th>Aggiunta</th>
                  <th> Elimina </th>
                  <th> Obligatorio </th>
                  <th> Aggiunta </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Base piadina</td>
                  <td>10€</td>
                  <td class="delete"><a class="fa fa-trash" aria-hidden="true" href=#><span class="hide-acc"> modifica</span></a></td>
                  <td>
                  <label class="switch">
                    <input type="checkbox">
                    <span class="slider"></span>
                  </label>
                  </td>
                  <td>
                    <label class="switch">
                      <input type="checkbox">
                      <span class="slider"></span>
                    </label>
                  </td>
                </tr>
                <tr>
                  <td>Pomodor</td>
                  <td>2</td>
                  <td class="delete"><a class="fa fa-trash" aria-hidden="true" href=#><span class="hide-acc"> modifica</span></a></td>
                  <td>
                  <label class="switch">
                    <input type="checkbox">
                    <span class="slider"></span>
                  </label>
                  </td>
                  <td>
                    <label class="switch">
                      <input type="checkbox">
                      <span class="slider"></span>
                    </label>
                  </td>
                </tr>
              </tbody>
            </table>
            <div class="adder">
              <a data-toggle="modal" data-target="#bannerformmodal" title="Aggiungi prodotto!" class="fa fa-plus-square" aria-hidden="true"><span class="hide-acc">+</span></a>
            </div>
          </div>
        </div>
      </form>
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
            <div class="form-group">
              <label for="my_select" class="control-label col-sm-6" >Scegli ingredienti..</label>

              <input type="text" id="myInput" onkeyup="myFunction()" class="col-sm-12" placeholder="Cerca tra gli ingredienti...">
              <select id="my_select" class="form-control col-sm-12 selectpicker" name="monthly_rental" >

                  <option>Pomodoro</option>
                  <option>Mozzarella</option>
                  <option>Farina</option>
              </select>
            </div>
            <div class="form-group">
              <div class="col-sm-2 input-group">
                <label for="">Aggiunta</label>
                <label class="switch col-sm-4">
                  <input type="checkbox">
                  <span class="slider"></span>
                </label>
              </div>
              <div class="col-sm-2 input-group">
                <label for="">Obbligatorio</label>
                <label class="switch col-sm-4">
                  <input type="checkbox">
                  <span class="slider"></span>
                </label>
              </div>
            </div>
            <p> Un nuovo ingrediente? Aggiungilo! </p>
            <div class="form-group">
               <label for="user" class="control-label col-sm-2">Nome</label>
               <div class="col-sm-12 input-group">
                  <input type="text" class="form-control form-control-sm rounded-0" name="user" id="user">
               </div>
            </div>

            <div class="form-group">
               <label for="psw" class="col-sm-2 control-label">Prezzo</label>
               <div class="col-sm-12 input-group">
                  <input type="password" class="form-control form-control-sm rounded-0" name="psw" id="psw">
               </div>
            </div>
            <button type="submit" class="btn btn-submit  float-right"><em class="fa fa-sign-in fa-lg" aria-hidden="true"></em> Aggiungi</button>
        </div>
      </div>
    </div>
    </div>
    <script>
      w3.includeHTML();
    </script>
  </body>
</html>
