
const form=document.getElementById('form');
const firstName=document.getElementById('firstName');
const lastName=document.getElementById('lastName');
const email=document.getElementById('email');
const username=document.getElementById('username');
const address=document.getElementById('address');
const dob=document.getElementById('dob');
const password=document.getElementById('pwd');
const password2=document.getElementById('pwd');



//Show input error message

function showError(input,message){
    const formControl=input.parentElement;
    formControl.className='form-control error';
    const small=formControl.querySelector('small');
    small.innerText=message;
}

function showSuccess(input){
    const formControl=input.parentElement;
    formControl.className='form-control success';
    
}

//Email

function isValidEmail(email)
{
    const re= /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}





form.addEventListener('submit',function(e){
    e.preventDefault();

    if(firstName.value===''){
        showError(firstName,'First name is required');
    }
    else{
        showSuccess(firstName);
    }
    if(lastName.value===''){
        showError(lastName,'Last name is required');
    }
    else{
        showSuccess(lastName);
    }if(email.value===''){
        showError(email,'Email is required');
    }else if(!isValidEmail(email.value)){
        showError(email,'Email is not valid');
    }
    else{
        showSuccess(email);
    }
    if(username.value===''){
        showError(username,'Last name is required');
    }
    else{
        showSuccess(username);
    }
    

    if(password.value===''){
        showError(password,'Password is required');
    }
    else{
        showSuccess(password);
    }
    
    if (address.value == '') {
        showError(address, 'Address is required');
    } else if (address.value.length < 5) {
        showError(address, 'You have to fill your full adress')
    }
    else {
        showSuccess(address);
    }
    

    
});