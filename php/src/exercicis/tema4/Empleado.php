<?php
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

    public static function toHtml(Persona $p) {
        $html = '<p>' . htmlspecialchars($p->getNomComplet()) . '</p>';
        if ($p instanceof Empleado) {
            $html .= '<ol>';
            foreach ($p->telefons as $telefon) {
                $html .= '<li>' . htmlspecialchars($telefon) . '</li>';
            }
            $html .= '</ol>';
        }
        return $html;
    }
}