function checkScadenzaFunction() {
  data = $("#date").val();
  data = data+"-31";
  scad = new Date(data);
  console.log(scad);
  actual = new Date();
  var ciao = document.getElementById('date');
  if(scad <= actual) {
    alert("Inserire una carta di credito ancora valida");
    $("#date").val("");
  }
}
