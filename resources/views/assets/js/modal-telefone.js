import axiosInstance from "./axiosInstance.js";

const buttons = document.querySelectorAll(".modal-open");
const conteudo = document.querySelector(".conteudoModal");

function showTelefone({...telefones}) {
    for(let i= 0; i < telefones.telefones.length; i++) {
        conteudo.innerHTML = conteudo.innerHTML + '<br>' + telefones.telefones[i].telefone;
    }
}

async function handleShowTel() {
    conteudo.innerHTML = "";
    const dataRoute = this.dataset.route;
    const response = showTelefone((await axiosInstance.get(dataRoute)).data)
}

buttons.forEach((button) => {
    button.addEventListener("click", handleShowTel)
})
