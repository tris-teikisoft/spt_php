$(document).ready(function () {
  $("#logout-form").on("submit", function (e) {
    e.preventDefault();

    $.ajax({
      url: "/logout",
      method: "POST",
      data: $(this).serialize(),
      beforeSend: function () {
        $("#logout-form button").text("Please wait...");
      },
      success: function (response) {
        $("#logout-form button").text("Logout");

        if (response.success) {
          window.location.href = "/login";
          $("#login-form button").text("Login");
        } else {
          $("#form-error")
            .text("response.error")
            .css("display", "inline-block");
        }
      },
      error: function () {
        $("#form-error")
          .text("something_went_wrong")
          .css("display", "inline-block");
      },
    });
  });
});
