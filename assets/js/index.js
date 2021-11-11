/* var employees = (function () {
  var json = null;
  $.ajax({
    async: false,
    type: "GET",
    url: "../src/library/employeeManager.php",
    dataType: "json",
    success: function (data) {
      console.log(data);
      json = data;
    },
  });
  return json;
})();
 */

/* function jsonToFormData(item) {
  var formData = new FormData();
  for (const value in item) {
    formData.append(value, item[value]);
    console.log(item[value]);
  }
  return formData;
} */

$("#employees").jsGrid({
  width: "80%",

  filtering: true,
  editing: false,
  inserting: true,
  sorting: true,
  paging: true,
  autoload: true,

  pageSize: 15,
  pageButtonCount: 5,

  deleteConfirm: "Do you really want to delete the client?",
  //data: employees,

  controller: {
    loadData: function () {
      var d = $.Deferred();

      $.ajax({
        url: "../resources/employees.json",
        dataType: "json",
        success: function (data) {
          d.resolve(data);
        },
        error: function (xhr, exception) {
          alert("Error: " + xhr + " " + exception);
        },
      });

      return d.promise();
    },
    insertItem: function (item) {
      var d = $.Deferred();

      $.ajax({
        type: "POST",
        url: "../src/library/employeeController.php",
        data: item,
        success: function (data) {
            console.log('yes');
          d.resolve(data);
        },
        error: function (xhr, exception) {
          alert("Error: " + xhr + " " + exception);
        },
      });

      return d.promise();
    },
  },

  fields: [
    { name: "name", type: "text", width: 100, title: "Name" },
    { name: "email", type: "text", width: 150, title: "Email" },
    { name: "age", type: "text", width: 30, title: "Age" },
    { name: "streetAddress", type: "number", width: 60, title: "Street No." },
    { name: "city", type: "text", width: 100, title: "City" },
    { name: "state", type: "text", width: 50, title: "State" },
    { name: "postalCode", type: "number", width: 50, title: "Postal Code" },
    { name: "phoneNumber", type: "number", width: 65, title: "Phone Number" },
    { type: "control" },
  ],
});
