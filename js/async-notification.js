//In futuro pensare di fare l'intero sistema con ajax totalmente asincrono

//script per sincronizzare le notifiche
var open = false;
//ogni volta che ricarico la pagina devo riassegnare le azioni ai vari elementi
function addAction() {
  //nascondo le notifiche
  $("#window").hide();
  // associo al click la visualizzazione della finestra
  $("#notification > a").click(function() {
    if($("#number-notification").val() !== undefined) {
      $("#window").fadeIn(1000);
      open = true;
    }
  })
  //quando esco effettuo la cancellazione delle notifiche -> si può pensare di associare un altro pulsante
  $("#exit").click(function() {
    $("#window").fadeOut(1000,function() {

      open = false;
      $.ajax({
        url: "/" + window.location.pathname.split('/')[1] + "/ajax/reset-notification.php",
        type: "POST",
        dataType: "json",
        data: {"reset": true},
        success: function(data){
            console.log(data);
        },
        error: function(error){
             console.log("Error:");
             console.log(error);
        }
      });

    });
  })
}
//al caricamento del documento aggiungo le azioni
$(document).ready(function() {
  addAction();
});
// funzione che verrà chiamata ogni dt, ricarica sola il pezzo di pagina associato alle notifiche
function refresh()
{
  if(open === false) {

    console.log("notification");
    $('#notification').load(document.URL +  ' #notification',function() {
      addAction();
    });
  }
}
//l'intervallo nel quale lo scrpit viene rieseguito
setInterval(function(){

  refresh();;

}, 2000);
