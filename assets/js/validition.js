document.getElementById("name").addEventListener("blur", (e) => {
    validateSurName(e.target)
});

document.getElementById("lastName").addEventListener("blur", (e) => {
    validateSurName(e.target);
});

document.getElementById("email").addEventListener("blur", (e) => {
    validateEmail(e.target);
});

function validateSurName(inputValidation) {
    let valueInput = inputValidation.value.trim();
    return (valueInput.length < 20 && valueInput.length > 3) ? true : false;
}

function validateEmail(inputValidation) {
    const EMAIL_PATTERN = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/
    let emailValue = inputValidation.value.trim();
    return (emailValue.match(EMAIL_PATTERN) && emailValue.length < 51) ? true : false;
}

function validateIsAge(inputValidation) {
    var ageValue = inputValidation.trim();
    return (!isNaN(age)) ? true : false;
}