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

let res = await getJSONData();

$("#jsGrid").jsGrid({
  height: "90%",
  width: "100%",

  filtering: true,
  editing: true,
  sorting: true,
  paging: true,
  autoload: true,

  data: res,
  pageSize: 15,
  pageButtonCount: 5,

  deleteConfirm: "Do you really want to delete the client?",

  controller: {
    loadData: function (item) {
      return $.ajax({
        type: "GET",
        url: `../resources/employees.json`,
        data: item,
      });
    },

    insertItem: function (item) {
      return $.ajax({
        type: "POST",
        url: `../resources/employees.json`,
        data: item,
      });
    },

    updateItem: function (item) {
      return $.ajax({
        type: "PUT",
        url: `../resources/employees.json`,
        data: item,
      });
    },

    deleteItem: function (item) {
      return $.ajax({
        type: "DELETE",
        url: `../resources/employees.json`,
        data: item,
      });
    },
  },

  fields: [
    { name: "name", type: "text", width: 150 },
    { name: "email", type: "text", width: 150 },
    { name: "age", type: "number", width: 50 },
    { name: "streetAddress", type: "text", width: 200 },
    { name: "city", type: "text", width: 150 },
    { name: "state", type: "text", width: 50 },
    { name: "postalCode", type: "number", width: 150 },
    { name: "phoneNumber", type: "number", width: 150 },

    { type: "control" },
  ],
});
