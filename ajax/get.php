<?php

require_once './models/clientesModel.php';

$res = ClientesModel::getAll();

echo json_encode($res);