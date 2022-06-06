let loginForm = document.getElementById("logoutBtn");

let logoutBtn = document.getElementById("logoutBtn");

logoutBtn.addEventListener("click", () => {
  fetch(
    "http://localhost/employee-management/php-employee-management-v1/src/library/loginController.php"
  );
  // .then((response) => {
  //   return response.json();
  // })
  // .then((data) => {
  //   if (data.loginSuccess) {
  //     location.replace(data.header);
  //   } else {
  //     let $errorMessage = document.getElementById("errorMessage");
  //     $errorMessage.textContent = data.message;
  //   }
  // })
  // .catch((error) => console.error(error));
});

// loginForm.addEventListener("submit", (e) => {
//   e.preventDefault();
//   const formData = new FormData(loginForm);

//   fetch(
//     "http://localhost/employee-management/php-employee-management-v1/src/library/loginController.php",
//     {
//       method: "POST",
//       body: formData,
//     }
//   )
//     .then((response) => {
//       return response.json();
//     })
//     .then((data) => {
//       if (data.loginSuccess) {
//         location.replace(data.header);
//       } else {
//         let $errorMessage = document.getElementById("errorMessage");
//         $errorMessage.textContent = data.message;
//       }
//     })
//     .catch((error) => console.error(error));
// });
