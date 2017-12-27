$(document).ready(activeSwitchCheckBox)

function activeSwitchCheckBox() {
  $(".aggiuntaSwitch").click(function() {
    var parent = $(this).parent().parent().parent().parent()
    parent.find("input.obbligatorioSwitch").prop('checked', false);
  })

  $(".obbligatorioSwitch").click(function() {
    var parent = $(this).parent().parent().parent().parent()
    parent.find("input.aggiuntaSwitch").prop('checked', false);
  })
}
