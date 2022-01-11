const formButton = document.getElementById("formButton");
const phoneNumber = document.getElementById("phoneNumber");

console.log(x)
formButton.addEventListener("submit", formValidation);

function formValidation(){
    e.preventDefault();
if (phoneNumber.value.length > 9 ){
    e.preventDefault();
    alert("Please enter a correct phone number.");
    return false;
}
}
