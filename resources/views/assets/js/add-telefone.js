const addInput = document.querySelector(".add-telefone");
const div = document.querySelector(".input-group.telefone");

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

    div.appendChild(divAdd);
    divAdd.appendChild(inputAdd);

}

addInput.addEventListener('click', addInputShow);


