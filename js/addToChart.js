$(document).on("click", ".modal-piatto", function () {
     var productId = $(this).data('id');
     $("#productId").text("Modifica Piatto n° " + productId);
    //$.post("componiOrdine.php", { id: productId });
    $.post('componiOrdine.php', 'id=' + productId, function (response) {
   alert(response);
});
});
