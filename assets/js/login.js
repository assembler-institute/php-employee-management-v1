//password
$("#formlogin").submit(function (e) {
  e.preventDefault();
  const postData = {
    email: $("#email").val(),
    password: $("#password").val(),
  };

  $.post("./src/library/loginController.php", postData, function (response) {
    switch (response) {
      case "Login ok":
        location.href = "./src/dashboard.php";
        break;
      case "Invalid password":
        $("#login-error").html("Invalid password");
        break;
      case "User not found":
        $("#login-error").html("User not found");
        break;
      case "hola":
        $("#login-error").html("hola");
        break;
      default:
        $("#login-error").html("Please, Login");
        break;
    }
  });
});
