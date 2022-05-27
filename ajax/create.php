<?php require_once './models/clientesModel.php';

if (!isset($_POST["nombre"]) || !isset($_POST["edad"])) {
  exit();
} else {
  $nombre = $_POST["nombre"];
  $edad = $_POST["edad"];

  $res = new ClientesModel();
  $sentencia = $base_de_datos->prepare("INSERT INTO mascotas(nombre, edad) VALUES (?, ?);");
  $resultado = $sentencia->execute([$nombre, $edad]);
}