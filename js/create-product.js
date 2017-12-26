$(document).ready(function() {
  $("#createProduct").submit(function() {
    if($("#lista-ingredienti").children().length == 0 ) {
      alert("Devi inserire almeno un ingrediente")
      return false
    }
    var i = 0
    var ingredients = []
    $("#lista-ingredienti").children().each(function() {
      var ingredient = new Object()
      $(this).children().each(function(){
        var current = $(this)
        if(current.hasClass("name-insert")) {
          ingredient.name = current.html()
        }else if(current.hasClass("price")) {
          ingredient.price = current.html()
        }else if(current.hasClass("aggiunta")) {
          ingredient.aggiunta = isSwitchChecked(current)
        }else if(current.hasClass("obbligatorio")) {
          ingredient.obbligatorio = isSwitchChecked(current)
        }
      })
      ingredients[i] = ingredient
      i++
    })
    var selected = $("#searchingCategory").val()
    var found = false
    $("#setcategory").children().each(function() {
      if($(this).val() === selected) {
        found = true
      }
    })
    if(!found) {
      alert("Devi scegliere una categoria esistente!")
      return false
    }
    console.log($("#buttonSubmit").attr("name"))
    var insert = false
    if($("#buttonSubmit").attr("name") === "submit") {
      insert = true
    }
    $.ajax({
      url: "/" + window.location.pathname.split('/')[1] + "/ajax/productManager.php",
      type: "POST",
      async: true ,
      data: {"create": insert ,
            "id": $("#idProdotto").val(),
            "nome" : $("#nome-prodotto").val(),
            "categoria" : selected,
            "descrizione" : $("#descrizione-prodotto").val(),
            "ingredienti" : ingredients
          },
      success: function(data) {
        if(data === "ok") {
          alert("Elaborazione eseguita con successo");
          window.location = "/" + window.location.pathname.split('/')[1] + "/listino_admin.php"
        } else {
          alert("Riprova.. Ingrediente già presente!")
        }
      },
      error: function(error) {
        alert("ERROR ON DB!");
      }
    })
    return false
  })
})

function isSwitchChecked(td) {
  return td.find("input").is(":checked")
}
