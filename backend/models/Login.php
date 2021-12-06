<?php
header('Access-Control-Allow-Origin: *');
session_start();

require_once './Conexion.php';

$conexion = new Conexion();
$conectar = $conexion->Conectar();

$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$clave = (isset($_POST['clave'])) ? $_POST['clave'] : '';

$claveEncriptada = md5($clave);

$consulta = "SELECT usu.id, usu.usuario, rol.descripcion FROM usuarios AS usu INNER JOIN roles AS rol ON usu.id_rol = rol.id WHERE usu.usuario = '{$usuario}' AND usu.clave='{$claveEncriptada}';";

$resultado = $conectar->prepare($consulta);
$resultado->execute();

if ($resultado->rowCount() >= 1) {
  $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
  $_SESSION['idUser'] = $data[0]['id'];
  $_SESSION['usuario'] = $data[0]['usuario'];
  $_SESSION['descripcion'] = $data[0]['descripcion'];
} else {
  $data = null;
}

print json_encode($data);
$conectar = null;