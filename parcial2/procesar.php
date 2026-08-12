<?php
$nombre = $_POST['nombre'];
$correo = $_POST["correo"];
$sabores = $_POST["sabores"];


echo "<p2>HELADERÍA DOÑA NIEVE</p2>";
echo "<p2>Pedido recibido en Heladería Doña Nieve</p2>";
echo "<p>Pedido a nombre de: $nombre</p>";
echo "<p>El email es: $correo </p>";
echo "<p>Detalle de sabores: $sabores </p>";

$datos = [
    "Cono simple - Bs 8",
    "Copa doble - Bs 15",
    "Litro para llevar - Bs 35"
];
echo "<h2>Carta de la heladería</h2>";
foreach ($datos as $dato) {
    echo "<p>$dato</p>";
}

echo "<p> Te atiende Ever Socrates Laime Mamani</p>";
