'user strict'
const boton_new = document.querySelector('#create_new_file');
const container = document.querySelector('.add_data');
const form = document.querySelector("#form_smtp");
const input_hidden = document.querySelector("#array_data");
let count = 1;

const new_file_update = document.querySelector("#add_new_file_update");
const content_file_update = document.querySelector("#content_add_update");
const requried = 'hola';

// Funciones

function create(){
    return `<div class="row mb-3 container_data" id="delete_${count}">
    <label for="inputEmail" class="col-sm-2 col-form-label label_count">Field Name</label>
    <div class="col-sm-10 d-flex">
        <input type="text" class="form-control  field_value" name="host" placeholder="Insert the name fiel" style="border-top-right-radius: 0px; border-bottom-right-radius: 0px">
        <a class="btn btn-primary delete_item" remove_item="${count}" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px">
            <i class="bi bi-dash-lg"></i>
        </a>
    </div>
    <div class="invalid-feedback d-none required" style="font-size: 14px;">The field name is required</div>
    </div>`;
}


if(boton_new){
    window.addEventListener('load', ()=>{

        // Agregar los fiels

        boton_new.onclick = () => {

            const data_array = []
            const inputs_value = document.querySelectorAll('.field_value');
            inputs_value.forEach( e => {
                data_array.push(e.value);
            })

            count+=1;
            container.innerHTML += create();

            const boton_delete = document.querySelectorAll('.delete_item');

            boton_delete.forEach( e => {
                e.onclick = () => {

                    count - 1;

                    let item = e.getAttribute('remove_item');
                    let selector = `#delete_${item}`;
                    document.querySelector(selector).remove();

                }

            })


        }


        form.onsubmit = (event) =>{

            let data_array = [];
            const field_value = document.querySelectorAll(".field_value");
            const required_boton = document.querySelectorAll(".required");
            const name = document.querySelector('#name');
            const required_name = document.querySelector('#required_name');
            let count = 0;

            field_value.forEach( e => {

                if(!name.value){
                    required_name.classList.add('d-block');
                    required_name.classList.remove('d-none');
                    event.preventDefault();
                }else{
                    required_name.classList.remove('d-block');
                    required_name.classList.add('d-none');
                }

                if(!e.value){
                    required_boton[count].classList.add('d-block');
                    required_boton[count].classList.remove('d-none');
                    event.preventDefault();
                }else{
                    required_boton[count].classList.remove('d-block');
                    required_boton[count].classList.add('d-none');
                    data_array.push(e.value);
                }

                count++;

            })
            input_hidden.value = `${data_array},`;


        }


    })

}

function add_file(){
    content_file_update.innerHTML += `<div class="mb-4 d-flex align-items-center justify-content-center form_update">
                                                <input type="text" class="form-control"  value="" style="border-top-right-radius: 0px; border-bottom-right-radius: 0px;" placeholder="Insert Name">
                                                <a class="h-100 btn btn-primary" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px;">
                                                <i class="bi bi-dash-lg"></i>
                                                </a>
                                                <div class="invalid-feedback d-none w-100" style="font-size: 14px;">
                                                    This file is required
                                                </div>
                                        </div>
                                        `;

        const input_update = document.querySelectorAll(".form_update");
        input_update.forEach( event => {
            event.childNodes[3].onclick = () => {
                event.remove();
                event.childNodes[1].value = null
            }
        })
}




if(new_file_update){
    new_file_update.onclick = () => {
        add_file();
    }
}



if(content_file_update){

    // Update const
    const form_update = document.querySelector("#update_data");
    const insert_value_input = document.querySelector("#actualizar_data");
    const input_update = document.querySelectorAll(".form_update");

    input_update.forEach( event => {
        event.childNodes[3].onclick = () => {
            event.remove();
            event.childNodes[1].value = null
        }
    })

    form_update.onsubmit = (e) => {


        const input_update = document.querySelectorAll(".form_update");

        if(!input_update.length){
            add_file();
            e.preventDefault();
        }else{


            const array_update = [];
            input_update.forEach( event => {
                array_update.push(event.childNodes[1].value);

                if(!event.childNodes[1].value){

                    e.preventDefault();

                    if(!event.childNodes[1].value){
                        event.childNodes[5].classList.remove('d-none');
                        event.childNodes[5].classList.add('d-block');
                    }else{
                        event.childNodes[5].classList.add('d-none');
                        event.childNodes[5].classList.remove('d-block');
                    }

                }else{
                    if(!event.childNodes[1].value){
                        event.childNodes[5].classList.remove('d-none');
                        event.childNodes[5].classList.add('d-block');
                    }else{
                        event.childNodes[5].classList.add('d-none');
                        event.childNodes[5].classList.remove('d-block');
                    }
                }

            })
            insert_value_input.value = array_update;
        }
    }

}
