<!DOCTYPE html>
<?php include("./secureLogin/adminPage.php");
  include_once("./class/productSet.php");
  include_once("./class/categorySet.php");
  $prodotto = null;
  $nome = "";
  $desc = "";
  $category = "";
  $ingredienti = array();
  $prezzo = 0;
  $categories = (new CategorySet($cn))->getCategories();
  if(isset($_GET["prodotto"])) {
    $prodotto = (new ProductSet($cn)) ->getProductInListino($_SESSION["nomeRistorante"],$_GET["prodotto"]);
    $nome = $prodotto[0]->getName();
    $desc = $prodotto[0]->getDescription();
    $category = $prodotto[0]->getCategory();
    $ingredienti = $prodotto[0]->getIngredients();
    $prezzo = $prodotto[0]->getPrice();
  }
?>
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
      <script src="./js/add-in-prodotto.js"></script>
      <script src="./js/remove-ingredient.js"></script>
      <link rel="stylesheet" href="./css/catProdotti.css">
      <link rel="stylesheet" href="./css/prodotti-style.css">
      <link rel="stylesheet" href="./css/tabelle-style.css">
      <link rel="stylesheet" href="./css/popup-basic-style.css">
      <link rel="stylesheet" href="./css/switch-style.css">
      <link rel="stylesheet" href="./css/fa-style.css">
      <title>Aggiungi prodotto</title>
   </head>
   <body>
     <?php include("./include/navbarAdmin.php"); ?>
     <div class="overlay">
       <h2 class="my-4">Prodotti</h2>
     </div>

     <main class="container-fluid content">
      <form method="post" class="form-horizontal">
        <div class="form-group row">
        <label for="nome-prodotto" class="control-label col-sm-2">Nome prodotto</label>
          <div class="col-sm-10">
            <input type="text" class="form-control form-control-sm" required name="nome-prodotto" id="nome-prodotto" value="<?php echo $nome;?>">
          </div>
        </div>
        <div class="form-group row">
        <label for="nome-prodotto" class="control-label col-sm-2">Categoria</label>
          <div class="col-sm-10">
            <input autocomplete="off" class="form-control form-control-sm" id="searchingCategory"  type="search" list="setcategory" required name="nome-category"  value="<?php echo $category;?>">
            <datalist id="setcategory" >
              <?php
                foreach($categories as $category) {
                  ?>
                  <option><?php echo $category["nome"];?></option>
                <?php
                }
               ?>
            </datalist>
          </div>
        </div>
        <div class="form-group row">
        <label for="nome-prodotto" class="control-label col-sm-2">Descrizione</label>
          <div class="col-sm-10">
            <input type="text" class="form-control form-control-sm" required name="descrizione-prodotto" id="descrizione-prodotto" value="<?php echo $desc;?>">
          </div>
        </div>
        <div class="form-group row">
          <form class="" action="index.html" method="post">
            <label for="mail" class="control-label col-sm-2">Ingredienti</label>
            <div class="col-sm-10">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Nome ingrediente</th>
                    <th>Costo unitario</th>
                    <th> Elimina </th>
                    <th> Aggiunta </th>
                    <th> Obbligatorio </th>
                  </tr>
                </thead>
                <tbody id="lista-ingredienti">
                  <?php
                    foreach($ingredienti as $ingrediente) {?>
                    <tr id="tabella<?php echo $ingrediente->getName(); ?>">
                      <td class="name-insert"><?php echo $ingrediente->getName(); ?></td>
                      <td class="price"><?php echo $ingrediente->getPrice(); ?></td>
                      <td class="delete"><a class="remover fa fa-trash" aria-hidden="true"><span class="hide-acc"> rimuovi</span></a></td>
                      <td>
                        <div class="switch">
                          <label><input type="checkbox" name="switch" value="l1-c1" id="l1-c1" <?php if($ingrediente->aggiunta()) { echo "checked";}?>>
                          <span class="slider"></span>
                          <label for="l1-c1" class="hide-acc">Abilita obbligatorio</label>
                        </div>
                      </td>
                      <td>
                        <div class="switch">
                          <label><input type="checkbox" name="switch" value="l1-c2" id="l1-c2" <?php if($ingrediente->obbligatorio()) { echo "checked";}?>>
                          <span class="slider"></span>
                          <label for="l1-c2" class="hide-acc">Abilita aggiunta</label>
                        </div>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>

                </tbody>
              </table>

              <div class="adder">
                <a data-toggle="modal" data-target="#modal" title="Aggiungi prodotto!" class="fa fa-plus-square" aria-hidden="true"><span class="hide-acc">+</span></a>
              </div>
              <?php
              if(!isset($_GET["prodotto"])) {?>
                <input type="submit" class="btn btn-submit float-right" name="submit" value="Conferma">
              <?php
            } else {
              ?>
                <input type="submit" class="btn btn-submit float-right" name="update" value="Aggiorna">
              <?php
            }
              ?>
            </div>
          </form>

        </div>
      </form>
    </main>
    <footer w3-include-html="./include/footer.html" class="panel-footer"></footer>

    <div class="modal fade bannerformmodal" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true" id="modal">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="closemodal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group showable">
              <form class="form form-horizontal" onsubmit="return false">

                <div class="form-group">
                  <fieldset>
                    <legend>Ricerca ingredienti</legend>
                    <label for="searching"><span class="hide-acc">Cerca</span></label>
                    <input required autocomplete="off" id="searching" class="col-sm-12 form-control" list="set" name="found-value">
                    <datalist id="set" >
                        <?php
                          include_once("./class/ingredientSet.php");
                          $ingredients = (new IngredientSet($cn))->getAllIngredients();
                          foreach($ingredients as $ingredient) {
                            $print = true;
                            foreach($ingredienti as $presenti) {
                              if($presenti->getName() === $ingredient->getName()) {
                                $print = false;
                              }
                            }
                            if($print) {
                                ?>
                                <option data="<?php echo $ingredient->getPrice();?>"><?php echo $ingredient->getName(); ?></option> <?php
                            }
                            $print = true;
                          }
                        ?>

                    </datalist>
                  </fieldset>
                </div>
                <div class="form-group">
                  <button class="btn btn-submit right showable" onclick="addInProdotto()"> Aggiungi</button>
                </div>
              </form>
            </div>
            <div class="form group">
              <h4> Ingrendiete non presente? Aggiungilo! </h4>
              <div class="switch">
                <label><input type="checkbox" name="show" value="showing" class="observable-source" id="showing" >
                <span class="slider"></span>
                <label for="showing" class="hide-acc">Mostra il contenuto</label>
              </div>
            </div>
            <form class="form form-horizontal">
              <div class="form-group hideble">
                 <label for="name" class="control-label col-sm-2">Nome</label>
                 <input type="text" required class="col-sm-12 form-control" name="name" id="name">

              </div>
              <div class="form-group hideble">
                 <label for="prezzo" class="col-sm-2 control-label">Prezzo</label>
                 <input type="number" min = 0 step = 0.01 onclick=required class="col-sm-12 form-control" name="prezzo" id="prezzo">
              </div>
              <button class="btn btn-submit hideble"> Crea</button>
            </form>
        </div>
      </div>
    </div>
    </div>
    <script>
      w3.includeHTML();
    </script>
    <?php include('./include/notification_modal.php') ?>
  </body>
</html>
