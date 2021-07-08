$("#employeeForm").submit((e) => {
  e.preventDefault();
  const item = {
    id: "",
    name: $("#newName").val(),
    lastName: $("#newLastName").val(),
    email: $("#newEmail").val(),
    gender: $("#genderSelect").val(),
    city: $("#newCity").val(),
    streetAddress: $("#newStreetAdress").val(),
    state: $("#newState").val(),
    age: $("#newAge").val(),
    postalCode: $("#newPostalCode").val(),
    phoneNumber: $("#newPhone").val(),
  };

  // Make POST or PUT ajax requests
  if ($("#employeeForm").attr("method") == "POST") {
    formAddEmployee(item);
  } else {
    formUpdateEmployee(item);
  }
});

// Ajax requests
function formAddEmployee(item) {
  $.ajax({
    type: "POST",
    url: "./library/employeeController.php",
    data: {
      newEmployee: item,
    },
    success: function (resp) {
      console.log("Added employee", resp);
      $("#submitButton").attr("disabled", true);
      $("#postAlert").toggleClass("show d-none");
      setTimeout(() => $("#postAlert").toggleClass("show"), 3000);
    },
  });
}

function formUpdateEmployee(item) {
  $.ajax({
    type: "PUT",
    url: "./library/employeeController.php",
    data: {
      updatedEmployee: item,
    },
    success: function (resp) {
      console.log("Updated employee", resp);
      $("#putAlert").toggleClass("show d-none");
      setTimeout(() => $("#putAlert").toggleClass("show"), 3000);
    },
  });
}

// Back to dashboard
$("#backButton").on("click", function () {
  document.location = "./dashboard.php";
});
