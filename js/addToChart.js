$(document).on("click", ".modal-piatto", function () {
     var id = $(this).data('id');
     var name = $(this).data('name');
     $("#productName").text("Modifica " + name);
     $.ajax({
       url: "/" + window.location.pathname.split('/')[1] + "/ajax/fetch-ingredienti.php",
       type: "POST",
       dataType: "html",
       data: {"rowid": id},
       success: function(data){
           $('.fetched-data').html(data);//Show fetched data from database
       },
       error: function(error){
            console.log("Error:");
            console.log(error);
       }
     });
});
