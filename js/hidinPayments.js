function valueChanged()
{
   if($('.check-hide').is(":checked")) {
     $(".buttons-hides").hide();
     $(".fieldset-hide").show(1000);
     $('#nomeTitolare').attr('required', true);
     $('#cognomeTitolare').attr('required', true);
     $('#psw').attr('required', true);
     $('#numeroCarta').attr('required', true);
     $('#date').attr('required', true);
   } else {
     $(".buttons-hides").show();
     $(".fieldset-hide").hide(1000);
     $('#nomeTitolare').removeAttr('required');
     $('#cognomeTitolare').removeAttr('required');
     $('#psw').removeAttr('required');
     $('#numeroCarta').removeAttr('required');
     $('#date').removeAttr('required');
   }
}
