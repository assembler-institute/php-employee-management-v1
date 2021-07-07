const employeeUrl = "../../src/library/employeeController.php";

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  "use strict";

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll(".needs-validation");

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener(
      "submit",
      function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add("was-validated");
      },
      false
    );
  });
})();

function populateEmployeeForm(id) {
  $.ajax({
    url: `${employeeUrl}/?id=${id}`,
    method: "GET",
  })
    .done((employee) => {
      console.log(employee);
      $("#firstName").val(
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
      $("#navEmployee").removeClass("text-secondary").addClass("text-white");
      $("#navDashboard").addClass("text-secondary").removeClass("text-white");
    })
    .fail((response) => {
      //   debugger;
      const errorModal = new bootstrap.Modal(
        document.getElementById("errorModal"),
        {
          keyboard: false,
        }
      );
      errorModal.show();
    });
}
