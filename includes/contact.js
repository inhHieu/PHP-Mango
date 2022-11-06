function sendEmail() {
  var name = $("#name");
  var email = $("#email");
  var message = $("#message");

  if (isNotEmpty(name)) {
    $.ajax({
      url: "Email/sendEmail.php",
      method: "POST",
      dataType: "json",
      data: {
        name: name.val(),
        email: email.val(),
        message: message.val(),
      },
      success: function (response) {
        console.log(response)
        $("#noti").text("send okkk");
        $("#noti").css("background-color", "#39FF14");
        $("#noti").animate({top: '90vh'}).delay(3000).animate({top: '105vh'});
      },
      error: function (response) {
        console.log(response)
        $("#noti").text("send fail");
        $("#noti").css("background-color", "#ff0000");
        $("#noti").css("color", "white");
        $("#noti").animate({top: '90vh'}).delay(3000).animate({top: '105vh'});
      },
    });
  }
}
function isNotEmpty(caller) {
    if (caller.val() == "") {
        caller.css('border', '1px solid red');
        return false;
    } else
        caller.css('border', '');

    return true;
}
// loading animation
// $(document).on({
//   ajaxStart: function() { $body.addClass("loading");    },
//    ajaxStop: function() { $body.removeClass("loading"); }    
// });