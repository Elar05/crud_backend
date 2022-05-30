<?php require_once './models/clientesModel.php';
$ok = "";
$error = "";
if ((isset($_POST["nombre"]) && !empty($_POST['nombre']))  || (isset($_POST["edad"]) && !empty($_POST['edad']))) {
  $nombre = $_POST["nombre"];
  $edad = $_POST["edad"];

  $res = new ClientesModel();
  $sentencia = $base_de_datos->prepare("INSERT INTO mascotas(nombre, edad) VALUES (?, ?);");
  $resultado = $sentencia->execute([$nombre, $edad]);
  $ok = $resultado;
}else{
  $error = "0-Campo Nombre y Edad Obligatorio";
}
$n = new stdClass();
$n->error = $error;
$n->ok = $ok;
echo json_encode($n);