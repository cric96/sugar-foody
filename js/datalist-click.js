//carimento script
$.getScript("/sugar-foody/js/url-getter.js",function(){});
var get_name = 'found-value';
function search() {
  var selected = $("#searching").val();
  $("#set").children().each(function() {
    if($(this).val() === selected) {
      if($.getUrlVar(get_name) === undefined) {
        window.location.href = window.location.href+"?"+get_name+"=" + selected;
      } else {
        var url = window.location.href;
        url = url.replace(get_name+"="+$.getUrlVar(get_name),get_name+"="+selected);
        window.location.href = url;
      }
    }
  })
}
