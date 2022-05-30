<?php require_once 'conexion.php';

class ClientesModel
{
  static public function getAll()
  {
    $query = Conexion::connect()->query("SELECT * FROM tabla");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  public function get($id)
  {
  }

  public function getDni($dni)
  {
    $query = Conexion::connect()->query("SELECT * FROM clientes where dni = \"$dni\" ");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  public function save($nombre,$correo,$apellidos,$dni,$direccion,$telefono)
  {
    $sentencia = Conexion::connect()->prepare("INSERT INTO clientes (nombre, correo,apellidos,telefono,dni,direccion) VALUES (?,?,?,?,?, ?);");
    $resultado = $sentencia->execute([$nombre, $correo,$apellidos,$telefono,$dni,$direccion]);
    return $resultado;
  }

  public function update()
  {
  }

  public function delete()
  {
  }
}