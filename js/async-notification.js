
var open = false;
$(document).ready(function() {
  $("#window").hide();
  $("#notification > a").click(function() {
    $("#window").fadeIn(1000);
    open = true;
  })
  $("#exit").click(function() {
    open = false;
    $("#window").fadeOut(1000,function() {

      $.ajax({
        url: "/sugar-foody/ajax/reset-notification.php",
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

})

function refresh()
{
  if(open === false) {

    console.log("notification");
    $('#notification').load(document.URL +  ' #notification',function() {
      $("#window").hide();
      $("#notification > a").click(function() {
        $("#window").fadeIn(1000);
        open = true;
      })
      $("#exit").click(function() {
        $("#window").fadeOut(1000,function() {
          open = false;
          $.ajax({
            url: "/sugar-foody/ajax/reset-notification.php",
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
    });
  }
}

setInterval(function(){

  refresh();;

}, 1000);
