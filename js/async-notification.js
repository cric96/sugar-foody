
var open = false;
$(document).ready(function() {
  $("#window").hide();
  $("#notification > a").click(function() {
    $("#window").fadeIn(1000);
    open = true;
  })
  $(".close").click(function() {
    $("#window").fadeOut(1000,function() {
      open = false;
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
      $(".close").click(function() {
        $("#window").fadeOut(1000,function() {
          open = false;
        });
      })
    });
  }
}

setInterval(function(){

  refresh();;

}, 5000);
