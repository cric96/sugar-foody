function formhash(form, password) {
   // Crea un elemento di input che verrà usato come campo di output per la password criptata.
   var p = document.createElement("input");
   // Aggiungi un nuovo elemento al tuo form.
   form.appendChild(psw);
   psw.name = "psw";
   psw.type = "hidden"
   psw.value = hex_sha512(password.value);
   // Assicurati che la password non venga inviata in chiaro.
   password.value = "";
   // Come ultimo passaggio, esegui il 'submit' del form.
   form.submit();
}
