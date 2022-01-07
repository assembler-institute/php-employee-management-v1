// $("#jsGrid").jsGrid({
//     width: "100%",
//     height: "auto",
    
//     autoload: true,
//     paging: true,
//     pageSize: 10,
//     pageButtonCount: 5,
//     pageIndex: 1,
  
//     controller: {
//       loadData: function(filter) {
//         return $.ajax({
//           url: ".././resources/employees.json",//you can put your url here.
//           dataType: "json"
//         });
//       }
//     },
//     fields: [{
//         name: 'name',
//         title: 'Code',
//         width: 50
//       },{
//         name: "name",
//         title:'name',
//         width: 50
//       }
//     ]
//   });

// $db= $.ajax({
//               url: ".././resources/employees.json",//you can put your url here.
//               dataType: "json"
//             });
// console.log($db)

// $data = "../resources/employess.json"
// console.log($data)
$.ajax({
    url: ".././resources/employees.json",
    success: function(data) {
       $dataEmployee = data
        console.log(data);
        
    }
});
setTimeout(() => {
    
    $("#jsGrid").jsGrid({
        width: "100%",
        height: "400px",
    
        filtering: true,
        editing: true,
        sorting: true,
        paging: true,
        data: $dataEmployee ,
    
        fields: [
            { name: "name", type: "text", width: 150 },
            { name: "lastName", type: "number", width: 50 },
            { name: "email", type: "text", width: 200 },
            // { name: "Country", type: "select", items: db.countries, valueField: "Id", textField: "Name" },
            // { name: "Married", type: "checkbox", title: "Is Married", sorting: false },
            { type: "control" }
        ]
    });
}, 900);