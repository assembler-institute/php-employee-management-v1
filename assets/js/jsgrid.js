$("#jsGrid").jsGrid({
  width: "100%",
  height: "400px",
  filtering: true,
  inserting: true,
  editing: true,
  sorting: true,
  paging: true,
  autoload: true,
  pageSize: 10,
  pageButtonCount: 5,
  deleteConfirm: "Do you really want to delete data?",


  controller: {
    loadData: function(filter) {
      // console.log(filter);
      return $.ajax({
        type: "GET",
        url: "../resources/employees.json",
        data: filter,
        dataType: "json"
      });
    },
    insertItem: function (item) {
      var d = $.Deferred();

      $.ajax({
        type: "POST",
        url: "../src/library/employeeController.php",
        data: item,
        success: function (data) {
          console.log(data);
          d.resolve(data);
          // item["id"] = data;
        },
        error: function (xhr, exception) {
          alert("Error: " + xhr + " " + exception);
        },
      });
      $("#jsGrid").jsGrid("render");
      return d.promise();
    },

    //DELETE EMPLOYEE
    deleteItem: function (item) {
      var d = $.Deferred();
      $.ajax({
        type: "DELETE",
        url: "../src/library/employeeController.php",
        data: { id: item.id },
        success: function (data) {
          d.resolve(data);
        },
        error: function (xhr, exception) {
          alert("Error: " + xhr + " " + exception);
        },
      });
      return d.promise();
    },

//UPDATE USER
updateItem: function (item) {
  var d = $.Deferred();
  $.ajax({
    type: "PUT",
    url: "../src/library/employeeController.php",
    data: item,
    success: function (data) {
      console.log(data);
      d.resolve(data);
    },
    error: function (xhr, exception) {
      alert("Error: " + xhr + " " + exception);
    },
  });
  return d.promise();
},


    // updateItem: function(item) {
    //   return $.ajax({
    //     type: "POST",
    //     url: "../resources/employees.json",
    //     data: item
    //   });
    // },
    // deleteItem: function(item) {
    //   return $.ajax({
    //     type: "DELETE",
    //     url: "../resources/employees.json",
    //     data: item
    //   });
    // },
  },


  // fields: [
  //   { name: "id", title: "id" },
  //   {
  //     name: "name",
  //     type: "text",
  //     width: 100,
  //     title: "Name",
  //     validate: "required",
  //   },
  //   {
  //     name: "email",
  //     type: "text",
  //     width: 150,
  //     title: "Email",
  //     validate: {
  //       validator: "pattern",
  //       message: "Invalid Email",
  //       param:
  //         "^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:.[a-zA-Z0-9-]+)*$",
  //     },
  //   },
  //   {
  //     name: "age",
  //     type: "number",
  //     width: 50,
  //     title: "Age",
  //     validate: {
  //       validator: "range",
  //       message: function (value, item) {
  //         return (
  //           'The client age should be between 18 and 99. Entered age is "' +
  //           value +
  //           '" is out of specified range.'
  //         );
  //       },
  //       param: [18, 99],
  //     },
  //   },
  //   {
  //     name: "streetAddress",
  //     type: "number",
  //     width: 60,
  //     title: "Street No.",
  //     validate: "required",
  //   },
  //   {
  //     name: "city",
  //     type: "text",
  //     width: 100,
  //     title: "City",
  //     validate: "required",
  //   },
  //   {
  //     name: "state",
  //     type: "text",
  //     width: 50,
  //     title: "State",
  //     validate: "required",
  //   },
  //   {
  //     name: "postalCode",
  //     type: "number",
  //     width: 50,
  //     title: "Postal Code",
  //     validate: "required",
  //   },
  //   {
  //     name: "phoneNumber",
  //     type: "number",
  //     width: 65,
  //     title: "Phone Number",
  //     validate: "required",
  //   },
  //   { type: "control" },
  // ],






  fields: [{
      name: "id",
      type: "text",
      css: "hide"
    },
    {
      name: "name",
      title: "Name",
      type: "text",
      width: 150,
      validate: "required"
    },
    {
      name: "email",
      title: "Email",
      type: "text",
      width: 150,
      // validate: "required"
    },
    {
      name: "age",
      title: "Age",
      type: "text",
      width: 50,
      validate: function(value) {
        if (value > 0) {
          return true;
        }
      }
    },
    {
      id: "",
      name: "streetAddress",
      title: "Street Nº",
      type: "text",
      width: 150,
      // validate: "required"
    },
    {
      name: "city",
      title: "City",
      type: "text",
      width: 150,
      // validate: "required"
    },
    {
      name: "state",
      title: "State",
      type: "text",
      width: 150,
      // validate: "required"
    },
    {
      name: "postalCode",
      title: "Postal Code",
      type: "text",
      width: 150,
      // validate: "required"
    },
    {
      name: "phoneNumber",
      title: "Phone Nº",
      type: "text",
      width: 150,
      // validate: "required"
    },

    // {
    //   name: "gender",
    //   type: "select",
    //   items: [{
    //       Name: "",
    //       Id: ""
    //     },
    //     {
    //       Name: "Male",
    //       Id: "man"
    //     },
    //     {
    //       Name: "Female",
    //       Id: "woman"
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
})