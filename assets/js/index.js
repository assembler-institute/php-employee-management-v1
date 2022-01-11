
const addNewEmployee = document.querySelector("#btn-add-employee");
const employeeTable = document.querySelector("#employees-table");
addNewEmployee.addEventListener("click", createRow);

function createRow(){

    const row = document.createElement("div");
    row.innerHTML = `
    <form action="" method="post" id="form1">
    <input type="text" name="name" placeholder = "name" class="form-control">
    <input type="text" name="email" placeholder = "email"class="form-control">
    <input type="number" name="age" placeholder = "age"class="form-control">
    <input type="number" name="streetNumber" placeholder = "Street Number"class="form-control">
    <input type="text" name="city" placeholder = "City"class="form-control">
    <input type="text" name="state" placeholder = "State"class="form-control">
    <input type="number" name="postalCode" placeholder = "Postal Code"class="form-control">
    <input type="number" name="postalCode" placeholder = "Postal Code"class="form-control">

      <a id="btn-cancel"class="btn btn-secondary btn-sm " href="#"><i class="fas fa-window-close"></i></a>
      <input type="submit" id="btn-success"class="btn btn-success btn-sm"><i class="fas fa-check"></i></input>
    
    </form>`
    document.querySelector("nav").insertAdjacentElement("afterend", row);
    // const btnSuccess = document.querySelector("#btn-success");
    // btnSuccess.addEventListener("click", submitNewEmployee);
    let formulariop = document.querySelector("#form1");
    formulariop.addEventListener("submit", (e)=>{
        e.preventDefault();
        const datas = new FormData(formulariop);
        console.log(datas.get("name"));
        var url = "../src/library/employeeController.php";
      const datas2 = {
        name:"john",
      }



        fetch(url, {
          body: JSON.stringify(datas),
          cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
          credentials: 'same-origin', // include, same-origin, *omit
          headers: {
            'user-agent': 'Mozilla/4.0 MDN Example',
            'content-type': 'application/json'
          },
          method: 'POST', // *GET, POST, PUT, DELETE, etc.
          mode: 'cors', // no-cors, cors, *same-origin
          redirect: 'follow', // manual, *follow, error
          referrer: 'no-referrer', // *client, no-referrer
        })
        .then(response => response.json())
})
}



// fetch(url,{
//   method:"post",
//   mode:"same-origin",
//   credentials: "same-origin",
//   headers: {
//     "Content-Type": "application/json"
//   },
//   body:JSON.stringify(datas)
// })
// .then(res => res.json())
// .then(res =>{
//  console.log("success", res);
// })
// //  .catch(function(error){
// //      console.log("error",error)
// //  })
//    })






// function submitNewEmployee(){
    
//     //var myHeaders = new Headers();
//     //myHeaders.append("Content-Type", "application/json");
//     const data = new FormData (document.getElementById(form1))
//     //console.log (data);
//     var newEmployeeData = JSON.stringify({
//         "name": "hola",
//         //"name": document.querySelector("input[name='name']"),
//         "email": document.querySelector("input[name='email']"),
//         "age": document.querySelector("input[name='age']"),
//         "streetNumber": document.querySelector("input[name='streetNumber']"),
//         "city": document.querySelector("input[name='city']"),
//         "state": document.querySelector("input[name='state']"),
//         "postalCode": document.querySelector("input[name='postalCode']"),
//         "phoneNumber": document.querySelector("input[name='phoneNumber']"),
//       });
      
//       var requestOptions = {
//         method: 'POST',
//         headers: myHeaders,
//         body: newEmployeeData,
//         redirect: 'follow'
//       };

//     fetch("../src/library/employeeController.php", requestOptions)
//     .then(response => response.text())
//     .then(result => console.log(result))
//     .catch(error => console.log('error', error));

// }