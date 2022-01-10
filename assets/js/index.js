var Grid = document.getElementById("Grid");

async function rellenar(){
    await fetch("")
      .then(response => response.json())
      .then(data =>{
        console.log(data);
        data.forEach(dat => {
            
        });
      });
}


// function BuildRow([a,b,c,d,e,f,g,h,i]){
//     let row=document.createElement("div").classList.add("row")
//     let id=document.createElement("div").classList.add("col-sm")
//     let name=document.createElement("div").classList.add("col-sm")
//     let email=document.createElement("div").classList.add("col-sm")
//     let age=document.createElement("div").classList.add("col-sm")
//     let street=document.createElement("div").classList.add("col-sm")
//     let city=document.createElement("div").classList.add("col-sm")
//     let state=document.createElement("div").classList.add("col-sm")
//     let phone=document.createElement("div").classList.add("col-sm")
//     let postalcode=document.createElement("div").classList.add("col-sm")
//     id.innerText=a
//     name.innerText=b
//     email.innerText=c
//     age.innerText=d
//     street.innerText=e
//     city.innerText=f
//     state.innerText=g
//     phone.innerText=h
//     postalcode.innerText=i
// }
