//TODO dovrei controllare che i campi non siano già settati, in quel caso dovrei mostrare quelli già settati
//se ancora validi--> la data o l'ora potrebbero non essere conformi alle regole
//forse tanto vale salvarsi solo il luogo di consegna quando lo riprendo dal carrello
$(document).ready(function() {
  var time = new Date();
  var luogo = 0;
  var ora = 0;
  var note = "";
  var totale = 0;
  $('#submitButton').click(function(event) {
    event.preventDefault();
    var data = time.getFullYear()+"/";
    if(time.getMonth() >=1 && time.getMonth() <= 9) {
      data = data+"0";
    }
    data = data+(time.getMonth()+1)+"/";
    if(time.getDate() >= 1 && time.getMonth() <= 9) {
      data = data+"0";
    }
    data = data+time.getDate();
    luogo = $("#pac-input").val();
    ora = $("#time").val();
    if($("#note").val() === "" || $("#note").val() === "citofono,...") {
      note = "";
    } else {
        note = $("#note").val();
    }
    app = $("#costoTot").text().split("€");
    totale = app[1];
   $.ajax({
       url: "/" + window.location.pathname.split('/')[1] + "/updateOrdine.php",
       type: "POST",
       data: {"luogo": luogo, "data": data, "ora": ora, "note": note, "totale": totale},
       success: function(data){
            window.location =  "/" + window.location.pathname.split('/')[1] + "/confermaPagamento.php";
       },
       error: function(error){
            console.log("Error:");
            console.log(error);
       }
   });

});
})
