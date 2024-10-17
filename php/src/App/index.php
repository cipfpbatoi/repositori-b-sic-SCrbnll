<?php
include_once $_SERVER['DOCUMENT_ROOT'] .'/../vendor/autoload.php';

use App\Controllers\EmpleadoController;
use App\Controllers\EmpresaController;

$controller = new EmpleadoController();
$controller->listAll();

$controller = new EmpresaController();
$controller->listAll();