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
}
