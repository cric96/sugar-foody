$(document).on("click", ".modal-piatto", function () {
     var productId = $(this).data('id');
     $("#productId").text(productId);
     // As pointed out in comments,
     // it is superfluous to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});
