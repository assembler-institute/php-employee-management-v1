$('#grid_table').jsGrid({

  width: "100%",
  height: "600px",

  filtering: true,
  inserting:true,
  editing: true,
  sorting: true,
  paging: true,
  autoload: true,
  pageSize: 10,
  pageButtonCount: 5,
  deleteConfirm: "Do you really want to delete data?",

  controller: {
   loadData: function(filter){
    return $.ajax({
     type: "GET",
     url: "fetch_data.php",
     data: filter
    });
   },
   insertItem: function(item){
    return $.ajax({
     type: "POST",
     url: "fetch_data.php",
     data:item
    });
   },
   updateItem: function(item){
    return $.ajax({
     type: "PUT",
     url: "fetch_data.php",
     data: item
    });
   },
   deleteItem: function(item){
    return $.ajax({
     type: "DELETE",
     url: "fetch_data.php",
     data: item
    });
   },
  },

  fields: [
   {
    name: "id",
 type: "hidden",
 css: 'hide'
   },
   {
    name: "first_name", 
 type: "text", 
 width: 150, 
 validate: "required"
   },
   {
    name: "last_name", 
 type: "text", 
 width: 150, 
 validate: "required"
   },
   {
    name: "age", 
 type: "text", 
 width: 50, 
 validate: function(value)
 {
  if(value > 0)
  {
   return true;
  }
 }
   },
   {
    name: "gender", 
 type: "select", 
 items: [
  { Name: "", Id: '' },
  { Name: "Male", Id: 'male' },
  { Name: "Female", Id: 'female' }
 ], 
 valueField: "Id", 
 textField: "Name", 
 validate: "required"
   },
   {
    type: "control"
   }
  ]

 });