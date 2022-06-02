let loginForm = document.getElementById("loginForm");

loginForm.addEventListener("submit", (e) => {
  e.preventDefault();
  const formData = new FormData(loginForm);
  fetch(
    "http://localhost/employee-management/php-employee-management-v1/src/library/loginManager.php",
    {
      method: "POST",
      body: formData,
    }
  )
    .then((response) => {
      return response.json();
    })
    .then((data) => {
      console.log(data);
    })
    .catch((error) => console.error(error));
});
