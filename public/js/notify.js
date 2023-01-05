'user strict'
    
// Variables
const dominio = document.domain;
const count_text_notify = document.querySelectorAll('.count_notify');
const content_notify = document.querySelector('#notify_items');
const clear_notify = document.querySelector('#limpiar_notificacion');
const main_container = document.querySelector('#main');

 // Peticiones
function notify() {

    content_notify.innerHTML = ''

    fetch(`http://${dominio}:8000/api/notify`,{
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    }).then( res =>{
        return res.json().then(data=>{

            let count = data.data.count;
            let info = data.data.items
            

            count_text_notify.forEach( e => {
                e.textContent = count;
            });

            info.forEach( e => {
                let icon = ''
                let date_complete = new Date(e.date);
                let year = date_complete.getFullYear();
                let day = date_complete.getDate();
                let month = date_complete.getMonth() + 1;

                if(e.type == 'error'){
                    icon = '<i class="bi bi-x-circle text-danger"></i>'
                }else if(e.type == 'exito'){
                    icon = '<i class="bi bi-check-circle text-success"></i>';
                }else if(e.type == 'peligro'){
                    icon = '<i class="bi bi-exclamation-circle text-warning"></i>';
                }else if(e.type == 'nuevo'){
                    icon = '<i class="bi bi-info-circle text-primary"></i>';
                }

                content_notify.innerHTML += `<li class="notification-item">${icon}<div><h4>${e.title}</h4><p>${e.text}</p><p>${year}-${month}-${day}</p></div></li><li><hr class="dropdown-divider"></li>`;
            });

        })
    })

}

window.addEventListener('load', function(){
    notify();
})



clear_notify.onclick = () => {
    fetch(`http://${dominio}:8000/api/notify/clear`,{
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    }).then(res => {
        if(res.status == 201){
            notify();
        }
    })
}
