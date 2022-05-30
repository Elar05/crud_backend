<?php 
require_once '../models/clientesModel.php';
$ok = "";
$error = "";
$nombre = $_GET["nombre"];
$correo = $_GET["correo"];
$dni = $_GET["dni"];
$apellidos = $_GET["apellidos"];
$direccion = $_GET["direccion"];
$telefono = $_GET["telefono"];
if (empty(valida::validaNombres($nombre,$apellidos))) {
  if(count(valida::validaExists($dni)) == 0){
    if (empty(valida::validaDni($dni))) {
      if (empty(valida::validateEmail($correo))) {
        $res = new ClientesModel();
        $resultado = $res->save($nombre,$correo,$apellidos,$dni,$direccion,$telefono);
        if ($resultado) {
          $ok = "1-Cliente creado con exito";
        }else {
          $ok = "0-".$resultado;    
        }
      }else{
        $error = validateEmail($correo);
      }
    }else{
      $error = valida::validaDni($dni);
    }
  }else{
    $error = "0-Cliente ya existe en la base de datos";
  }
}else{
  $error = valida::validaNombres($nombre,$apellidos);
}

$n = new stdClass();
$n->error = $error;
$n->ok = $ok;
echo json_encode($n);

class valida{

  
  static function validateEmail($email) {
    $regex = "/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/";
    return preg_match($regex, $email) ? "":"0-Correo no valido";
  }
  
  static function validaDni($dni){
    $msj = "";
    if(empty($dni)){
      $msj = "0-Campo requerido DNI";
    }
    if(strlen($dni) != 10){ // count de numeros requerios para dni de acuerdo a identificacion por pais
      $msj = "0-DNI incorrecto";
    }
    return $msj;
  }

  static function validaNombres($nombres,$apellidos){
    $msj = "";
    if(empty($nombres)){
      $msj = "0-Campo nombre requerido";
    }elseif(empty($apellidos)){
      $msj = "0-Campo apellido requerido";
    }
    return $msj;
  }

  static function validaExists($dni){
    $res = new ClientesModel();
    return $res->getDni($dni);
  }

}