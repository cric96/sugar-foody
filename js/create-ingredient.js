$(document).ready(function() {
  $('#adderIngredient').submit(function () {
    $.ajax({
      url: "/" + window.location.pathname.split('/')[1] + "/ajax/ingredienteInProdotto.php",
      type: "POST",
      async: true ,
      data: {"nome": $("#nameIngrediente").val() ,"prezzo" : $("#prezzoIngrediente").val()},
      success: function(data) {
        if(data["result"] === "bad") {
          alert("Ingrediente già presente")
        } else {
          alert("Ingrediente inserito..")
          $("#set").append("<option data=" + $("#prezzoIngrediente").val() + ">"+$("#nameIngrediente").val()+"</option>")
          $('#closemodal').click()
        }
      },
      error: function(error) {
        $('#closemodal').click()
        alert("DB problems..")
      }
    })
    return false;
  });
})
