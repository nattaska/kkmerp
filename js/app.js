/*Login or Registration Form Submit*/
$("#login_form, #registration_form").submit(function (e) {
    e.preventDefault();
    var obj = $(this), action = obj.attr('name'); /*Define variables*/
    $.ajax({
        type: "POST",
        url: e.target.action,
        data: obj.serialize()+"&Action="+action,
        cache: false,
        success: function (JSON) {
            if (JSON.error != '') {
                $("#"+action+" #display_error").show().html(JSON.error);
            } else {
                window.location.href = "./";
            }
        }
    });
});

var vContinue = document.getElementById("continue"),
    vLogin = document.getElementById("login");

vContinue.addEventListener("click", function() {
   document.body.className += ' denied';
}, false);

var pfx = ["webkit", "moz", "MS", "o", ""];
function PrefixedEvent(element, type, callback) {
  for (var p = 0; p < pfx.length; p++) {
    if (!pfx[p]) type = type.toLowerCase();
    element.addEventListener(pfx[p]+type, callback, false);
  }
}

PrefixedEvent(vLogin, "AnimationEnd", function () {
  document.body.className = '';
});