var inputId=document.getElementById("inputId").value;
var inputName=document.getElementById("inputName")
var inputlLastName=document.getElementById("inputLastName").innerText;
var inputEmail=document.getElementById("inputEmail").innerText;
var inputGender=document.getElementById("inputGender").innerText;
var inputCity=document.getElementById("inputCity").innerText;
var inputStreetAddress=document.getElementById("inputStreetAddress").innerText;
var inputState=document.getElementById("inputState").innerText;
var inputAge=document.getElementById("inputAge").innerText;
var inputPostalCode=document.getElementById("inputPostalCode").innerText;
var inputNumber=document.getElementById("inputNumber").innerText;
var btn=document.getElementById("btn")

// btn.addEventListener("click",()=>{
  
//     var item={
//         "id":inputId,
//         "name":inputName,
//         "lastName":inputlLastName,
//        "email":inputEmail,
//        "age":inputAge,
//        "gender":inputGender,
//        "city":inputCity,
//        "state":inputState,
//        "streetAddress":inputStreetAddress,
//        "phoneNumber":inputNumber,
//        "postalCode":inputPostalCode
//    };
//    console.log(inputName);
//    if(inputId>0){
//         // editando(item)
//     }
//     // else addEmployee(item)
    
    
// });



function addEmployee(item){
    $.ajax({
        method: 'POST',
        url: './library/employeeController.php?add',
        data: item,
        success: function (pi) {
            //   alertas("se a creado correctamente");
        }
    }); 
}
async function editando(item){
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
    // if(data==true)
    // {
    //   alertas("se a cambiado correctamente!");
    // }
    // else alertas("email no valido");
}

setInterval(async () => {
    const response = await fetch("./library/sessionHelper.php")
    const data = await response.json()
    if(data==true){
      window.location.reload();
    }
  }, 1000);
  

  function volver(){
    window.location.replace("./dashboard.php")
  }
  function alertas(str){
    setTimeout(()=>{
      alerstDiv.innerText=str;
      alerstDiv.style.visibility='visible';
      setTimeout(()=>{
        alerstDiv.style.visibility='hidden';
      },3000)},500)
  }
  

function alertas(str){
  setTimeout(()=>{
    alerstDiv.innerText=str;
    alerstDiv.style.visibility='visible';
    setTimeout(()=>{
      alerstDiv.style.visibility='hidden';
    },3000)},500)
}
  

