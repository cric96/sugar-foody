$(document).on("click", ".modal-piatto", function () {
     var id = $(this).data('id');
     var name = $(this).data('name');
     $("#productName").text("Modifica " + name);
     $("#productId").text(id);

    //$.post("componiOrdine.php", { id: productId });
    $.post('componiOrdine.php', 'id=' + id)
});
