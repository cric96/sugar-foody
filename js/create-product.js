$(document).ready(function() {
  $("#createProduct").submit(function() {
    if($("#lista-ingredienti").children().length == 0 ) {
      alert("Devi inserire almeno un ingrediente")
      return false
    }
    var i = 0

    $("#lista-ingredienti").children().each(function() {
      var ingredient = new Object()
      $(this).children().each(function(){
        var current = $(this)
        if(current.hasClass("name-insert")) {
          ingredient.name = current.html()
        }else if(current.hasClass("price")) {
          ingredient.price = current.html()
        }else if(current.hasClass("aggiunta")) {
          isSwitchChecked(current)
          ingredient.aggiunta = true
        }else if(current.hasClass("obbligatorio")) {
          isSwitchChecked(current)
          ingredient.obbligatorio = true
        }
      })
      i++
      console.log(ingredient)
    })
    return false
  })
})

function isSwitchChecked(td) {
  console.log(td.find("input").attr("name"))
}
