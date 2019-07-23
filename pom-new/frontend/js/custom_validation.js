$(function () {
    $("#manageUserTable #checkAll").click(function () {
        if ($("#manageUserTable #checkAll").is(':checked')) {
            $("#manageUserTable input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $("#manageUserTable input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});

$(function () {
    $("#manageUserTable #checkAllft").click(function () {
        if ($("#manageUserTable #checkAllft").is(':checked')) {
            $("#manageUserTable input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $("#manageUserTable input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});

function numbersonly(e) {
  var unicode = e.charCode ? e.charCode : e.keyCode
  if (unicode != 8) { //if the key isn't the backspace key (which we should allow)
   if (unicode < 48 || unicode > 57) //if not a number
    return false //disable key press
  }
}
function alphabetssonly(e) {
  var unicode = e.charCode ? e.charCode : e.keyCode
  if (unicode != 32) { //if the key isn't the backspace key (which we should allow)
   if (unicode != 8) { //if the key isn't the backspace key (which we should allow)
    if ((unicode >= 65 && unicode <= 90) || (unicode >= 97 && unicode <= 122)) //if not a number
     return true //enable key press
    else
     return false //disable key press
   }
  }
}
function countChar(val) {
        var len = val.value.length;
        if (len >= 160) {
          val.value = val.value.substring(0, 160);
        } else {
          jQuery('.counterr').text(160 - len);
        }
      };
