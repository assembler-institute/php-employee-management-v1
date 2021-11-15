/**
 * Send new employe data to employeController.php in JSON format
 * @param  {object} newEmployee  employee data from employee form
 */
function ajaxCreateEmployee(newEmployee) {
  //? init. XMLHttpRequest
  var request = new XMLHttpRequest();

  //? set request props
  request.open("POST", "../src/library/employeeController.php", true);

  //? config header options
  request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  //? set request succes/error statements
  request.onreadystatechange = () => {
    if (request.readyState == 4 && request.status == "200") {
      Swal.fire({
        icon: "success",
        title: "Employee created",
        showConfirmButton: false,
        timer: 1500,
      });
      location.reload();
    } else {
      console.log("error");
    }
  };

  //? send request
  request.send("newEmployee=" + JSON.stringify(newEmployee));
}
