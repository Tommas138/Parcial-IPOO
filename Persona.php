<?php

Class Persona {
    private $nombre;
    private $apellido;
    private $direccion;
    private $mail;
    private $telefono;

    public function __construct($nombre, $apellido, $direccion, $mail, $telefono) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->direccion = $direccion;
        $this->mail = $mail;
        $this->telefono = $telefono;
    }

    public function __toString() {
        return
        "Nombre: " . $this->getNombre() . "\n" . 
        "Apellido: " . $this->getApellido() . "\n" . 
        "Direccion: " . $this->getDireccion() . "\n" . 
        "Mail: " . $this->getMail() . "\n" . 
        "Telefono: " . $this->getTelefono() . "\n"; 
    }

    public function getNombre() {
        return $this->nombre;
    }
    public function getApellido() {
        return $this->apellido;
    }
    public function getDireccion() {
        return $this->direccion;
    }
    public function getMail() {
        return $this->mail;
    }
    public function getTelefono() {
        return $this->telefono;
    }

    public function setNombre($value) {
        $this->nombre = $value;
    }
    public function setApellido($value) {
        $this->apellido = $value;
    }
    public function setDireccion($value) {
        $this->direccion = $value;
    }
    public function setMail($value) {
        $this->mail = $value;
    }
    public function setTelefono($value) {
        $this->telefono = $value;
    }
}