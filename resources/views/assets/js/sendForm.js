import axiosInstance from "./axiosInstance.js";

const form = document.forms['formCreateCliente'];
const button = document.querySelector('#id');

function cadastrarCliente(event) {
    event.preventDefault();
    const thisForm = this;
    const data = new FormData(thisForm);


    axiosInstance.post(thisForm.action, data).then(response => {
        if(response.data.route) {
            window.location.replace(response.data.route);
            return;
        } else if(response.data.erro) {
            console.log(response.data.erro);
        }
    });
}

form.addEventListener('submit', cadastrarCliente);