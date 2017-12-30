$(document).ready(function() {
  $('#okpay').submit(function() {
   $.ajax({
       url: "/" + window.location.pathname.split('/')[1] + "/chartToAssignment.php",
       success: function(){
            window.location =  "/" + window.location.pathname.split('/')[1] + "/ordineEffettuato.php";
       }
   });
   return false;
});
})
