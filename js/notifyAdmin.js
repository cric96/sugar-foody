$(document).ready(function() {
  $('.btn-submit').click(function() {
   $.ajax({
       url: '../chartToAssignment.php',
       success: function(){
            alert('Ordine elaborato con successo.');
       }
   });
   return false;
});
})
