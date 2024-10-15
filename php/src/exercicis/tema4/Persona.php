<?php
class Persona {
    private $nom;
    private $cognoms;
    private $edat;
    const LIMITE_EDAT = 66;

    public function __construct($nom, $cognoms, $edat = 25) {
        $this->nom = $nom;
        $this->cognoms = $cognoms;
        $this->edat = $edat;
    }

    public function getNomComplet() {
        return $this->nom . " " . $this->cognoms;
    }

    public function estaJubilat() {
        return $this->edat >= self::LIMITE_EDAT ? 'true' : 'false';
    }

    public function getNom() {
    	return $this->nom;
    }

    public function setNom($nom) {
    	$this->nom = $nom;
    }

    public function getCognoms() {
    	return $this->cognoms;
    }

    public function setCognoms($cognoms) {
    	$this->cognoms = $cognoms;
    }

    public function getEdat() {
    	return $this->edat;
    }

    public function setEdat($edat) {
    	$this->edat = $edat;
    }
}