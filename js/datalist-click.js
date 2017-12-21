//carimento script
$.getScript("/sugar-foody/js/url-getter.js",function(){});

var get_name = 'found-value';
var getOrder = 'order';
var idOrder = '';

$(document).ready(function() {

  $(".source").click(function(event) {
    var link = $(event.target);
    idOrder = link.attr("value");
  })
})
function search() {
  var selected = $("#searching").val();
  $("#set").children().each(function() {
    if($(this).val() === selected) {
      if(getUrlParameter(get_name) === undefined) {
        window.location.href = window.location.href + "?" + get_name + "=" + selected + "&" + getOrder + "=" + idOrder;
      } else {
        var url = window.location.href;
        url = url.replace(get_name+"="+getUrlParameter(get_name),get_name+"="+selected);
        url = url.replace(getOrder+"="+getUrlParameter(getOrder),getOrder+"="+idOrder);
        window.location.href = url;
      }
    }
  })
}
