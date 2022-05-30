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

  public function save($nombre,$correo)
  {
    $sentencia = Conexion::connect()->query("INSERT INTO clientes (nombre, correo) VALUES (?, ?);");
    $resultado = $sentencia->execute([$nombre, $correo]);
    return $resultado;
  }

  public function update()
  {
  }

  public function delete()
  {
  }
}