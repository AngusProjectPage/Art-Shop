const passwordField = document.querySelector("#password");
const isRequired = value => value === '' ? false : true;

const form = document.querySelector("#login");

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


const checkPassword = () => {
    let valid = false;
    const password = passwordField.value.trim();
    if(!isRequired(password)) {
        displayError(passwordField, 'Password cannot be left blank');
    }
    else {
        valid = true;
    }
    return valid;
}


form.addEventListener('submit', function (e) {
    e.preventDefault(); // This prevents the form from submitting
    let isPasswordValid = checkPassword();
    console.log(isPasswordValid);
    if(isPasswordValid) {
        form.submit();
    }
});