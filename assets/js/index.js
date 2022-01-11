var a
window.addEventListener('DOMContentLoaded', async () => {
   a=await empleados()
   $("#Grid").jsGrid({
    width:"100%",
    height:"auto",

    editing:true,
    sorting:true,
    inserting:true,
    paging:true,

    pageSize:10,
    pageButtonCount:3,// numero de paginas que veras

    data:a,

fields: [
    { name: "id", css: "hide", width: 0 },
    { name: "name", type: "text", title: "Name" },
    { name: "email", type: "text", title: "Email" },
    { name: "age", type: "number", title: "Age" },
    { name: "streetAddress", type: "number", title: "Street No." },
    { name: "city", type: "text", title: "City" },
    { name: "state", type: "text", title: "State" },
    { name: "postalCode", type: "number", title: "Postal Code" },
    { name: "phoneNumber", type: "number", title: "Phone Number" },
    { type: "control", modeSwitchButton: true, editButton: true },
  ],
controller: {
    insertItem:  function name(item) {
      
    },

    deleteItem: function name(item) {

    },

    updateItem: function name(item) {
    },

  },
})


    
})






async function empleados(){
  const response = await fetch("./library/employeeController.php?employees")
  const data = await response.json()
  return data
}

async function eliminarEmpleados(id){
  const response = await fetch("./library/employeeController.php?delete="+id,{
    method: 'POST',
    body:a
  })
  const data = await response.json()
  return data
}

async function eliminarEmpleados(conte){
  const response = await fetch("./library/employeeController.php?post=",{
    method: 'POST',
    body:a
  })
  const data = await response.json()
  return data
}