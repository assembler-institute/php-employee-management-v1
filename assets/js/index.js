$("#login").submit(function(e){
  e.preventDefault();

  const data = {
    username: $("#username").val(),
    password: $("#password").val()
  }
console.log(data);

$.ajax ({
  url: "./src/library/loginManager.php",
  type: "POST",
  data: data,
  success: function(response) {
    console.log(response); //recibe Login Ok from auth().

    switch (response) {
      case "Login Ok":
        location.href = "./src/dashboard.php";

        break;

      case "Invalid Password":
        // alert("Invalid Password")

        $("#error").toggleClass("d-block");
        $("#error").html("Invalid password. Please, try again.");

        setTimeout(() => {
          $("#error").removeClass("d-block");
        }, 5000);

        break;

      case "User Not Found":
        // alert("User Not Found")
        // $("#error").html("User not found. Please, try again.");
        $("#error").toggleClass("d-block");
        $("#error").html("User not found. Please, try again.");

        setTimeout(() => {
          $("#error").removeClass("d-block");
        }, 5000);


      default:
        break;
    }
  }
})



// $.post("./src/library/loginManager.php", data, function (response) {

//   console.log(response)
  
  // switch (response) {
  
  // case "Login Ok":
  
  // location.href = "./src/dashboard.php";
  
  // break;
  
  
  
  // default:
  
  // break;
  
  // }
  
  
  
  })



// console.log("funciona kike");
// function removeLabel () {
//   $(logoutLabel) = document.getElementById("logoutLabel");
//   setTimeout(() => {
//     $(logoutLabel).addClass("display:none")
//   }, 2000);
// }
// removeLabel();
