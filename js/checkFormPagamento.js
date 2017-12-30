function checkScadenzaFunction() {
  data = $("#date").val();
  data = data+"-31";
  scad = new Date(data);
  actual = new Date();
  if(scad <= actual) {
    alert("Inserire una carta di credito ancora valida");
    $("#date").val("");
  }
}
function checkCarta() {
  numero = $("#numeroCarta").val();
  lunghezza = numero.length;
  if(lunghezza <= 13 || lunghezza > 16) {
    alert("Devi inserire tra le 13 e le 16 cifre");
    $("#numeroCarta").val("");
  }
}
function checkCodice() {
  numero = $("#psw").val();
  lunghezza = numero.length;
  if(lunghezza != 3) {
    alert("Devi inserire un numero con  3 cifre");
    $("#psw").val("");
  }
}
