$(document).ready(function () {
  $(".update").click(function () {
    $(this)
      .siblings(".input")
      .children()
      .prop("disabled", (i, v) => !v);
    $(this).siblings(".input").children().toggleClass("active-inpt");

    $(this).html() == '<i class="fa fa-times" aria-hidden="true"></i>'
      ? $(this).html('<i class="fa fa-pencil" aria-hidden="true"></i>')
      : $(this).html('<i class="fa fa-times" aria-hidden="true"></i>');

    $(this).siblings(".confirm").toggleClass("visible");
    // console.log($(this).html())
  });
});