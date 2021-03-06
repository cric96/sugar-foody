$(document).ready(function() {
  $(".dettagli").click(function(event) {
    var link = $(event.target);
    idOrder = link.attr("value");
    text=""
    $.ajax({
      url: "/" + window.location.pathname.split('/')[1] + "/ajax/orders.php",
      type: "POST",
      dataType: "json",
      data: {"order": idOrder},
      success: function(data){
        console.log(data)
        for(row in data) {
          if(data[row]["nome"] === undefined) {

            text+="<tr>"+
                    "<td></td>"+
                    "<td></td>"+
                    "<td>Totale: </td>"+
                    "<td>"+data[row]["prezzoTotale"]+"</td>" +
                  "</tr>"
          } else {
            text+="<tr>"+
                    "<td>"+data[row]["nome"]+"</td>"+
                    "<td>"+data[row]["quantita"]+"</td>"+
                    "<td>"+data[row]["categoria"]+"</td>"+
                    "<td>"+data[row]["prezzo"]+"</td>" +
                  "</tr>"
          }

        }
        $("#addValue").html(text)
      },
      error: function(error){
           console.log("Error:");
           console.log(error);
      }
    })
  })
})
