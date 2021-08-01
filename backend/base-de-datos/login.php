<?php
require_once "conexion.php";
$conexion = new Conexion();
$conectar = $conexion->Conectar();

print_r($conectar);