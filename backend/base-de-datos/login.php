<?php

session_start();

require_once "conexion.php";
$conexion = new Conexion();
$conectar = $conexion->Conectar();

$usuario = (isset($_POST["usuario"])) ? $_POST["usuario"] : "";
$clave = (isset($_POST["clave"])) ? $_POST["clave"] : "";

$claveEncriptada = md5($clave);

$consulta = "SELECT * FROM usuario WHERE usuario='$usuario' AND clave = '$claveEncriptada'";

$resultado = $conectar->prepare($consulta);
$resultado->execute();

if ($resultado->rowCount() >= 1) {
  $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
  $_SESSION["usuario"] = $usuario;
} else {
  $data = null;
  $_SESSION["usuario"] = null;
}

print json_encode($data);
$conectar = null;
