let url = document.URL;
let separator = "/";
let pageArry = url.split(separator);
let page_name = pageArry[pageArry.length - 1];
console.log(page_name);

if (page_name == "dashboard.php") {
  $("#dashboardLink").addClass("active");
  $("#employeeLink").removeClass("active");
} else if (page_name == "employee.php") {
  $("#dashboardLink").removeClass("active");
  $("#employeeLink").addClass("active");
}
