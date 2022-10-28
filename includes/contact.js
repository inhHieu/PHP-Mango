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
        $("#noti").css("background-color", "#fff200");
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
// function sendEmail() {
//     var name = $("#name");
//     var email = $("#email");
//     var subject = $("#subject");
//     var body = $("#body");

//     if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
//         $.ajax({
//            url: 'sendEmail.php',
//            method: 'POST',
//            dataType: 'json',
//            data: {
//                name: name.val(),
//                email: email.val(),
//                subject: subject.val(),
//                body: body.val()
//            }, success: function (response) {
//                 $('#myForm')[0].reset();
//                 $('.sent-notification').text("Message Sent Successfully.");
//            }
//         });
//     }
// }
