$(document).ready(function() {
  $("#svuotaButton").click(function(){
    window.location =  "/" + window.location.pathname.split('/')[1] + "/svuotaCarrello.php";
  })
})
