<?php

namespace App\Models;
class Empleado extends Persona {
    private $sou;
    private $telefons = [];

    public function __construct($nom, $cognoms, $sou, $edat = 25) {
        parent::__construct($nom, $cognoms, $edat);
        $this->sou = $sou;
    }

    public function getSou() {
        return $this->sou;
    }

    public function setSou($sou) {
        $this->sou = $sou;
    }

    public function anyadirTelefono($telefon) {
        $this->telefons[] = $telefon;
    }

    public function listarTelefonos() {
        return implode(', ', $this->telefons);
    }

    public function vaciarTelefonos() {
        $this->telefons = [];
    }

    public function debePagarImpuestos() {
        return $this->sou > 3333;
    }

    public function __tostring(){
        return $this->getNomComplet();
    }
}