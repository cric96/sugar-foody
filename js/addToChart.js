$(document).on("click", ".modal-piatto", function () {
     var productId = $(this).data('id');
     $("#productId").text("Modifica Piatto n° " + productId);
     // As pointed out in comments,
     // it is superfluous to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});
