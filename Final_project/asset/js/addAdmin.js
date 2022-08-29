const form = document.getElementById('adminForm');
const username = document.getElementById('username');
const password = document.getElementById('password');
const confirmPassword = document.getElementById('confirmPassword');
const email = document.getElementById('email');
const address = document.getElementById('address');
let isError = false;

form.addEventListener('submit', (e) => {
    e.preventDefault();
    
    validateInputs();
    if (!isError) {
        const formData = {
            username: username.value,
            password: password.value,
            email: email.value,
            address: address.value
        }
        let json = JSON.stringify(formData);
        let xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../model/addAdmin.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send('data='+json);
        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if (this.responseText == "success") {
                    window.location.href = "../view/viewAdmins.php";
                } else {
                    alert(this.responseText);
                }
            }
        }
    }
    
});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success');
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

// const isValidEmail = email => {
//     const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
//     return re.test(String(email).toLowerCase());
// }

const validateInputs = () => {
    const usernameValue = username.value.trim();
    const passwordValue = password.value.trim();
    const confirmPasswordValue = confirmPassword.value.trim();
    const emailValue = email.value.trim();
    const addressValue = address.value.trim();

    if(usernameValue === '') {
        setError(username, 'Username is required');
    } else if(!isNaN(usernameValue.charAt(0))) {
        setError(username, 'Username can not start with a number');
    } else {
        setSuccess(username);
    }

    if(emailValue === '') {
        setError(email, 'Email is required');
    } else if (emailValue.indexOf('.') < 0 ) {
        setError(email, 'Provide a valid email address');
    } else if (emailValue.indexOf('.') === emailValue.length - 1 ) {
        setError(email, 'Provide a valid email address');
    } else {
        setSuccess(email);
    }

    if(passwordValue === '') {
        setError(password, 'Password is required');
    } else if (passwordValue.length < 6 ) {
        setError(password, 'Password must be at least 6 character.')
    } else if (passwordValue.indexOf('$') < 0 && passwordValue.indexOf('#') < 0 && passwordValue.indexOf('&') < 0 &&
    passwordValue.indexOf('%') < 0 && passwordValue.indexOf('(') < 0 && passwordValue.indexOf(')') < 0 && passwordValue.indexOf('{') < 0 &&
    passwordValue.indexOf('}') < 0 && passwordValue.indexOf('@') < 0 && passwordValue.indexOf('!') < 0 && passwordValue.indexOf('_') < 0 &&
    passwordValue.indexOf('+') < 0 && passwordValue.indexOf('-') < 0 && passwordValue.indexOf('<') < 0 && passwordValue.indexOf('>') < 0)
    {
        setError(password, 'Password is weak. Must contain a special character.')
    } else {
        setSuccess(password);
    }		

    if(confirmPasswordValue === '') {
        setError(confirmPassword, 'Please confirm your password');
    } else if (confirmPasswordValue !== passwordValue) {
        setError(confirmPassword, "Passwords doesn't match");
    } else {
        setSuccess(confirmPassword);
    }
    if(addressValue === '') {
        setError(address, 'Address field is blank');
    } else {
        setSuccess(address);
    }

    if (username.parentElement.querySelector('.error').innerText === '' && 
        email.parentElement.querySelector('.error').innerText === '' &&
        password.parentElement.querySelector('.error').innerText === '' && 
        confirmPassword.parentElement.querySelector('.error').innerText === '' && 
        address.parentElement.querySelector('.error').innerText === '') {
        isError = false;
    } else {
        isError = true;
    }

};
