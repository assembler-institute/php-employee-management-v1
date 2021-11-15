function ajaxUpdateEmployee(updateEmployee) {
  var request = new XMLHttpRequest();
  request.open("PUT", "../src/library/employeeController.php");
  request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //("Content-type", "application/json");
  request.onreadystatechange = () => {
    console.log(this.responseText);
    if (request.readyState == 4 && request.status == "200") {
      let response = this.responseText;
      console.log(response);
      console.log("succes");
    } else {
      console.log("error");
    }
  };
  request.send("updateEmployee=" + JSON.stringify(updateEmployee));
}
