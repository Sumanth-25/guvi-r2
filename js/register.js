function checkmy_details(){
    const Username = document.getElementById('name');
    const Email_id = document.getElementById('email');
    const Password = document.getElementById('Password');
    const confirm_password = document.querySelector('#confirm_password');


    const UsernameRegex = /^[a-zA-Z0-9_-]{3,16}$/;
    const EmailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const PasswordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

    if(!EmailRegex.test(email.value)){
        alert("Please enter a valid email_id.");
        return false;
    }

    if(!EmailRegex.test(Password.value)){
        alert("Password must be atleast 10 characters and contain atleast one ltter, one number and one special character.");
        return false;
    }

    if(!PasswordRegex.test(Password.value)){
        alert("Password must be atleast 10 characters and contain atleast one ltter, one number and one special character.");
        return false;
    }

    if(Password.value !== confirm_password.value){
        alert("Password dont match. Please try again");
        return false;
    }

    return true;
}

