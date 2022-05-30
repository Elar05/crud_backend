<?php require_once './models/clientesModel.php';
$ok = "";
$error = "";
if ((isset($_POST["nombre"]) && !empty($_POST['nombre']))  || (isset($_POST["correo"]) && !empty($_POST['correo']))) {
  $nombre = $_POST["nombre"];
  $correo = $_POST["correo"];

  $res = new ClientesModel();
  $resultado = $res->save($nombre,$correo);
  $ok = $resultado;

}else{
  $error = "0-Campo Nombre y Correo Obligatorio";
}

$n = new stdClass();
$n->error = $error;
$n->ok = $ok;
echo json_encode($n);