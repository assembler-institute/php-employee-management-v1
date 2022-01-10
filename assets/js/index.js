// var resp = await getJSONData();

$('#grid_table').jsGrid({

  width: "100%",
  height: "600px",
  filtering: true,
  inserting: true,
  editing: true,
  sorting: true,
  paging: true,
  autoload: true,
  pageSize: 10,
  pageButtonCount: 5,
  deleteConfirm: "Do you really want to delete the Client?",

  controller: {
    loadData: function(filter) {
      return $.ajax({
        type: "GET",
        url: "./../resources/employees.json",
        data: filter
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
        url: "./../resources/employees.json",
        data: item
      });
    },
    deleteItem: function(item) {
      return $.ajax({
        type: "DELETE",
        url: "./../resources/employees.json",
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

    // {
    //   name: "gender",
    //   type: "select",
    //   items: [{
    //       Name: "",
    //       Id: ''
    //     },
    //     {
    //       Name: "Male",
    //       Id: 'male'
    //     },
    //     {
    //       Name: "Female",
    //       Id: 'female'
    //     }
    //   ],
    //   valueField: "Id",
    //   textField: "Name",
    //   validate: "required"
    // },
    {
      type: "control"
    }
  ]

});