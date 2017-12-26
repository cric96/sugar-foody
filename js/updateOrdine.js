$(document).ready(function() {
  $('.btn-submit').click(function() {

   $.ajax({
       url: "/" + window.location.pathname.split('/')[1] + "/updateOrdine.php",
       type: POST;
       dataType: "json",
       data: {},
       success: function(){
            window.location =  "/" + window.location.pathname.split('/')[1] + "/confermaPagamento.php";
       }
   });
   return false;
});
})

//prendere in automatico ciò che c'è nei campi di data e luogo, se settati
//aggiornarli se modificati
