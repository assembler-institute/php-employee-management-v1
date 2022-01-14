//visual functionality to see where you are everymoment
function checkPath() {
    const fullpath = location.pathname;
    const loc = fullpath.substring(fullpath.length, fullpath.lastIndexOf("/"));
    const actual = $("#actualPage");
    const alter = $("#alterPage");

    switch (loc) {
        case "/employee.php":
            actual.text("Employees");
            actual.css({
                color: "black",
                fontSize: "17px"
            })
            alter.attr({
                href: "./dashboard.php"
            })
            alter.text("Dashboard");
            break;

        default: //dashboard.php
            actual.text("Dashboard");
            actual.css({
                color: "black",
                fontSize: "17px"
            })
            alter.attr({
                href: "./employee.php?newEmployee=true",
            })
            alter.text("Employees");
            break;
    }
}
window.onload = checkPath();