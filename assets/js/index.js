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
    loadData: function () {
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
      let d = $.Deferred();
      let res = await getJSONData();
      let newID = res[res.length - 1].id + 1;
      console.log(newID);
      item["id"] = newID;
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
      css: "hide",
    },
    {
      name: "name",
      title: "Name",
      type: "text",
      headercss: "table__header",
      css: "table__row",
      width: 50,
      validate: "required",
    },
    {
      name: "email",
      title: "Email",
      type: "text",
      headercss: "table__header",
      css: "table__row",
      width: 80,
      validate: "required",
    },
    {
      name: "age",
      title: "Age",
      type: "number",
      headercss: "table__header",
      css: "table__row",
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
      headercss: "table__header",
      css: "table__row",
      width: 40,
    },
    {
      name: "phoneNumber",
      title: "Phone number",
      type: "number",
      headercss: "table__header",
      css: "table__row",
      width: 60,
    },
    {
      name: "state",
      title: "State",
      type: "text",
      headercss: "table__header",
      css: "table__row",
      width: 50,
    },
    {
      name: "city",
      title: "City",
      type: "text",
      headercss: "table__header",
      css: "table__row",
      width: 60,
    },
    {
      name: "streetAddress",
      title: "Street address",
      type: "text",
      headercss: "table__header",
      css: "table__row",
      width: 40,
    },
    {
      type: "control",
      headercss: "table__header",
      css: "table__row",
      editButton: true,
      deleteButton: true,
      editButtonTooltip: "Edit",
      deleteButtonTooltip: "Delete",
      updateButtonTooltip: "Update",
      cancelEditButtonTooltip: "Cancel edit",
    },
  ],
  rowClick: function (args) {
    location.href = "./employee.php?employee=" + args.item.id;
  },
  onItemUpdated: function () {
    let toast = document.getElementById("update-toast");
    toast.classList.remove("toast");
    setTimeout(() => {
      toast.classList.add("toast");
    }, 2000);
  },
  onItemDeleted: function () {
    let toast = document.getElementById("delete-toast");
    toast.classList.remove("toast");
    setTimeout(() => {
      toast.classList.add("toast");
    }, 2000);
  },
});

$("#jsGrid").jsGrid("fieldOption", "id", "visible", false);

let toast = document.getElementById("toast");
if (toast) {
  setTimeout(() => {
    toast.remove();
  }, 3000);
}
