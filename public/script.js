$(() => {
    $(".eye").click(() => {
      $pasInp = $("#password");
  
      if ($($pasInp).attr("type") === "text") {
        $($pasInp).attr("type", "password");
        $(".eye").removeClass("fa-eye-slash").addClass("fa-eye");
      } else {
        $($pasInp).attr("type", "text");
        $(".eye").addClass("fa-eye-slash").removeClass("fa-eye");
      }
    });
  });
  