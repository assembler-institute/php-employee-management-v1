function ajaxGetEmployee(employeeId) {
  let xhttp = new XMLHttpRequest();
  xhttp.open(
    "GET",
    "../src/library/employeeController.php?id=" + employeeId,
    true
  );
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      let response = this.responseText;
      let employee = JSON.parse(response);
      document.getElementById("inputId").value = employee.id;
      document.getElementById("inputName").value = employee.name;
      document.getElementById("inputLast").value = employee.lastName;
      document.getElementById("inputEmail").value = employee.email;
      document
        .getElementById("inputGenderSelect")
        [
          document.getElementById("inputGenderSelect").options.selectedIndex
        ].removeAttribute("selected");
      document.getElementById(employee.gender).setAttribute("selected", true);
      document.getElementById("inputGender").dataset.key.value = "";
      document.getElementById("inputCity").value = employee.city;
      document.getElementById("inputStreet").value = employee.streetAddress;
      document.getElementById("inputState").value = employee.state;
      document.getElementById("inputAge").value = employee.age;
      document.getElementById("inputPostal").value = employee.postalCode;
      document.getElementById("inputPhone").value = employee.phoneNumber;
      document
        .querySelectorAll(".active")[1]
        .firstElementChild.setAttribute("src", employee.photo);

      document.getElementById("deleteBtn").classList.remove("invisible");
      document.getElementById("newBtn").classList.remove("invisible");
      document.getElementById("formSubmit").classList.add("d-none");
      document.getElementById("updateBtn").classList.remove("d-none");
    }
  };
  xhttp.send();
}
