// Setting a JS Grid with the response
$("#jsGrid").jsGrid({
  height: "100%",
  width: "100%",

  autoload: true,
  inserting: true,
  sorting: true,
  paging: true,
  pageSize: 10,
  pageIndex: 1,

  // Redirect to employee's page
  rowClick: function (args) {
    internalRowClick(args);
  },

  // Events on jsGrid
  controller: {
    loadData: function (filter) {
      return $.ajax({
        url: "./library/employeeController.php",
        type: "GET",
        data: filter,
        success: function (resp) {
          console.log("GET: ", resp);
        },
      });
    },
    insertItem: function (item) {
      return $.ajax({
        url: "./library/employeeController.php",
        type: "POST",
        data: {
          newEmployee: item,
        },
        success: function (resp) {
          console.log("POST: ", resp);
          $("#jsGrid").jsGrid("loadData");
          $("#postAlert").toggleClass("show d-none");
          setTimeout(() => $("#postAlert").toggleClass("show"), 3000);
        },
      });
    },
    deleteItem: function (item) {
      internalDeleteItem(item);
    },
  },

  fields: [
    {
      title: "Name",
      name: "name",
      type: "text",
      width: 30,
    },
    {
      title: "Email",
      name: "email",
      type: "text",
      width: 60,
    },
    {
      title: "Age",
      name: "age",
      type: "number",
      width: 20,
    },
    {
      title: "St. Num.",
      name: "streetAddress",
      type: "number",
      width: 20,
    },
    {
      title: "City",
      name: "city",
      type: "text",
      width: 35,
    },
    {
      title: "State",
      name: "state",
      type: "text",
      width: 20,
    },
    {
      title: "Postal code",
      name: "postalCode",
      type: "number",
      width: 30,
    },
    {
      title: "Phone",
      name: "phoneNumber",
      type: "number",
      width: 40,
    },
    {
      type: "control",
      width: 20,
      editButton: false,
    },
  ],
});

// ----------------
// JsGrid functions
// ----------------
// Row click
function internalRowClick(args) {
  employeeRowId = args.item.id;
  $("#dashboardLink").toggleClass("active");
  $("#employeeLink").addClass("active");
  $.ajax({
    url: "./library/employeeController.php",
    type: "GET",
    data: {
      employeeRowId: employeeRowId,
    },
    success: function (response) {
      console.log(response);
      document.location = "./employee.php";
    },
  });
}

//Controller functions
// GET
// function internalLoadData(filter) {
//   return $.ajax({
//     url: "./library/employeeController.php",
//     type: "GET",
//     data: filter,
//     success: function (resp) {
//       console.log("GET: ", resp);
//     },
//   });
// }

// POST
// function internalinsertItem(item) {
//   return $.ajax({
//     url: "./library/employeeController.php",
//     type: "POST",
//     data: {
//       newEmployee: item,
//     },
//     success: function (resp) {
//       console.log("POST: ", resp);
//       $("#jsGrid").jsGrid("loadData");
//       $("#postAlert").toggleClass("show d-none");
//       setTimeout(() => $("#postAlert").toggleClass("show"), 3000);
//     },
//   });
// }

// DELETE
function internalDeleteItem(item) {
  return $.ajax({
    type: "DELETE",
    url: "./library/employeeController.php",
    data: {
      deletedID: item.id,
    },
    success: function (resp) {
      console.log("DELETE: ", resp);
      $("#deleteAlert").toggleClass("show d-none");
      setTimeout(() => $("#deleteAlert").toggleClass("show"), 3000);
    },
  });
}
