<?php
class Conexion
{
  public static function Conectar()
  {
    define("SERVIDOR", "localhost");
    define("NOMBRE_BD", "login_php_b_jq_sa2_i");
    define("USUARIO", "root");
    define("CLAVE", "");
    $opciones = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"];

    try {
      $pdo = new PDO("mysql:host=" . SERVIDOR . ";dbname=" . NOMBRE_BD, USUARIO, CLAVE, $opciones);
      return $pdo;
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }
}