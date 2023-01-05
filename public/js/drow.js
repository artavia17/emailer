'user strict'
// Bottom
const user_drow = document.querySelector('#drow_user');
const message_drow = document.querySelector('#message_boton');
const notify_drow = document.querySelector('#notify_boton');
const view_password  = document.querySelector('#view_password');
const copy_url_email = document.querySelector('#copy_api_email');
const main = document.querySelector('#main');
const menu_sidebar = document.querySelector('#sidebar');

// Form
const form_data_smtp = document.querySelector("#form_smtp");
const input_copy_url_email = document.querySelector("#info_copy_url_email");

// Icon
const icon_password = document.querySelector("#view_icon");
const icon_copy = document.querySelector("#icon_copy");

// Inputs
const input_smtp_password = document.querySelector("#input_password");

//Modal
const drow_user_content = document.querySelector('#drow_user_content');
const drow_message_content = document.querySelector('#drow_message_content');
const drow_notify_content = document.querySelector('#drow_notify_content');

main.onclick = () => {
    drow_user_content.classList.remove('show');
    drow_notify_content.classList.remove('show');
}

menu_sidebar.onclick = () => {
    drow_user_content.classList.remove('show');
    drow_message_content.classList.remove('show');
    drow_notify_content.classList.remove('show');
}

user_drow.onclick = () => {
    drow_user_content.classList.toggle('show');
    drow_notify_content.classList.remove('show');
    drow_user_content.style.position = 'absolute';
    drow_user_content.style.inset = '0px 0px auto auto';
    drow_user_content.style.margin = '0px';
    drow_user_content.style.transform = 'translate(-16px, 38px)' ;
}


notify_drow.onclick = () => {
    drow_user_content.classList.remove('show');
    drow_notify_content.classList.toggle('show');
    drow_notify_content.style.position = 'absolute';
    drow_notify_content.style.inset = '0px 0px auto auto';
    drow_notify_content.style.margin = '0px';
    drow_notify_content.style.transform = 'translate(-25px, 37px)';
}

if(view_password){
    view_password.onclick = () =>{

        // Cambiar el icon

        if(icon_password.className == 'bi bi-eye-slash'){
            icon_password.classList.remove("bi-eye-slash");
            icon_password.classList.add("bi-eye")
        }else{
            icon_password.classList.add("bi-eye-slash");
            icon_password.classList.remove("bi-eye")
        }

        // Cambiar el type input

        if(input_smtp_password.type == 'password'){
            input_smtp_password.type = 'text'
        }else{
            input_smtp_password.type = 'password'
        }

        return false;
    }
}



if(copy_url_email){
    copy_url_email.onclick = () => {
        input_copy_url_email.select();
        input_copy_url_email.setSelectionRange(0, 99999); // For mobile devices
        navigator.clipboard.writeText(input_copy_url_email.value);
        icon_copy.classList.remove('bi-clipboard');
        icon_copy.classList.add('bi-clipboard-check');
        setTimeout(()=>{
            icon_copy.classList.add('bi-clipboard');
            icon_copy.classList.remove('bi-clipboard-check');
        },3000)
    }
}
