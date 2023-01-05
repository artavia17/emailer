'user strict'

const confirm_password = document.querySelector('#renewPassword');
const new_password = document.querySelector('#newPassword');
const formulario = document.querySelector("#cambiar_contraseña");
const validation = document.querySelector('#validation_error');

if(confirm_password){

    formulario.onsubmit = (e) => {


        if(!new_password.value){
            validation.textContent = 'This password is required';
             e.preventDefault();
       }else if(new_password.value != confirm_password.value){
            validation.textContent = 'Passwords do not match';
            e.preventDefault();
       }else{
        validation.textContent = '';
       }


    }


}