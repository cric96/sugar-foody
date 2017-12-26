$(document).ready(function() {
  var time = new Date();
  var orarioMax = new Date(time.getFullYear(), time.getMonth(), time.getDate(), 22, 30, 0, 0);
  //indico come orario di prima consegna quello a partire da mezz'ora dopo l'orario attuale
  time.setMinutes(time.getMinutes()+30);
  var tempo = "";
  if (time < orarioMax) {
    if(time.getHours() >= 1 && time.getHours() <= 9){
      tempo = "0";
    }
    tempo = tempo +time.getHours()+":";
    if(time.getMinutes() >= 1 && time.getMinutes() <= 9) {
      tempo = tempo+"0";
    }
    tempo=tempo+time.getMinutes();
    max = orarioMax.getHours()+":"+orarioMax.getMinutes();
    var orario = document.getElementById("time");
    orario.value = tempo;
    orario.setAttribute("min", tempo);
    orario.setAttribute("max", max);
  } else {
    alert("Tempo per le consegne scaduto, ritenta domani!");
  }
  $('.btn-submit').click(function() {
    /*var luogo = $("#pac-input").text();
    var data = time.toLocaleDateString();
    var ora = $("#time").text();*/
    var data = time.getFullYear()+"/";
    if(time.getMonth() >=1 && time.getMonth() <= 9) {
      data = data+"0";
    }
    data = data+time.getMonth()+"/";
    if(time.getDate() >= 1 && time.getMonth() <= 9) {
      data = data+"0";
    }
    data = data+time.getDate();
   $.ajax({
       url: "/" + window.location.pathname.split('/')[1] + "/updateOrdine.php",
       type: POST,
       dataType: "json",
       data: {"luogo" : $("#pac-input").text() , "data": data , "ora": $("#time").text() },
       success: function(){
            window.location =  "/" + window.location.pathname.split('/')[1] + "/confermaPagamento.php";
       }
   });
   return false;
});
})
