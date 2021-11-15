<!-- TODO Employee view -->
// This file will be the employee view that will be used as much to view/edit an existing one or to create a new one.
<script>
document.getElementById("inputGender").addEventListener("change", (e) => {
    $gender = e.target.value;
    document.getElementById("inputGender").setAttribute("data-key", $gender);
});

//get the form from the doc
let form = document.getElementById("formEmployeeTest");

form.addEventListener("submit", (e) => {
    e.preventDefault();
    new FormData(form);
});



form.addEventListener("formdata", (e) => {
    console.log("formdata fired");

    // Get the form data from the event object
    let data = e.formData;
    console.log(data);

    for (let value of data.values()) {
        console.log(value);
    }

    for (let key of data.keys()) {
        console.log(key);
    }

    // submit the data via XHR
    let request = new XMLHttpRequest();
    request.open("POST", "../src/library/employeeController.php");
    request.setRequestHeader("Content-type", "application/json");
    request.onload = () => {
        if (request.readyState == 4 && request.status == "200") {
            console.log("succes");
        } else {
            console.log("error");
        }
    };

    request.send(data);
    e.preventDefault();
});

</script>

<?php
include "../assets/html/footer.html";
?>

