var employees = (function () {
  var json = null;
  $.ajax({
    async: false,
    type: "GET",
    url: "../src/library/employeeController.php",
    dataType: "json",
    success: function (data) {
      json = data;
    },
  });
  return json;
})();

$("#jsGrid").jsGrid({
  width: "80%",
  filtering: true,
  editing: true,
  inserting: true,
  sorting: true,
  paging: true,
  autoload: true,
  pageSize: 15,
  pageButtonCount: 5,
  deleteConfirm: "Do you really want to delete the client?",
  data: employees,

  fields: [
    { name: "id", type: "hidden", visible: false, width: 15 },
    {
      name: "name",
      title: "Name",
      type: "text",
      width: 50,
      align: "center",
      validate: "required",
    },
    {
      name: "email",
      title: "Email",
      type: "text",
      width: 100,
      align: "center",
      validate: "required",
    },
    {
      name: "age",
      title: "Age",
      type: "number",
      width: 30,
      align: "center",
      validate: "required",
    },
    {
      name: "streetAddress",
      title: "Stree No.",
      type: "text",
      width: 50,
      align: "center",
      validate: "required",
    },
    {
      name: "city",
      title: "City",
      type: "text",
      width: 50,
      align: "center",
      validate: "required",
    },
    {
      name: "state",
      title: "State",
      type: "text",
      width: 40,
      align: "center",
      validate: "required",
    },
    {
      name: "postalCode",
      title: "Postal Code",
      type: "number",
      width: 50,
      align: "center",
      validate: "required",
    },
    {
      name: "phoneNumber",
      title: "Phone Number",
      type: "number",
      width: 50,
      align: "center",
      validate: "required",
    },
    { type: "control", editButton: false },
  ],
});
