var a
var alerstDiv =document.getElementById("alerts");
window.addEventListener('DOMContentLoaded', async () => {
   a=await empleados()
   $("#Grid").jsGrid({
    width:"100%",
    height:"auto",

    editing:true,
    sorting:true,
    inserting:true,
    paging:true,
    pageSize:15,
    pageButtonCount:3,

    data:a,

fields: [
    { name: "name", type: "text", title: "Name" },
    { name: "lastName", type: "text", title: "lastName" },
    { name: "age", type: "number", title: "Age" },
    { name: "email", type: "text", title: "Email" },
    { name: "city", type: "text", title: "City" },
    { name: "gender", type: "text", title: "gender" },
    { type: "control",rowClick:true, modeSwitchButton: true, editButton: true },
  ],

  rowClick: function name(item) {
    window.location.assign("./employee.php?id="+item.item.id)
   },
   onItemInserted: function name(args) {
    $.ajax({
        method: 'POST',
        url: './library/employeeController.php?add',
        data: args.item,
        success: function (pi) {
              alertas("se a creado correctamente");
        }
    }); 
  },

controller: {   
    deleteItem: async function name(item) {
      const response = await fetch('./library/employeeController.php?delete='+item.id,
      { method: 'DELETE'});
        const data =  await response.json();
        if(data==true){
          alertas("se a borrado correctamente");
        }
    },

    updateItem: async function name(item) {
      var formData = new FormData();
      formData.append('id', item.id);
      formData.append('name', item.name);
      formData.append('lastName', item.lastName);
      formData.append('email', item.email);
      formData.append('age', item.age);
      formData.append('gender', item.gender);
      formData.append('city', item.city);
      formData.append('state', item.state);
      formData.append('streetAddress', item.streetAddress);
      formData.append('phoneNumber', item.phoneNumber);
      formData.append('postalCode', item.postalCode);
      const response = await fetch('./library/employeeController.php?edit='+item.id,
      { method: 'POST', body :formData});
      const data =  await response.json();
      if(data==true)
      {
        alertas("se a cambiado correctamente!");
      }
      else alertas("email no valido");
      
    },
    
  },
})


    
})






async function empleados(){
  const response = await fetch("./library/employeeController.php?employees")
  const data = await response.json()
  return data
}

async function eliminarEmpleados(id) {
    const response = await fetch(
        './library/employeeController.php?delete=' + id,
        {
            method: 'POST',
            body: a
        }
    );
    const data = await response.json();
    return data;
}

async function eliminarEmpleados(conte) {
    const response = await fetch('./library/employeeController.php?post=', {
        method: 'POST',
        body: a
    });
    const data = await response.json();
    return data;
}


setInterval(async () => {
  const response = await fetch("./library/sessionHelper.php")
  const data = await response.json()
  if(data==true){
    window.location.reload();
  }
}, 1000);


function alertas(str){
  setTimeout(()=>{
    alerstDiv.innerText=str;
    alerstDiv.style.visibility='visible';
    setTimeout(()=>{
      alerstDiv.style.visibility='hidden';
    },3000)},500)
}
