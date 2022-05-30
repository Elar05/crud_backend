<?php
require_once 'models/Database.php';
$r = new Database();

var_dump($r->getCon());