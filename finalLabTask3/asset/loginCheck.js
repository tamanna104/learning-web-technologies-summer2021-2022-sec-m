var userid = document.getElementById("uid").value;
var userpass = document.getElementById("upass").value;

function loginCheck() {
  if (userid == NULL) {
    userid.innerHTML = "empty userid";
  } else if (userpass == NULL) {
    userpass.innerHTML = "empty password";
  } else {
    userid.innerHTML = "";
    userpass.innerHTML = "";
  }
<<<<<<< HEAD
}
=======
}
>>>>>>> 7a090bc4c0dbbd5cf10c1e31f86e01fdb59c190a
