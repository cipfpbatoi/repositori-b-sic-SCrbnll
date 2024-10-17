<?php
namespace App\Controllers;

use App\Models\Empleado;
use App\Models\Empresa;

class EmpresaController {

    public function listAll(){
        $persona1 = new Empleado('Ignasi','Gomis Mullor',50);
        $persona2 = new Empleado('Juan','Segura Vasco',50);
        $persona1->setSou(2500);
        $persona2->setSou(2500);

        $empresa = new Empresa();
        $empresa->addWorker($persona1);
        $empresa->addWorker($persona2);

        include_once $_SERVER['DOCUMENT_ROOT'].'/App/views/empresa.view.php';


    }
}