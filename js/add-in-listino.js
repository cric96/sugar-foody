function addInListino() {
  var selected = $("#searching").val()
  var price = $("#prezzoProdotto").val()
  var find = false
  $("#set").children().each(function() {
    if($(this).val() === selected) {
      find = true
      var prodotto = $(this).attr("data");
      $.ajax({
        url: "/" + window.location.pathname.split('/')[1] + "./ajax/aggiungiListino.php",
        type: "POST",
        async: false ,
        dataType: "application/json",
        data: {"prodotto": prodotto, "prezzo":price},      
      })
    }
  })

  if(!find) {
    alert("Prodotto sbagliato! scegli tra quelli presenti oppure aggiungine uno nuovo!")
  }


}
