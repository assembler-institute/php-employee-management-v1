const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const id = urlParams.get("id");

if (id) {
  $.ajax({
    type: "GET",
    url: "../src/library/employeeController.php?id=" + id,
    success: function (data) {
      employee = JSON.parse(data);
      console.log(employee);

      employee.id
        ? (document.querySelector("#id-user").value = employee.id)
        : "";
      employee.name
        ? (document.querySelector("#name").value = employee.name)
        : "";
      employee.lastName
        ? (document.querySelector("#lastname").value = employee.lastName)
        : "";
      employee.email
        ? (document.querySelector("#email").value = employee.email)
        : "";
      employee.gender == "man"
        ? (document.querySelector("#gender-male").checked = true)
        : (document.querySelector("#gender-female").checked = true);
      employee.city
        ? (document.querySelector("#city").value = employee.city)
        : "";
      employee.streetAddress
        ? (document.querySelector("#street").value = employee.streetAddress)
        : "";
      employee.state
        ? (document.querySelector("#state").value = employee.state)
        : "";
      employee.age ? (document.querySelector("#age").value = employee.age) : "";
      employee.postalCode
        ? (document.querySelector("#cp").value = employee.postalCode)
        : "";
      employee.phoneNumber
        ? (document.querySelector("#phone").value = employee.phoneNumber)
        : "";
    },
    error: function (xhr, exception) {
      alert("Error: " + xhr + " " + exception);
    },
  });
}
