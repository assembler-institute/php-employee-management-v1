const getJSONData = async () => {
  const url = `../resources/employees.json`;
  try {
    const rawData = await fetch(url);
    const data = await rawData.json();
    return data;
  } catch (error) {
    alert("No database");
  }
};

$("#jsGrid").jsGrid({
  width: "100%",
  height: "600px",
  inserting: true,
  editing: true,
  sorting: true,
  paging: true,
  autoload: true,
  pageSize: 10,
  pageButtonCount: 5,
  deleteConfirm: "Do you really want to delete data?",
  controller: {
    loadData: function (filter) {
      var d = $.Deferred();
      return $.ajax({
        url: "../resources/employees.json",
        type: "GET",
        dataType: "json",
        success: function (data) {
          return d.resolve(data);
        },
      });
    },
    insertItem: async function (item) {
      var d = $.Deferred();
      console.log(item);
      let res = await getJSONData();
      item["id"] = res.length + 1;
      return $.ajax({
        type: "POST",
        url: "../src/library/employeeController.php",
        data: item,
        success: function (data) {
          return d.resolve(data);
        },
      });
    },
    updateItem: function (item) {
      var d = $.Deferred();
      console.log(item);
      return $.ajax({
        type: "PUT",
        url: "../src/library/employeeController.php",
        data: item,
        success: function (data) {
          return d.resolve(data);
        },
      });
    },
    deleteItem: function (item) {
      return $.ajax({
        type: "DELETE",
        url: "./library/employeeController.php",
        data: item,
      }).done(function () {
        console.log("data deleted");
      });
    },
  },
  fields: [
    {
      name: "id",
      title: "ID",
      type: "hidden",
      css: "hide"
    },
    {
      name: "name",
      title: "Name",
      type: "text",
      width: 50,
      validate: "required",
    },
    {
      name: "email",
      title: "Email",
      type: "text",
      width: 80,
      validate: "required",
    },
    {
      name: "age",
      title: "Age",
      type: "number",
      width: 40,
      validate: function (value) {
        if (value > 0) {
          return true;
        }
      },
    },
    {
      name: "postalCode",
      title: "Postal code",
      type: "number",
      width: 40,
    },
    {
      name: "phoneNumber",
      title: "Phone number",
      type: "number",
      width: 60,
    },
    {
      name: "state",
      title: "State",
      type: "text",
      width: 50,
    },
    {
      name: "city",
      title: "City",
      type: "text",
      width: 60,
    },
    {
      name: "streetAddress",
      title: "Street address",
      type: "text",
      width: 40,
    },
    {
      type: "control",
      editButton: true,
      deleteButton: true,
      editButtonTooltip: "Edit",
      deleteButtonTooltip: "Delete",
      updateButtonTooltip: "Update",
      cancelEditButtonTooltip: "Cancel edit",
    },
  ],
});

$("#jsGrid").jsGrid("fieldOption", "id", "visible", false);

let toast = document.getElementById("toast")
if(toast) {
  setTimeout(() => {
    toast.remove()
  }, 3000);
}