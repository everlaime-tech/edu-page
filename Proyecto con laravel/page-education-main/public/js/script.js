const cuerpo = document.querySelector("body");
const botonModo = document.querySelector("#btn-tema");

let esDeDia = false;

function alternarModo()
{
    cuerpo.classList.toggle("claro");
    esDeDia= !esDeDia;
    if (esDeDia) {
        botonModo.textContent="Modo noche"
    } else {
        botonModo.textContent="Modo dia"
    }
}
botonModo.addEventListener("click", alternarModo);



//====================================================
//validacion modificada para que permita

const formularioContacto= document.querySelector("#contacto");
const aviso = document.querySelector("#error-mensaje");

function revisarPreinscripcion (event) {
    aviso.classList.remove("error", "exito");
    const nombre = document.querySelector("#nombre").value.trim();
    const correo = document.querySelector("#correo").value.trim();
    const telefono = document.querySelector("#telefono").value.trim();
    const motivo = document.querySelector("#motivo").value.trim();

    let error = false;
    if (nombre === "") {
        aviso.textContent = "Llena el campo de nombres y apellidos";
        aviso.classList.add("error");
        error = true;
    } else if (!correo.includes("@") || correo === "") {
        aviso.textContent = "Llena correctamente el correo electrónico";
        aviso.classList.add("error");
        error = true;
    } else if (telefono === "" || isNaN(telefono) ) {
        aviso.textContent = "Es necesario su número de contacto para comunicarnos con usted";
        aviso.classList.add("error");
        error = true;
    } else if (motivo === "") {
        aviso.textContent = "Debe seleccionar el motivo de su consulta";
        aviso.classList.add("error");
        error = true;
    }

    if (error===true) {
        event.preventDefault();
    } else {
        aviso.textContent = "Registro exitoso";
        aviso.classList.add("exito");
    }
}
formularioContacto.addEventListener("submit", revisarPreinscripcion);
