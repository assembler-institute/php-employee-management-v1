function checkPath() {
    const fullpath = location.pathname;
    const loc = fullpath.substring(fullpath.length, fullpath.lastIndexOf("/"));
    const actual = document.getElementById("actualPage");
    const alter = document.getElementById("alterPage")
    switch (loc) {
        case "/employee.php":
            actual.innerText = "Employees";
            alter.setAttribute("href", "./dashboard.php")
            alter.innerText = "Dashboard";
            break;

        default: //dashboard.php
            actual.innerText = "Dashboard";
            actual.setAttribute("href", "./dashboard.php")
            alter.innerText = "Employees";
            break;
    }
}
window.onload = checkPath();