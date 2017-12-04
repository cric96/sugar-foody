function valueChanged()
{
   if($('.check-hide').is(":checked")) {
     $(".fieldset-hide").show(1000);
     $('#nomeTitolare').attr('required', true);
     $('#cognomeTitolare').attr('required', true);
     $('#psw').attr('required', true);
     $('#date').attr('required', true);
   } else {
     $(".fieldset-hide").hide(1000);
     $('#nomeTitolare').removeAttr('required');
     $('#cognomeTitolare').removeAttr('required');
     $('#psw').removeAttr('required');
     $('#date').removeAttr('required');
   }
}
