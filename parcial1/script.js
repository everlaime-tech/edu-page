
const mensaje = document.querySelector("#mensaje");


function confirmarPedido() {
    mensaje.textContent = "Pedido recibido - te atiende EVER SOCRATES LAIME MAMANI";
    

    mensaje.classList.remove("oculto");
}


const boton = document.querySelector("#btn-confirmar");

boton.addEventListener("click", confirmarPedido);