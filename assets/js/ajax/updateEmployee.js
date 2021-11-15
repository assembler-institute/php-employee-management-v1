function ajaxUpdateEmployee(updateEmployee) {
  var request = new XMLHttpRequest();
  request.open("PUT", "../src/library/employeeController.php");
  request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  request.onreadystatechange = () => {
    if (request.readyState == 4 && request.status == "200") {
      console.log(response);
      console.log("succes");
    } else {
      console.log("error");
    }
  };
  request.send("updateEmployee=" + JSON.stringify(updateEmployee));
}
