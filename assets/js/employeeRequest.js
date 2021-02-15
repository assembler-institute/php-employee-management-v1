table = document.querySelector(".js-grid-table");

table.addEventListener('click', printFunction);

function printFunction(e){
    e.preventDefault();
    console.log(e.target);
}

// submitButton.addEventListener("click", request);

// function request(e) {

//     e.prevent

//     axios.post("../../src/library/index.php", JSON.stringify(data))
//     .then(response => {
//         // location.reload();
//         console.log(response);
//     }).catch(error => {
//         console.log(error);
//     })
// }