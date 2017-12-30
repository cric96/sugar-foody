$(document).ready(function() {
  var pagato = 0;
  $('#okpay').submit(function() {
    if ($('#check-hide').is(":checked")) {
      pagato = 1;
    } else {
      pagato = 0;
    }
   $.ajax({
       url: "/" + window.location.pathname.split('/')[1] + "/chartToAssignment.php",
       type: "POST",
       data: {"pagato" : pagato},
       success: function(data){
            console.log(data);
            window.location =  "/" + window.location.pathname.split('/')[1] + "/ordineEffettuato.php";
       },
       error: function(error){
            console.log("Error:");
            console.log(error);
       }
   });
   return false;
});
})
