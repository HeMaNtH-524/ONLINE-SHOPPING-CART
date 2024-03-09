function validate(){


    
    //name validation:
    var name = document.getElementById("name").value;
    var errorname = document.getElementById("nameerror");
    var pattern1 = /^[a-zA-Z ]+$/;
    var check1 = pattern1.test(name);
    if(name==""){
        errorname.innerText = "name should not be null";
        return false;
    }
    else if(check1!=true){
        errorname.innerText = "name is invalid";
        return false;
    }
    else{
        errorname.innerText = "";
    }


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
    var cpassword = document.getElementById('cpassword').value;
    var passworderror=document.getElementById('passworderror');
    var cpassworderror=document.getElementById('cpassworderror');
    if(password==""){
        passworderror.innerText="password should not be empty";
        return false;
    }
    else if(password.length<8){
        passworderror.innerText="password should have 8 characters";
        return false;
    }
    else if(cpassword==""){
        cpassworderror.innerText="confirm password should not be empty";
        return false;
    }
    else if(password!=cpassword){
        cpassworderror.innerText="password and confirm password is mismatching";
        return false;
    }
    else{
        passworderror.innerText = " ";
        cpassworderror.innerText = " ";
    }
    return true;
}