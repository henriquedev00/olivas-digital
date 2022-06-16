const addInput = document.querySelector(".add-telefone");
// const div = document.querySelectorAll(".input-group.telefone");
const div = document.querySelectorAll("#telefonesAll");

let cont = 1;

const obj = {
    type: "text",
    name: `telefone`,
    value: ``,
    placeholder: "outro telefone"
}


function addInputShow() {
    const divAdd = document.createElement("div");
    const inputAdd = document.createElement("input");

    inputAdd.setAttribute("type", obj.type);
    inputAdd.setAttribute("name", `${obj.name}[${cont++}]`);
    inputAdd.setAttribute("value", obj.value);
    inputAdd.setAttribute("placeholder", obj.placeholder);

    divAdd.classList.add("input-group");
    divAdd.classList.add("telefone");

    div[div.length - 1].appendChild(divAdd);
    divAdd.appendChild(inputAdd);

}

addInput.addEventListener('click', addInputShow)
