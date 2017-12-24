$(document).ready(reloadAction)

function reloadAction() {
  console.log("reload..");
  $(".remover").click(function() {
    $(this).parent().parent().remove()
    var nome = $(this).parent().parent().children(".name-insert").html()
    var prezzo = $(this).parent().parent().children(".price").html()
    console.log("<option data=" + prezzo + ">"+nome+"</option>")
    $("#set").append("<option data=" + prezzo + ">"+nome+"</option>")
  })
}
