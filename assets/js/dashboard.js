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

  fields: [{
    title: "Name",
    name: "name",
    type: "text",
    width: 30,
    validate:[
        "required",
        {
        validator:"maxLength",
        message:function(value,item){
            return "Name should be les than ten caracters";
            },
        param:[10]
        }]

},
{
    title: "Email",
    name: "email",
    type: "text",
    width: 60,
    validate:[
        "required",
        {
        validator:"pattern",
        message:function(value,item){
            return "Write your email correctly, som like: test@gmail.com"
        },
        param:/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/
    }]
  

},
{
    title: "Age",
    name: "age",
    type: "number",
    width: 20,
    validate:[
        "required",
        {
        validator:"range",
        message:function(value,item){
            return "Not legal age to work";
        },
        param:[18,65]
    }]
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
    validate:[
        "required",
        {
        validator:"range",
        message:function(value,item){
            return "The phone number have nine caracters and start by 6";
        },
        param:[600000000,699999999]
        
    }]
},
{
    type: "control",
    width: 20,
    editButton: false,
}

]
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
