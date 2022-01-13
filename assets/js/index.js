let add= document.getElementById("add");
add.addEventListener("click", addEmployee);
let img=document.createElement("img");
img.className='binImg'

//trash.addEventListener("click", deleteEmployer);
//$(".trash").on('click', function(event){
 // event.target();
  //event.stopImmediatePropagation();
//  alert("ASD");
//});
function addEmployee(){
  $("#modalAdd").modal();
  //vaciar inputs en modal
}
function deleteEmployer(){
alert("ASD");
}
function success(json) {
  let table=document.querySelector(".table");

  for(let i=0;i<json.length;i++){
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
    let buttonTrash = document.createElement("button");
    let buttonEdit = document.createElement("button");
    buttonTrash.setAttribute("type", "submit");
    buttonTrash.setAttribute("name", "submitTrash");
    buttonTrash.classList.add("buttonTrash");
    let trash=document.createElement("img");
    buttonEdit.setAttribute("type", "submit");
    buttonEdit.setAttribute("name", "submitEdit");
    buttonEdit.classList.add("buttonEdit");
    let edit=document.createElement("img");

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
    trash.setAttribute("src","https://static.vecteezy.com/system/resources/previews/000/649/132/original/vector-trash-icon-symbol-sign.jpg");
    edit.setAttribute("src","https://cdn4.iconfinder.com/data/icons/materia-tools-vol-1/24/023_001_pencil_edit_eraser_kohinor_carandache_tool-512.png");
    trash.setAttribute("id",json[i].id);
    edit.setAttribute("id",json[i].id);
    trash.setAttribute("class","trash");
    edit.setAttribute("class","edit");
    trash.setAttribute("name","delete");

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
    buttonTrash.appendChild(trash);
    tr.appendChild(buttonEdit);
    buttonEdit.appendChild(edit);
  }
}


function failure(error) {
    //document.getElementById('after').innerHTML = "ERROR: " + error;
    console.log("ERROR: " + error);
}

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

  let buttonTrashSelect = document.getElementsByClassName("buttonTrash");
  let buttonEditSelect = document.getElementsByClassName("buttonEdit");
  console.log(buttonTrashSelect[0])
  console.log(buttonEditSelect)
for (let i = 0; i < buttonTrashSelect.length; i++) {
  buttonTrashSelect[i].addEventListener("click",deleteEmployer);
}
for (let i = 0; i < buttonEditSelect.length; i++) {
  buttonEditSelect[i].addEventListener("click",deleteEmployer);
}