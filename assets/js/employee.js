
window.onload = function() {
    var userId=$('#userId').val();
    chargeData(userId);
}


async function chargeData(userId){
    await fetch("../src/library/employeeController.php?userId=" + userId, {
        method: 'GET'
    })
    .then((response) => response.json())
    .then((data) => {
        writeInput(data);
    });
}

function writeInput(obj){
    console.log(obj)
    $('#inputName').val(obj.name);
    $('#inputEmail').val(obj.email);
    $('#inputCity').val(obj.city);
    $('#inputState').val(obj.state);
    $('#inputPostalCode').val(obj.postalCode);
    $('#inputLastName').val(obj.lastName);
    $('#inputGender').val(obj.gender);
    $('#inputStreetAddress').val(obj.streetAddress);
    $('#inputPhoneNumber').val(obj.phoneNumber);
    $('#inputAge').val(obj.age);
}