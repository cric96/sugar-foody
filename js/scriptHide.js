function valueChanged()
{
   if($('.check-hide').is(":checked")) {
     $(".fieldset-hide").show();
     $('#nomeRistorante').attr('required', true);
     $('#immagineRistorante').attr('required', true);
   } else {
     $(".fieldset-hide").hide();
     $('#nomeRistorante').removeAttr('required');
     $('#immagineRistorante').removeAttr('required');
   }
}
