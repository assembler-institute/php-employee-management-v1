/**
 * take form inputs value
 * @return {object} formData   indexed form imput values
 */
function takeFormData() {
  let formData = {
    id: document.getElementById("inputId").value,
    name: document.getElementById("inputName").value,
    lastName: document.getElementById("inputLast").value,
    email: document.getElementById("inputEmail").value,
    gender:
      document.getElementById("inputGenderSelect")[
        document.getElementById("inputGenderSelect").options.selectedIndex
      ].value,
    city: document.getElementById("inputCity").value,
    streetAddress: document.getElementById("inputStreet").value,
    state: document.getElementById("inputState").value,
    age: document.getElementById("inputAge").value,
    postalCode: document.getElementById("inputPostal").value,
    phoneNumber: document.getElementById("inputPostal").value,
    photo: document
      .querySelectorAll(".active")[1]
      .firstElementChild.getAttribute("src"),
  };
  return formData;
}
