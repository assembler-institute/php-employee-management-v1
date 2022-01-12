document.getElementById("name").addEventListener("blur", (e) => {
  validateSurName(e.target);
});

document.getElementById("lastName").addEventListener("blur", (e) => {
  validateSurName(e.target);
});

document.getElementById("email").addEventListener("blur", (e) => {
  validateEmail(e.target);
});

document.getElementById("phoneNumber").addEventListener("blur", (e) => {
  validatePhone(e.target);
});

document.getElementById("postalCode").addEventListener("blur", (e) => {
  validatePostalCode(e.target);
});

let i = 0;
function validateSurName(inputValidation) {
  let valueInput = inputValidation.value.trim();
  let val = valueInput.length < 20 && valueInput.length > 3 ? true : false;
  validate(val);
  return val;
}

function validateEmail(inputValidation) {
  const EMAIL_PATTERN = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
  let emailValue = inputValidation.value.trim();
  let val =
    emailValue.match(EMAIL_PATTERN) && emailValue.length < 51 ? true : false;
  validate(val);
  return val;
}

function validateIsAge(inputValidation) {
  var ageValue = inputValidation.trim();
  let val = !isNaN(age) ? true : false;
  validate(val);
  return val;
}

function validatePhone(inputValidation) {
  let phoneInput = inputValidation.value.trim();
  let val = phoneInput.length === 9 ? true : false;
  validate(val);
  return val;
}

function validatePostalCode(inputValidation) {
  let postalCodeInput = inputValidation.value.trim();
  let val = postalCodeInput.length === 5 ? true : false;
  validate(val);
  return val;
}

function validate(val) {
  if (val === false && i === 0) {
    i++;
    let form = document.getElementById("formulary");
    let warning = document.createElement("p");
    warning.innerText = "Please enter the correct data";
    warning.setAttribute("class", "bg-danger");
    warning.setAttribute("id", "danger");
    warning.style.color = "white";
    form.appendChild(warning);
  } else if (val === true) {
    if (i > 0) {
      i--;
      if (document.getElementById("danger")) {
        document
          .getElementById("formulary")
          .removeChild(document.getElementById("danger"));
      }
    }
  }
}
