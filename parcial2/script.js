const formulario = document.querySelector("#form-helados");
const aviso = document.querySelector("#error-mensaje");
function revisarPedido (event) {
    aviso.classList.remove("error", "exito");
    const nombre = document.querySelector("#nombre").value.trim();
    const correo = document.querySelector("#correo").value.trim();
    const sabores = document.querySelector("#sabores").value.trim();

    let error = false;
    if (nombre === "" || correo === "") {
        aviso.textContent = "Falta tu nombre o tu correo - sin eso no podemos anotar el pedido.";
        aviso.classList.add("error");
        error = true;
    } else if (!correo.includes("@")) {
        aviso.textContent = "Ese correo no tiene arroba - revísalo por favor.";
        aviso.classList.add("error");
        error = true;
    } else if (sabores === "" ) {
        aviso.textContent = "Es necesario que ordene algun sabor";
        aviso.classList.add("error");
        error = true;
    }

    if (error===true) {
        event.preventDefault();   
    } else {
        aviso.textContent = "Pedido anotado - te atiende [Ever Socrates Laime Mamani]";
        aviso.classList.add("exito");
    }
}
formulario.addEventListener("submit", revisarPedido);