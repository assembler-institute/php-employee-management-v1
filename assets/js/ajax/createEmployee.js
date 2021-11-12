function ajaxCreateEmployee(newEmployee) {
  var request = new XMLHttpRequest();
  request.open("POST", "../src/library/employeeController.php");
  request.setRequestHeader("Content-type", "application/json");
  request.onload = () => {
    console.log(request.responseText);
    if (request.readyState == 4 && request.status == "201") {
      console.log("succes");
    } else {
      console.log("error");
    }
  };
  console.log(JSON.stringify(newEmployee));
  request.send("hello");
}
