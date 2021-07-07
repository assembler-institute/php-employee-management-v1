$BASE_URL = "http://localhost/php-employee-management-v1";
function switchRegisterForm() {
  let newUserText = document.getElementById("new__user--text");

  newUserText.addEventListener("click", openNewForm);

  function openNewForm() {
    let registerForm = document.getElementById("register_form");
    let flex_not_flex = registerForm.style.display;

    if ((registerForm.style.display = "none")) {
      registerForm.style.display = "flex";
      newUserText.innerHTML = "Cancel registration";
    }
    if (flex_not_flex === "flex") {
      registerForm.style.display = "none";
      newUserText.innerHTML = "New user, register now?";
    }
    console.log("clickeed");
  }
}

function editEmployee(row) {
  window.location = `${window.location.pathname}/../../src/employee.php?id=${row.item.id}`;
}

function createNewEmployee() {
  window.location = `${window.location.pathname}/../../src/employee.php`;
}

function loadEmployeesList() {
  $.getJSON("../resources/employees.json", function (data) {
    console.log(data);
    $("#employeesList").jsGrid({
      height: "85vh",
      width: "100%",

      editing: false,
      sorting: true,
      paging: true,
      autoload: true,
      pageSize: 15,
      pageButtonCount: 3,
      deleteConfirm: "Do you confirm you want to delete employee?",

      controller: {
        loadData: function () {
          return $.ajax({
            type: "GET",
            url: `${$BASE_URL}/src/library/employeeController.php`,
          });
        },
      },

      fields: [
        {
          name: "name",
          validate: "required",
          title: "Name",
          type: "text",
          align: "",
          width: 150,
        },
        {
          name: "email",
          validate: "required",
          title: "Email",
          type: "text",
          align: "",
          width: 200,
        },
        {
          name: "age",
          validate: function (value) {
            return value > 0;
          },
          title: "Age",
          type: "text",
          align: "",
          width: 50,
        },
        {
          name: "streetAddress",
          title: "Street No.",
          type: "number",
          align: "",
          width: 100,
        },
        { name: "city", title: "City", type: "text", align: "", width: 100 },
        { name: "state", title: "State", type: "text", align: "", width: 50 },
        {
          name: "postalCode",
          title: "Postal Code",
          type: "number",
          align: "",
          width: 100,
        },
        {
          name: "phoneNumber",
          title: "Phone Number",
          type: "number",
          align: "",
          width: 200,
        },
        {
          type: "control",
          modeSwitchButton: false,
          editButton: false,
          headerTemplate: function () {
            return $("<button>")
              .attr("type", "button")
              .attr("class", "jsgrid-button jsgrid-insert-button")
              .on("click", function () {
                createNewEmployee();
              });
          },
          width: 100,
        },
      ],
      rowClick: function (item) {
        editEmployee(item);
      },
    });
  });
}
