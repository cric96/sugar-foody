function addInProdotto() {
  var selected = $("#searching").val()
  var found = false
  $("#set").children().each(function() {
    if($(this).val() === selected) {
      found = true
      $("#lista-ingredienti").append("<tr>" +
        "<td class='name-insert'>"+selected+"</td>"+
        "<td class='price'>"+$(this).attr("data")+"</td>"+
        "<td class='delete'><a class='remover fa fa-trash' aria-hidden='true'><span class='hide-acc'> elimina</span></a></td>"+
        "<td class='aggiunta'>"+
          "<div class='switch'>"+

            "<label><input class='aggiuntaSwitch' type='checkbox' name='switch' value='l1-c2' >"+
            "<span class='slider'></span>"+
            "<label for='l1-c1' class='hide-acc'>Abilita obbligatorio</label>"+
          "</div>"+
        "</td>"+
        "<td class='obbligatorio'>"+
          "<div class='switch'>"+
          "<label><input class='obbligatorioSwitch' type='checkbox' name='switch' value='l1-c1' >" +
            "<span class='slider'></span>"+
            "<label for='l1-c2' class='hide-acc'>Abilita aggiunta</label>"+
          "</div>"+
        "</td>"+
      "</tr>")
      $(this).remove()
    }
  })
  if(!found) {
    alert("Ingrediente sbagliato! scegli tra quelli presenti oppure aggiungine uno nuovo!")
  } else {
    hideAfterLoad()
    reloadAction()
    activeSwitchCheckBox()
    $('#closemodal').click()
  }
}
