let loginForm = document.getElementById("loginForm");

// window.onload = () => {
//   checkSession();
// };

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

// const checkSession = () => {
//   const request = { session: "index" };
//   fetch(
//     "http://localhost/employee-management/php-employee-management-v1/src/library/loginController.php",
//     {
//       method: "POST",
//       body: JSON.stringify(request),
//       headers: {
//         "Content-Type": "application/json",
//       },
//     }
//   )
//     .then((response) => {
//       return response.json();
//     })
//     .then((data) => {
//       if (data.loginSuccess) {
//         let $errorMessage = document.getElementById("errorMessage");
//         $errorMessage.textContent = data.header;
//       } else {
//         let $errorMessage = document.getElementById("errorMessage");
//         $errorMessage.textContent = data.message;
//       }
//     })
//     .catch((error) => console.error(error));
// };
