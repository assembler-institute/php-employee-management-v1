loginError();
function loginError() {
    const form = document.querySelector("form");

    const alert = document.createElement("div");
    alert.setAttribute("class", "alert alert-danger");
    alert.setAttribute("role", "alert");
    alert.innerHTML = "Incorrect credentials";

    // const alert = `
    //     <div class="alert alert-danger" role="alert">
    //         Incorrect credentials
    //     </div>
    // `
    
    form.appendChild(alert);
}