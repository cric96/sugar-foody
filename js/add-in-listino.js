//finisci i vari controlli!

function addInListino() {
  var selected = $("#searching").val()
  var price = $("#prezzoProdotto").val()
  var find = false
  if($.isNumeric(price)) {
    $("#set").children().each(function() {
      if($(this).val() === selected) {
        find = true
        var prodotto = $(this).attr("data");
        $.ajax({
          url: "/" + window.location.pathname.split('/')[1] + "/ajax/aggiungiListino.php",
          type: "POST",
          async: false ,
          data: {"prodotto": prodotto, "prezzo":price},
        })
      }
    })
  }
  console.log("exit..")
  if(!find || !$.isNumeric(price)) {
    alert("Prodotto sbagliato! scegli tra quelli presenti oppure aggiungine uno nuovo!")
  } else {
    $('#refreshable').load(document.URL +  ' #refreshable',function() {
      hideAfterLoad()
    })
    $('#closemodal').click()
  }
}
