
window.onload = function() {
    if( $('#userId').val()!="undefined"){ //Si el input oculto de id contiene algún valor
        var userId=$('#userId').val(); //recupera ese valor
        chargeData(userId); //lo envía como parámetro de la función
    }
    console.log($('#userId').val())
}

async function chargeData(userId) {
    //se obtiene el objeto en base a la url con ese Id
    await fetch("../src/library/employeeController.php?userId=" + userId, {
            method: 'GET'
        })
        .then((response) => response.json())
        .then((data) => {
            writeInput(data);
        });
}

function writeInput(obj) {
    //se imprimen los valores en el formulario de manera dinámica
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


    $('#employeeForm').on('submit', function(e){
        e.preventDefault(); //para evitar enviar los datos por url en el navegador
    var elements = document.getElementById("employeeForm").elements;//recogemos los elementos del formulario
    var obj ={};
    for(var i = 0 ; i < elements.length ; i++){//se recorre cada elemento dejando los botones fuera
        var item = elements.item(i);
        if(item.id=="saveBtn" || item.id=="cancelBtn"){
            break
        }
        obj[item.name] = item.value; //Se recogen todos los valores dentro de un objeto
    }
    fetch("./library/employeeController.php?update=" + obj.id, { //llamamos a la función update() a través de la id del objeto
        method: "PUT",
        body: JSON.stringify(obj)
    })
    .then(response=>console.log(response))

    console.log(obj)
})
