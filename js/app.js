// Inspiration from https://www.javascripttutorial.net/javascript-dom/javascript-form-validation/

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
const isBetween = (length, min, max) => length < min || length > max ? false : true;
const isEmailValid = (email) => {
  const regularExpression = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return regularExpression.test(email);
};

const showError = (input, message) => {
    // Get the fields parent i.e <p> tag
    const formField = input.parentElement;

    // Add the error class
    formField.classList.remove('success');
    formField.classList.add('error');

    // Display the error message
    const error = formField.querySelector('small');
    error.textContent = message;
};

form.addEventListener('submit', function (e) {
    e.preventDefault(); // This prevents the form from submitting
});



