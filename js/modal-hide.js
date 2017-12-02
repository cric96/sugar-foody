$(document).ready(function() {
  $(".showable").show();
  $(".hideble").hide();
  $(".observable-source").click(function() {
    if($(".observable-source").is(":checked")) {
      toggleElements(".showable",".hideble");
    } else {
      toggleElements(".hideble",".showable");
    }
  })
})

function toggleElements(toHide,toShow) {
  $(toHide).hide(800, function() {
    $(toShow).show(800);
  });
}
