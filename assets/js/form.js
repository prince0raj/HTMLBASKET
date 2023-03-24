$(document).ready(function(event) {
  /* Top Form */
  $("#frmContact_top").on("submit", function(event) {
    event.preventDefault();
    $("#mail-status_top").hide();
    $("#send-message_top").hide();
    $("#loader-icon_top").show();
    var full_name = $("#full_name_top").val();
    var email = $("#email_top").val();
    var contact = $("#contact_top").val();
    var city = $("#city_top").val();
    var message_content = $("#message_content_top").val();
    $.ajax({
      url: "enquiry-us.php",
      type: "POST",
      dataType: "json",
      data: {
        full_name: full_name,
        email: email,
        contact: contact,
        city: city,
        message_content: message_content,
        "g-recaptcha-response": $('textarea[id="g-recaptcha-response"]').val()
      },
      success: function(response) {
        $("#mail-status_top").show();
        $("#loader-icon_top").hide();
        if (response.type == "error") {
          $("#send-message_top").show();
          $("#mail-status_top").attr("class", "error");
          $("#mail-status_top").html(response.text);
        } else if (response.type == "message") {
          $("#send-message_top").hide();
          $("#mail-status_top").attr("class", "success");
          $("#mail-status_top").html(response.text);
          setTimeout(function() {
            document.location = "";
          }, 5000); // redirect after 5 seconds
        }
      },
      error: function() {}
    });
  });
  /* Bottom Form */
  $("#frmContact_bot").on("submit", function(event) {
    event.preventDefault();
    $("#mail-status_bot").hide();
    $("#send-message_bot").hide();
    $("#loader-icon_bot").show();
    var full_name = $("#full_name_bot").val();
    var email = $("#email_bot").val();
    var message_content = $("#message_content_bot").val();
    $.ajax({
      url: "review.php",
      type: "POST",
      dataType: "json",
      data: {
        full_name: full_name,
        email: email,
        message_content: message_content,
        "g-recaptcha-response": $('textarea[id="g-recaptcha-response"]').val()
      },
      success: function(response) {
        $("#mail-status_bot").show();
        $("#loader-icon_bot").hide();
        if (response.type == "error") {
          $("#send-message_bot").show();
          $("#mail-status_bot").attr("class", "error");
          $("#mail-status_bot").html(response.text);
        } else if (response.type == "message") {
          $("#send-message_bot").hide();
          $("#mail-status_bot").attr("class", "success");
          $("#mail-status_bot").html(response.text);
          setTimeout(function() {
            document.location = "";
          }, 5000); // redirect after 5 seconds
        }
      },
      error: function() {}
    });
  });
});
