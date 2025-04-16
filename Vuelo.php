<?php

Class Vuelo {
    private $numeroVuelo;
    private $importe;
    private $fecha;
    private $destino;
    private $hora_arribo;
    private $hora_partida;
    private $cantAsientosTotales;
    private $cantAsientosDisponibles;
    private $responsableVuelo;

    public function __construct($numeroVuelo, $importe, $fecha, $destino, $hora_arribo, $hora_partida, $cantAsientosTotales, $cantAsientosDisponibles, $responsableVuelo) {
        $this->numeroVuelo = $numeroVuelo;
        $this->importe = $importe;
        $this->fecha = $fecha;
        $this->destino = $destino;
        $this->hora_arribo = $hora_arribo;
        $this->hora_partida = $hora_partida;
        $this->cantAsientosTotales = $cantAsientosTotales;
        $this->cantAsientosDisponibles = $cantAsientosDisponibles;
        $this->responsableVuelo = $responsableVuelo;
    }

    public function __toString() {
        return 
        "Numero vuelo: " . $this->getNumeroVuelo() . "\n" . 
        "Importe: " . $this->getImporte() . "\n" . 
        "Fecha: " . $this->getFecha() . "\n" . 
        "Destino: " . $this->getDestino() . "\n" . 
        "Hora arribo: " . $this->getHora_arribo() . "\n" . 
        "Hora partida: " . $this->getHora_partida() . "\n" . 
        "Cantidad de asientos totales: " . $this->getCantAsientosTotales() . "\n" . 
        "Cantidad de asientos disponibles: " . $this->getCantAsientosDisponibles() . "\n" . 
        "Responsable del vuelo: " . $this->getResponsableVuelo() . "\n";
    }
    public function getNumeroVuelo() {
        return $this->numeroVuelo;
    }
    public function getImporte() {
        return $this->importe;
    }
    public function getFecha() {
        return $this->fecha;
    }
    public function getDestino() {
        return $this->destino;
    }
    public function getHora_arribo() {
        return $this->hora_arribo;
    }
    public function getHora_partida() {
        return $this->hora_partida;
    }
    public function getCantAsientosTotales() {
        return $this->cantAsientosTotales;
    }
    public function getCantAsientosDisponibles() {
        return $this->cantAsientosDisponibles;
    }
    public function getResponsableVuelo() {
        return $this->responsableVuelo;
    }

    public function setNumeroVuelo($value) {
        $this->numeroVuelo = $value;
    }
    public function setImporte($value) {
        $this->importe = $value;
    }
    public function setFecha($value) {
        $this->fecha = $value;
    }
    public function setDestino($value) {
        $this->destino = $value;
    }
    public function setHora_arribo($value) {
        $this->hora_arribo = $value;
    }
    public function setHora_partida($value) {
        $this->hora_partida = $value;
    }
    public function setCantAsientosTotales($value) {
        $this->cantAsientosTotales = $value;
    }
    public function setCantAsientosDisponibles($value) {
        $this->cantAsientosDisponibles = $value;
    }
    public function setResponsableVuelo($value) {
        $this->responsableVuelo = $value;
    }


    public function asignarAsientosDisponibles($cant_pasajeros) {
        $respuesta = false;
        $cant_disponible = $this->getCantAsientosDisponibles();
        if ($cant_pasajeros <= $cant_disponible) {
            $respuesta = true;
            $this->setCantAsientosDisponibles($cant_disponible - $cant_pasajeros);
        }
        return $respuesta . "\n";
    }
}