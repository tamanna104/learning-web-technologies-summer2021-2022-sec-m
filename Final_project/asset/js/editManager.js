const form = document.getElementById('editManagerForm');
const userId = document.getElementById('userId');
const username = document.getElementById('username');
const password = document.getElementById('password');
const email = document.getElementById('email');
const contact = document.getElementById('contact');
const dob = document.getElementById('dob');
const gender = document.getElementById('gender');
const address = document.getElementById('address');
const bio = document.getElementById('bio');
const website = document.getElementById('website');
let isError = false;

form.addEventListener('submit', (e) => {
    e.preventDefault();
    
    validateInputs();
    if (!isError) {
        const formData = {
            userId: userId.value,
            username: username.value,
            password: password.value,
            email: email.value,
            contact: contact.value,
            dob: dob.value,
            gender: gender.value,
            address: address.value,
            bio: bio.value,
            website: website.value
        }
        let json = JSON.stringify(formData);
        let xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../model/editManager.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send('data='+json);
        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if (this.responseText == "success") {
                    window.location.href = "../view/viewManagers.php";
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

const isValidEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

const validateInputs = () => {
    const usernameValue = username.value.trim();
    const passwordValue = password.value.trim();
    const emailValue = email.value.trim();
    const contactValue = contact.value.trim();
    const dobValue = dob.value.trim();
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
    
    if(contactValue === '') {
        setError(contact, 'Contact field is blank');
    } else {
        setSuccess(contact);
    }
    if(dobValue === '') {
        setError(dob, 'Date of birth field is blank');
    } else {
        setSuccess(dob);
    }
    if(addressValue === '') {
        setError(address, 'Address field is blank');
    } else {
        setSuccess(address);
    }

    if (username.parentElement.querySelector('.error').innerText === '' && 
        email.parentElement.querySelector('.error').innerText === '' &&
        password.parentElement.querySelector('.error').innerText === '' && 
        contact.parentElement.querySelector('.error').innerText === '' &&
        dob.parentElement.querySelector('.error').innerText === '' &&
        address.parentElement.querySelector('.error').innerText === '') {
        isError = false;
    } else {
        isError = true;
    }

};
