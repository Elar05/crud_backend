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

  public function save()
  {
  }

  public function update()
  {
  }

  public function delete()
  {
  }
}