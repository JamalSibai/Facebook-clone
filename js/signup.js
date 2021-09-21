$(document).ready(function(){

    var fnameElement = $('#first_name');
    var lnameElement = $('#last_name');
    var phoneElement = $('#phonr_number');
    var emailElement = $('#email');
    var passwordElement = $('#password');
    var confirmPasswordElement  = $('#confirmpass');
    var submitElement = $('#signup');



var emailValid;
var confirmPass;
var phoneValid;
var fnameValid;
var lnameValid;
// Listeners


submitElement.addEventListener("click", function () {
  validateEmail();
  confirmPassword();
  validatePhone();
  validateAge();
  validatefname();
  validatelname();

  

  if(!fnameValid){
    var element = fnameElement;
    element.classList.add("alert-danger");
    element.classList.add("alert");
  }else{
    var element = document.fnameElement;
    element.classList.remove("alert-danger");
  }

  if(!lnameValid){
    var element = lnameElement;
   element.classList.add("alert-danger");
   element.classList.add("alert");
 }else{
   var element = lnameElement;
   element.classList.remove("alert-danger");
 }

 if(!phoneValid){
    var element = phoneElement;
    element.classList.add("alert-danger");
    element.classList.add("alert");
  }else{
    var element = phoneElement;
    element.classList.remove("alert-danger");
  }

  if(!emailValid){
    var element = emailElement;
    element.classList.add("alert-danger");
    element.classList.add("alert");
  }else{
    var element = emailElement;
    element.classList.remove("alert-danger");
  }

  if(!confirmPass){
    var element = confirmPasswordElement;
    element.classList.add("alert-danger");
    element.classList.add("alert");
  }else{
    var element = confirmPasswordElement;
    element.classList.remove("alert-danger");
  }

  if (emailValid && confirmPass && phoneValid ) {
    formElement.submit();
  }



});

function validateEmail() {
    var emailValue = emailElement.val();
    emailValid = false;
    if (
      emailValue.length > 5 &&
      emailValue.lastIndexOf(".") > emailValue.lastIndexOf("@") &&
      emailValue.lastIndexOf("@") != -1
    ) {
      emailValid = true;
    }
  }

function confirmPassword() {
  confirmPass = false;
  if (passwordElement.val() == confirmPasswordElement.val() && passwordElement.val().length > 5) {
    confirmPass = true;
    console.log("inn")
  }
}

function validatePhone() {
  phoneValid = false;
  var phoneValue = phoneElement.val().split(" ").join("");
  if (
    (phoneValue.length == 12 || phoneValue.length == 11) &&
    phoneValue.indexOf("+961") == 0
  ) {
    phoneValid = true;
  }
}


function validatefname(){
  fnameValid = false;
  if(fnameElement.value.length>2){
    fnameValid = true;
  }
}

function validatelname(){
  lnameValid = false;
  if(lnameElement.value.length>2){
    lnameValid = true;
  }
}

    

});