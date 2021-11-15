/**
 * send employee Id to employeeController.php to get selected employe data from employees.json
 * @param  {object} employeeId  selected employee Id
 */

function ajaxGetEmployee(employeeId) {
  //? init. XMLHttpRequest
  let xhttp = new XMLHttpRequest();

  //? set request props
  xhttp.open(
    "GET",
    "../src/library/employeeController.php?id=" + employeeId,
    true
  );

  //? config header options
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  //? set request succes/error statements
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      let response = this.responseText;
      let employee = JSON.parse(response);
      setFormData(employee);
    }
  };

  //? send request
  xhttp.send();
}
