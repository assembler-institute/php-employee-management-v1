/**
 * Send employe id to employeController.php
 * @param  {object} employeeId  selected employee Id
 */

function ajaxDeleteEmployee(employeeId) {
  //? init. XMLHttpRequest
  var request = new XMLHttpRequest();

  //? set request props
  request.open(
    "DELETE",
    "../src/library/employeeController.php?delete=" + employeeId
  );

  //? config header options
  request.setRequestHeader("Content-Type", "application/json"); //("Content-type", "application/json");

  //? set request succes/error statements
  request.onreadystatechange = () => {
    if (request.readyState == 4 && request.status == "200") {
      Swal.fire({
        icon: "success",
        title: "Employee deleted",
        showConfirmButton: false,
        timer: 1500,
      });
      location.reload();
    } else {
      console.log("error");
    }
  };

  //? send request
  request.send(null);
}
