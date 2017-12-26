$(document).ready(function() {
  $('.btn-submit').click(function() {
    var pagato = 0;
    if ($('#onDelivery').is(":checked")) {
      pagato = 0;
    } else {
      pagato = 1;
    }
   $.ajax({
       url: "/" + window.location.pathname.split('/')[1] + "/chartToAssignment.php",
       type: "POST",
       dataType: "json",
       data: {"pagato" : pagato},
       success: function(){
            window.location =  "/" + window.location.pathname.split('/')[1] + "/ordineEffettuato.php";
       }
   });
   return false;
});
})
