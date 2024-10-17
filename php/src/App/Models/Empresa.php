<?php
namespace App\Models;
class Empresa {
    private array $empleados = [];

    public function addWorker(Empleado $empleado) {
        $this->empleados[] = $empleado;
    }

    public function listWorkersHtml() {
        $html = "<ul>";
        foreach ($this->empleados as $empleado) {
            $html .= "<li>" . Empleado::toHtml($empleado) . "</li>";
        }
        $html .= "</ul>";
        return $html;
    }

    public function getCosteNominas() {
        $coste = 0;
        foreach ($this->empleados as $empleado) {
            $coste += $empleado->getSou();
        }
        return $coste;
    }
}