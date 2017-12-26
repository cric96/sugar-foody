$(document).ready(function() {
  $('.btn-submit').click(function() {
   $.ajax({
       url: "/" + window.location.pathname.split('/')[1] + "/chartToAssignment.php",
       success: function(){
            alert('Ordine elaborato con successo.');
            window.location =  "/" + window.location.pathname.split('/')[1] + "/ordineEffettuato.php";
       }
   });
   return false;
});
})
