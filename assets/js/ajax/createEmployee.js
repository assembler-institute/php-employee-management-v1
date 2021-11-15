function ajaxCreateEmployee(newEmployee) {
  var request = new XMLHttpRequest();
  request.open("POST", "../src/library/employeeController.php", true);
  request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //("Content-type", "application/json");
  request.onreadystatechange = () => {
    if (request.readyState == 4 && request.status == "200") {
      location.reload();
      console.log("succes");
    } else {
      console.log("error");
    }
  };
  request.send("newEmployee=" + JSON.stringify(newEmployee));
}
