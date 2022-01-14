// var resp = await getJSONData();

$('#grid_table').jsGrid({

  width: "100%",
  height: "600px",
  filtering: false,
  inserting: true,
  editing: true,
  sorting: true,
  paging: true,
  autoload: true,
  pageSize: 10,
  pageButtonCount: 5,
  deleteConfirm: "Do you really want to delete the Client?",

  rowClick: function(args){
    console.log(args);
    $idValue = args["item"].id;
    console.log($idValue);
    window.location.assign("./../src/employee.php?id=" + $idValue);
  },

  controller: {
    loadData: function(filter) {
      return $.ajax({
        type: "GET",
        url: "../src/library/employeeController.php",
        data: filter,
        dataType: "JSON"
        // success: function(response){
        //   console.log("GET: ", response);
        // }
      });
    },
    insertItem: function(item) {
      return $.ajax({
        type: "POST",
        url: "../src/library/employeeController.php",
        data: item
      });
    },
    updateItem: function(item) {
      return $.ajax({
        type: "PUT",
        url: "../src/library/employeeController.php",
        data: item
      });
    },
    deleteItem: function(item) {
      return $.ajax({
        type: "DELETE",
        url: "../src/library/employeeController.php",
        data: item
      });
    },
  },
  fields: [{
      name: "id",
      type: "hidden",
      css: 'hide'
    },
    {
      name: "name",
      type: "text",
      width: 150,
      validate: "required"
    },
    {
      name: "email",
      type: "text",
      width: 150,
      validate: "required"
    },
    {
      name: "age",
      type: "text",
      width: 50,
      validate: function(value) {
        if (value > 0) {
          return true;
        }
      }
    },
    {
      name: "streetAddress",
      type: "text",
      width: 70,
      validate: "required"
    },
    {
      name: "city",
      type: "text",
      width: 150,
      validate: "required"
    },
    {
      name: "state",
      type: "text",
      width: 80,
      validate: "required"
    },
    {
      name: "postalCode",
      type: "text",
      width: 70,
      validate: "required"
    },
    {
      name: "phoneNumber",
      type: "text",
      width: 150,
      validate: "required"
    },
    {
      type: "control"
    }
  ]

});

/*--CHANGE THE HEADER---*/
let url = window.location.href;

const tabs = ["dashboard", "employee"];

tabs.forEach(e => {
  if (url.indexOf(e + ".php") !== -1) {
    setActive("tab-" + e); //usamos el id que esta en el dashboard
  }
});
function setActive(id){
  document.getElementById(id).style.fontWeight = "bold";
};