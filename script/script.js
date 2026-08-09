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
//validacion
const formularioPreinscripcion = document.querySelector("#form-preinscripcion");
const aviso = document.querySelector("#error-mensaje");

function revisarPreinscripcion (event){
    event.preventDefault();

    const nombre=document.querySelector("#nombre").value;
    const correo=document.querySelector("#correo").value;
    const telefono = document.querySelector("#telefono").value;
    const nivel_interes = document.querySelector("#nivel_interes").value;

    if(nombre===""){
        aviso.textContent = "Llena el campo de nombres y apellidos";
        aviso.classList.add("error");
        aviso.classList.remove("exito");
    } else if (correo.includes("@") === false){
       aviso.textContent = "Llena correctamente el correo electronico";
        aviso.classList.add("error");
        aviso.classList.remove("exito");

    } else if (telefono==="" || isNaN(telefono))   {
        aviso.textContent="Es necesario su numero de contacto para comunicarnos con usted";
        aviso.classList.add("error");
        aviso.classList.remove("exito");
    
    } else if(nivel_interes===""){
        aviso.textContent="Debe seleccionar un nivel educativo"
        aviso.classList.add("error");
        aviso.classList.remove("exito");
    } else {
        aviso.textContent= "Registro exitoso";
        aviso.classList.add("exito");
        aviso.classList.remove("error");
    }
}
formularioPreinscripcion.addEventListener("submit", revisarPreinscripcion);