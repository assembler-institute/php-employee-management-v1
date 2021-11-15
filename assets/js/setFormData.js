/**
 * fills form inputs
 * @param  {object} employeeData selected employee data from employees.json
 */

function setFormData(employeeData) {
  document.getElementById("inputId").value = employeeData.id;
  document.getElementById("inputName").value = employeeData.name;
  document.getElementById("inputLast").value = employeeData.lastName;
  document.getElementById("inputEmail").value = employeeData.email;
  document
    .getElementById("inputGenderSelect")
    [
      document.getElementById("inputGenderSelect").options.selectedIndex
    ].removeAttribute("selected");
  document.getElementById(employeeData.gender).setAttribute("selected", true);
  document.getElementById("inputGender").dataset.key.value = "";
  document.getElementById("inputCity").value = employeeData.city;
  document.getElementById("inputStreet").value = employeeData.streetAddress;
  document.getElementById("inputState").value = employeeData.state;
  document.getElementById("inputAge").value = employeeData.age;
  document.getElementById("inputPostal").value = employeeData.postalCode;
  document.getElementById("inputPhone").value = employeeData.phoneNumber;
  document
    .querySelectorAll(".active")[1]
    .firstElementChild.setAttribute("src", employeeData.photo);

  document.getElementById("deleteBtn").classList.remove("invisible");
  document.getElementById("newBtn").classList.remove("invisible");
  document.getElementById("formSubmit").classList.add("d-none");
  document.getElementById("updateBtn").classList.remove("d-none");
}
