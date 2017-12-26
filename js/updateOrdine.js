$(document).ready(function() {
  var time = new Date();
  var luogo = 0;
  var ora = 0;
  $('.btn-submit').click(function() {
    var data = time.getFullYear()+"/";
    if(time.getMonth() >=1 && time.getMonth() <= 9) {
      data = data+"0";
    }
    data = data+time.getMonth()+"/";
    if(time.getDate() >= 1 && time.getMonth() <= 9) {
      data = data+"0";
    }
    data = data+time.getDate();
    luogo = $("#pac-input").val();
    ora = $("#time").val();
   $.ajax({
       url: "/" + window.location.pathname.split('/')[1] + "/updateOrdine.php",
       type: POST,
       dataType: "json",
       data: "luogo="+luogo+"&data="+data+"&ora="+ora,
       success: function(){
            window.location =  "/" + window.location.pathname.split('/')[1] + "/confermaPagamento.php";
       }
   });
   return false;
});
})

//prendere in automatico ciò che c'è nei campi di data e luogo, se settati
//aggiornarli se modificati
