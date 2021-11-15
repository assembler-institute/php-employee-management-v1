/**
 * send new employe data to employeeController.php for update
 * @param  {object} updateEmployee  updated employee data
 */
function ajaxUpdateEmployee(updateEmployee) {
  //? init. XMLHttpRequest
  var request = new XMLHttpRequest();

  //? set request props
  request.open("PUT", "../src/library/employeeController.php");

  //? config header options
  request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  //? set request succes/error statements
  request.onreadystatechange = () => {
    if (request.readyState == 4 && request.status == "200") {
      Swal.fire({
        icon: "success",
        title: "Employee updated",
        showConfirmButton: false,
        timer: 1500,
      });
      location.reload();
    } else {
      console.log("error");
    }
  };

  //? send request
  request.send("updateEmployee=" + JSON.stringify(updateEmployee));
}
