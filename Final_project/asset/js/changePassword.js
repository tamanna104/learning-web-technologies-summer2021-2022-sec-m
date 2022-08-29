const form = document.getElementById('changePassword');
const currentPassword = document.getElementById('currentPassword');
const password = document.getElementById('password');
const confirmPassword = document.getElementById('confirmPassword');
let isError = false;

form.addEventListener('submit', (e) => {
    e.preventDefault();
    
    let xhttp1 = new XMLHttpRequest();
    xhttp1.open('POST', '../model/changePassword.php', true);
    xhttp1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp1.send('getCurrentPass');
    xhttp1.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            validateInputs(this.responseText);
            if (!isError) {
                saveNewPass();
            }
        }
    }
});

const saveNewPass = () => {
    let xhttp2 = new XMLHttpRequest();
    xhttp2.open('POST', '../model/changePassword.php', true);
    xhttp2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp2.send('newPassword='+password.value);
    xhttp2.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            alert(this.responseText);
            setTimeout(window.location.href = "../controller/profile.php", 1000);
        }
    }
}

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

const validateInputs = (currentPassFromDB) => {
    const currentPassValue = currentPassword.value.trim();
    const passwordValue = password.value.trim();
    const confirmPasswordValue = confirmPassword.value.trim();

    if(currentPassValue === '') {
        setError(currentPassword, 'Current Password is required');
    } else if(currentPassValue !== currentPassFromDB) {
        setError(currentPassword, 'Incorrect Password');
    }else {
        setSuccess(currentPassword);
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

    if (currentPassword.parentElement.querySelector('.error').innerText === '' && 
        password.parentElement.querySelector('.error').innerText === '' && 
        confirmPassword.parentElement.querySelector('.error').innerText === '') {
        isError = false;
    } else {
        isError = true;
    }
};
