<?php
$nombre = $_POST['nombre'];
$correo = $_POST["correo"];
$telefono = $_POST["telefono"];
$motivo = $_POST["motivo"];
$mensaje = $_POST["mensaje"];

echo "<p2><b>------------ Unidad Educativa Epsilon Nu --------------</b> <br><br> </p2>";

echo "<p3>Recepcion de Solicitudes</p3><br>";

echo "<p><b>Motivo o referencia: $motivo</b><p>";
echo "<p>Interesado/a          : $nombre</p>";
echo "<p>Telf./Celular         : $telefono</p>";
echo "<p>Correro               : $correo </p>";
echo "<p>Mensaje               : $mensaje</p>";
