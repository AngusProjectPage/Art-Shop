// Get all the form fields
const nameField = document.querySelector("#name");
const phoneField = document.querySelector("#phoneNumber");
const emailField = document.querySelector("#email");
const postcodeField = document.querySelector("#postcode");
const addressLine1Field = document.querySelector("#addressLine1");
const addressLine2Field = document.querySelector("#addressLine2");
const cityField = document.querySelector("#city");

const form = document.querySelector("#placeOrder");

// Create utility functions
const isRequired = value => value === '' ? false : true;

const isNameValid = (name) => {
    const regularExpression = /^[A-Za-z]+ [A-Za-z]*$/;
    return regularExpression.test(name);
};
const isEmailValid = (email) => {
  const regularExpression = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return regularExpression.test(email);
};

const isPhoneValid = (phone) => {
    // Phone numbers can begin with either a + or a number
    const regularExpression = /^(\+|\d)\d*$/;
    return regularExpression.test(phone);
};

const isPostCodeValid = (input) => {
    const regularExpression = /^[a-zA-Z\d]+\s[a-zA-Z\d]*$/;
    return regularExpression.test(input);
};

const isAddress1Valid = (input) => {
    const regularExpression = /^\d*\/?\d*\s?[a-zA-Z\s]*$/;
    return regularExpression.test(input);
};

const isAddress2Valid = (input) => {
  const regularExpression   = /^$|\d*\/?\d*\s?|[a-zA-Z\s]*$/;
  return regularExpression.test(input);
};

const isCityValid = (input) => {
    const regularExpression = /^[A-Z]?[a-z]*$/;
    return regularExpression.test(input);
};




const displayError = (input, message) => {
    // Get the fields parent i.e <p> tag
    const formField = input.parentElement;

    formField.classList.remove("text-success");
    formField.classList.add("text-danger");

    input.classList.remove("border-valid");
    input.classList.add("border-error");


    // Display the error message
    const error = formField.querySelector('small');
    error.textContent = message;
};

const displaySuccess = (input) => {
    // Get the fields parent i.e <p> tag
    const formField = input.parentElement;

    formField.classList.remove("text-danger");
    formField.classList.add("text-success");

    input.classList.remove("border-error");
    input.classList.add("border-valid");

    // Hide the error message
    const error = formField.querySelector('small');
    error.textContent = '';
};

const checkName = () => {
    let valid = false;
    const name = nameField.value.trim();
    if(!isRequired(name)) {
        displayError(nameField, 'Name cannot be blank');
    }
    else if(!isNameValid(name)) {
        displayError(nameField, 'Name must include first and last name');
    }
    else {
        displaySuccess(nameField);
        valid = true;
    }
    return valid;
}

const checkPhone = () => {
    let valid = false;
    const phone = phoneField.value.trim();
    if(!isRequired(phone)) {
        displayError(phoneField, 'Phone number cannot be blank');
    }
    else if(!isPhoneValid(phone)) {
        displayError(phoneField, 'Phone number is not valid');
    }
    else {
        displaySuccess(phoneField);
        valid = true;
    }
    return valid;
}

const checkEmail = () => {
    let valid = false;
    const email = emailField.value.trim();
    if(!isRequired(email)) {
        displayError(emailField, 'Email address cannot be blank');
    }
    else if(!isEmailValid(email)) {
        displayError(emailField, 'Email is not valid');
    }
    else {
        displaySuccess(emailField);
        valid = true;
    }
    return valid;
}

const checkPostcode = () => {
    let valid = false;
    const postcode = postcodeField.value.trim();
    if(!isRequired(postcode)) {
        displayError(postcodeField, 'Postcode cannot be blank');
    }
    else if(!isPostCodeValid(postcode)) {
        displayError(postcodeField, 'Postcode has to contain only numbers and letters');
    }
    else {
        displaySuccess(postcodeField);
        valid = true;
    }
    return valid;
}

const checkAddressLine1 = () => {
    let valid = false;
    const addressLine1 = addressLine1Field.value.trim();
    if(!isRequired(addressLine1)) {
        displayError(addressLine1Field, 'Address Line 1 cannot be blank');
    }
    else if(!isAddress1Valid(addressLine1)) {
        displayError(addressLine1Field, 'Address Line 1 has to be of a format "Number(s) space letter(s) or Number(s)/Number(s) space letters"');
    }
    else {
        displaySuccess(addressLine1Field);
        valid = true;
    }
    return valid;
}

const checkAddressLine2 = () => {
    let valid = false;
    const addressLine2 = addressLine2Field.value.trim();
    if(!isAddress2Valid(addressLine2)) {
        displayError(addressLine2Field, 'Address Line 2 has to be of a format "Number(s) space letter(s)" or "Only Letters"');
    }
    else {
        displaySuccess(addressLine2Field);
        valid = true;
    }
    return valid;
}

const checkCity = () => {
    let valid = false;
    const city = cityField.value.trim();
    if(!isRequired(city)) {
        displayError(cityField, 'City cannot be blank');
    }
    else if(!isCityValid(city)) {
        displayError(cityField, "City must only contain letters");
    }
    else {
        displaySuccess(cityField);
        valid = true;
    }
    return valid;
}

function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth' // This adds a smooth animation to the scrolling
    });
}

form.addEventListener('submit', function (e) {
    e.preventDefault(); // This prevents the form from submitting
    let isNameValid = checkName();
    let isPhoneValid= checkPhone();
    let isEmailValid= checkEmail();
    let isPostcodeValid     = checkPostcode();
    let isAddressLine1Valid = checkAddressLine1();
    let isAddressLine2Valid = checkAddressLine2();
    let isCityValid = checkCity();

    let isFormValid = isNameValid &&
        isPhoneValid &&
        isEmailValid &&
        isPostcodeValid &&
        isAddressLine1Valid &&
        isAddressLine2Valid &&
        isCityValid;

    if(isFormValid) {
        form.submit();
    }
    else {
        console.log("hello");
        scrollToTop();
    }
});



