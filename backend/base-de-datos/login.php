<?php

session_start();

require_once "conexion.php";
$conexion = new Conexion();
$conectar = $conexion->Conectar();

$usuario = (isset($_POST["usuario"])) ? $_POST["usuario"] : "";
$clave = (isset($_POST["clave"])) ? $_POST["clave"] : "";

$claveEncriptada = md5($clave);

$consulta = "SELECT usu.id as id_usuario, rol.id as id_rol FROM usuario usu INNER JOIN rol rol ON usu.idRol = rol.id WHERE usuario= '$usuario' AND clave = '$claveEncriptada'";

$resultado = $conectar->prepare($consulta);
$resultado->execute();

if ($resultado->rowCount() >= 1) {
  $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
  $_SESSION["usuario"] = $usuario;
  $_SESSION["idRol"] = $data[0]["id_rol"];
} else {
  $data = null;
  $_SESSION["usuario"] = null;
}

print json_encode($data);
$conectar = null;
