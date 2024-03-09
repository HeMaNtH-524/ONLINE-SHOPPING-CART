function validate(){
    //email validation:

    var email = document.getElementById("email").value;
    var erroremail = document.getElementById("emailerror");
    var pattern = /^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/;
    var check = pattern.test(email);
    if(email==""){
        erroremail.innerText = "email should not be null";
        return false;
    }
    else if(check!=true){
            erroremail.innerText = "email is invalid";
            return false;
    }        
    else{
        erroremail.innerText = " ";
    }

    //password validation:-
    
    var password = document.getElementById('password').value;
    var passworderror=document.getElementById('passworderror');
    if(password==""){
        passworderror.innerText="password should not be empty";
        return false;
    }
    else if(password.length<8){
        passworderror.innerText="password should have 8 characters";
        return false;
    }
    else{
        passworderror.innerText = " ";
    }        
    return true;
}