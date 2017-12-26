$(document).ready(function() {
  var pagato = 0;
  $('.btn-submit').click(function() {
    if ($('#check-hide').is(":checked")) {
      pagato = 1;
    } else {
      pagato = 0;
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
