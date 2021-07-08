"use strict";
const employeeUrl = "./library/employeeController.php";
let userId;

function setUserId(id) {
  userId = id;
}

$(".needs-validation").on("submit", function (event) {
  event.preventDefault();
  if (event.target.checkValidity()) {
    let updatedEmployee = {};
    let elements = $(event.target).find("input, select");
        elements.each((number, element) => {
          updatedEmployee[element.id] = element.value;
    });
    updatedEmployee['id'] = userId;
    event.target.classList.add("was-validated");

    $.ajax({
        url: employeeUrl,
        method: "UPDATE",
        data: {updatedEmployee: updatedEmployee}
      }).done(_ => {
        $("#responseMsg").text('Employee Update Success').attr('class', 'text-success');
      }).fail(_ => {
        $("#responseMsg").text('Something when wrong').attr('class', 'text-danger');
    });
  }
});



function populateEmployeeForm() {
  $.ajax({
    url: `${employeeUrl}/?id=${userId}`,
    method: "GET",
  })
    .done((employee) => {
      console.log(employee);
      $("#name").val(
        typeof employee.name !== "undefined" ? employee.name : ""
      );
      $("#lastName").val(
        typeof employee.lastName !== "undefined" ? employee.lastName : ""
      );
      $("#email").val(
        typeof employee.email !== "undefined" ? employee.email : ""
      );
      $("#gender").val(
        typeof employee.gender !== "undefined" ? employee.gender : ""
      );
      $("#city").val(typeof employee.city !== "undefined" ? employee.city : "");
      $("#streetAddress").val(
        typeof employee.streetAddress !== "undefined"
          ? employee.streetAddress
          : ""
      );
      $("#state").val(
        typeof employee.state !== "undefined" ? employee.state : ""
      );
      $("#age").val(typeof employee.age !== "undefined" ? employee.age : "");
      $("#postalCode").val(
        typeof employee.postalCode !== "undefined" ? employee.postalCode : ""
      );
      $("#phoneNumber").val(
        typeof employee.phoneNumber !== "undefined" ? employee.phoneNumber : ""
      );
    })
    .fail((response) => {
      //   debugger;
    });
}
