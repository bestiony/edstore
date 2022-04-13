// ------------- login register form ------------
let login = document.getElementById("login");
let register = document.getElementById("register");
let indicator = document.getElementById("indicator");

function shiftToLogin (){
    login.style.transform = "translateX(0px)";
        register.style.transform = "translateX(300px)";
        indicator.style.transform = "translateX(50px)"
}

function shiftToRegister(){
    login.style.transform = "translateX(-300px)";
        register.style.transform = "translateX(0px)";
        indicator.style.transform = "translateX(150px)"
}