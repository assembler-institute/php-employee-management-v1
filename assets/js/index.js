

var tabla = document.getElementById("Grid");
var newData
async function rellenar(){
    await fetch("../resources/employees.json")
      .then(response => response.json())
      .then(data =>{
        console.log(data);
        newData=data
      });
}
var but=document.createElement("button");
but.innerText="e";
var del=document.createElement("button");
del.innerText="d";

new gridjs.Grid({
    columns: ["Id","Name","Last Name", "Email","Gender","City","Street Address","State","Age","Postal Code" ,"Phone Number","edit","delete"],
    server: {
        url: "../resources/employees.json",
        then: data => data.map(card => [card.id, card.name, card.lastName,card.email,card.gender,card.city,card.streetAddress,card.state,card.age,card.postalCode,card.phoneNumber,but,del])
      } 
}).render(tabla)






