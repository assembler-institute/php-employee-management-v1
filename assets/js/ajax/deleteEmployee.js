function ajaxDeleteEmployee(employeeId) {
  var request = new XMLHttpRequest();
  request.open(
    "DELETE",
    "../src/library/employeeController.php?delete=" + employeeId
  );
  request.setRequestHeader("Content-Type", "application/json"); //("Content-type", "application/json");
  request.onreadystatechange = () => {
    if (request.readyState == 4 && request.status == "200") {
      location.reload();
      console.log("succes");
    } else {
      console.log("error");
    }
  };
  request.send(null);
}
