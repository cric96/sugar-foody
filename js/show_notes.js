$(document).on("click", ".noteModal", function () {
     var note = $(this).data('value');
     var id = $(this).data('id');
     $("#title").text("Note ordine #" + id);
     $.ajax({
       url: "/" + window.location.pathname.split('/')[1] + "/ajax/show_notes.php",
       type: "POST",
       dataType: "html",
       data: {"value": note},
       success: function(data){
            console.log(note);
           $('.notes').html(data);//Show fetched data from database
       },
       error: function(error){
            console.log("Error:");
            console.log(error);
       }
     });
});
