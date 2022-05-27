<?php require_once './config/config.php';

class Conexion
{
  static public function connect()
  {
    $link = new PDO("pgsql:host=" . HOST . ";dbname=" . DBNAME, USERNAME, PASSWORD);
    $link->exec("set names utf8");
    return $link;
  }
}