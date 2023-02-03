function validate(){
var username = document.getElementById("username").value;
var password = document.getElementById("password").value;
if ( username == "username" && password == "password"){
alert ("Login successfully");
window.location.assign("index.html"); // Redirecting to other page.
return false;
}
else{
alert("wrong credentials");
return false;
}
}
}
