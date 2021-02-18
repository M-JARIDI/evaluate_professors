$(() => {
    // show/hide characters of the password field
    $(".eye").click(() => 
    {
      $pasInp = $("#password");
  
      if ($($pasInp).attr("type") === "text") 
      {
        $($pasInp).attr("type", "password");
        $(".eye").removeClass("fa-eye-slash").addClass("fa-eye");
      } 
      else 
      {
        $($pasInp).attr("type", "text");
        $(".eye").addClass("fa-eye-slash").removeClass("fa-eye");
      }
    });

    // disable/enable submit button according to the state of text field
    $("#text").on('input', () => {
      if($("#text").val() !== "" )
        $("#submitButton").prop("disabled", false);
      else
      $("#submitButton").prop("disabled", true);
    });

    // disable/enable submit button according to password field
    $("#password").on('input', () => {
      if($("#password").val() !== "" )
        $("#submitButton").prop("disabled", false);
      else
      $("#submitButton").prop("disabled", true);
    });

    // slide down elements
    $("document").ready(() => {
      $(".form-card-body").css("display", "none");
      $(".form-card-body").slideDown("slow");

      $("#rates-table").css("display", "none");
      $("#rates-table").slideDown("slow");
      
      $(".card-body").css("display", "none");
      $(".card-body").slideDown("slow");
    });

  });
  