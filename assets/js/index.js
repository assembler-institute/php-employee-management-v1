function success(json) {
   // document.getElementById('after').innerHTML = "AFTER: " + JSON.stringify(json);
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
    let img=document.createElement("img");
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
       img.setAttribute("src","https://static.vecteezy.com/system/resources/previews/000/649/132/original/vector-trash-icon-symbol-sign.jpg");
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
    tr.appendChild(img);
   }
  }

  function failure(error) {
    //document.getElementById('after').innerHTML = "ERROR: " + error;
    console.log("ERROR: " + error);
  }
  
  function myButtonClick() {
    var url    = '../resources/employees.json';
    //var before = {foo: 'Hello World!'};
    
   // document.getElementById('before').innerHTML = "BEFORE: " + JSON.stringify(before);
    //console.log("BEFORE: " + JSON.stringify(before));
    
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