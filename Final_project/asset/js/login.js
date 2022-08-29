const form = document.getElementById('loginForm');
const username = document.getElementById('username');
const password = document.getElementById('password');
let isError = false;

form.addEventListener('submit', (e) => {
    e.preventDefault();
    
    validateInputs();
    if (!isError) {
        const formData = {
            username: username.value,
            password: password.value
        }
        let json = JSON.stringify(formData);
        let xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../model/login.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send('data='+json);
        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if (this.responseText == "success") {
                    window.location.href = "../view/adminHome.php";
                } else {
                    alert("You are not registered yet! Please register First.");
                    window.location.href = "../view/reg.html";
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

const validateInputs = () => {
    const usernameValue = username.value.trim();
    const passwordValue = password.value.trim();

    if(usernameValue === '') {
        setError(username, 'Username is required');
    } else if(!isNaN(usernameValue.charAt(0))) {
        setError(username, 'Username can not start with a number');
    } else {
        setSuccess(username);
    }

    if(passwordValue === '') {
        setError(password, 'Password is required');
    } else {
        setSuccess(password);
    }		

    if (username.parentElement.querySelector('.error').innerText === '' && 
        password.parentElement.querySelector('.error').innerText === '') {
        isError = false;
    } else {
        isError = true;
    }

};