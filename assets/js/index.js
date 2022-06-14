let add= document.getElementById("add");
add.addEventListener("click", addEmployee);
let img=document.createElement("img");
img.className='binImg'
var arrId={};
//trash.addEventListener("click", deleteEmployer);
//$(".trash").on('click', function(event){
 // event.target();
  //event.stopImmediatePropagation();
//  alert("ASD");
//});
/*crear form table, action a employee.php
cambiar name y id de img a button*/
// en js crear request fetch method delete, data:id
//en php recibir el id e ir a eliminarlo
function addEmployee(){
  $("#modalAdd").modal();
  //vaciar inputs en modal
}
function deleteEmployer(){
  console.log("delete");
}
function updateEmployee(){
  var data=event.srcElement.id;
  if( data !== '') {
    console.log(data);

    var url= "../src/library/employeeController.php"
    $.ajax({
      url:url,
      data:{
        'action':'upload',
        'upload':data
      }
    });
  }
}
//if success connection
function success(json) {
  let table=document.querySelector(".table");
  // loop for every employee
  for(let i=0;i<json.length;i++){
    //create elements
    let tr= document.createElement("tr");
    let th= document.createElement("th");
    let td1= document.createElement("td");
    let td2= document.createElement("td");
    let td3= document.createElement("td");
    let td4= document.createElement("td");
    let td5= document.createElement("td");
    let td6= document.createElement("td");
    let td7= document.createElement("td");
    let td8= document.createElement("td");
    let td9= document.createElement("td");
    let td10= document.createElement("td");
    let trash=document.createElement("img");
    let edit=document.createElement("img");
    let buttonTrash = document.createElement("button");
    let buttonEdit = document.createElement("button");
    let form =document.createElement("form");
    //assign attribute to form
    form.setAttribute("action","./library/employeeController.php");
    form.setAttribute("method","POST");
    form.setAttribute("enctype","multipart/form-data");
    //assign attribute to button
    buttonTrash.setAttribute("type", "submit");
    buttonTrash.setAttribute("name", "submitTrash");
    buttonTrash.setAttribute("id",json[i].id);
    buttonTrash.classList.add("buttonTrash");

    buttonEdit.setAttribute("id",json[i].id);
    buttonEdit.setAttribute("type", "submit");
    buttonEdit.setAttribute("name", "submitEdit");
    buttonEdit.classList.add("buttonEdit");
    //assign value to row
    tr.setAttribute("id",json[i].id);
    th.innerHTML=json[i].id;
    td1.innerHTML=json[i].name;
    td2.innerHTML=json[i].lastName;
    td3.innerHTML=json[i].email;
    td4.innerHTML=json[i].gender;
    td5.innerHTML=json[i].city;
    td6.innerHTML=json[i].streetAddress;
    td7.innerHTML=json[i].state;
    td8.innerHTML=json[i].age;
    td9.innerHTML=json[i].postalCode;
    td10.innerHTML=json[i].phoneNumber;
    //assign image url
    trash.setAttribute("src","https://static.vecteezy.com/system/resources/previews/000/649/132/original/vector-trash-icon-symbol-sign.jpg");
    edit.setAttribute("src","https://cdn4.iconfinder.com/data/icons/materia-tools-vol-1/24/023_001_pencil_edit_eraser_kohinor_carandache_tool-512.png");

    /*table.appendChild(form);
    form.appendChild(tr);
    tr.appendChild(th);
    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
    tr.appendChild(td5);
    tr.appendChild(td6);
    tr.appendChild(td7);
    tr.appendChild(td8);
    tr.appendChild(td9);
    tr.appendChild(td10);
    tr.appendChild(buttonTrash);*/
    //create table
    table.appendChild(tr);
    tr.appendChild(th);
    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
    tr.appendChild(td5);
    tr.appendChild(td6);
    tr.appendChild(td7);
    tr.appendChild(td8);
    tr.appendChild(td9);
    tr.appendChild(td10);
    tr.appendChild(buttonTrash);
//create button delete and update
  buttonTrash.appendChild(trash);
    buttonTrash.addEventListener("click",deleteEmployer);
    tr.appendChild(buttonEdit);
    buttonEdit.appendChild(edit);
    buttonEdit.addEventListener("click",updateEmployee);
  }
}
//if fail the connection
function failure(error) {
    //document.getElementById('after').innerHTML = "ERROR: " + error;
    console.log("ERROR: " + error);
}
//connect to employee.json
function myButtonClick() {
    var url    = '../resources/employees.json';
    fetch(url, {
      method: 'POST',
      headers:{
        'Content-Type': 'application/json'
      }
    }).then(res => res.json())
    .then(response => success(response))
    .catch(error => failure(error));
}
  myButtonClick();
