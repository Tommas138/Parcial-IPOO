<?php

Class Aeropuerto {
    private $denominacion;
    private $direccion;
    private $colAerolineas;

    public function __construct($denominacion, $direccion, $colAerolineas) {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->colAerolineas = $colAerolineas;
    }

    public function __toString() {
        return
        "Aeropuerto: " . $this->getDenominacion() . "\n" . 
        "Direccion: " . $this->getDireccion() . "\n" . 
        "Columna aerolineas: " . $this->mostrarColumnas($this->getColAerolineas()) . "\n";
    }

    public function mostrarColumnas($array) {
        $cadena = "";

        foreach ($array as $obj) {
            $cadena .= $obj . "\n";
        }
        return $cadena;
    }

    public function getDenominacion() {
        return $this->denominacion;
    }
    public function getDireccion() {
        return $this->direccion;
    }
    public function getColAerolineas() {
        return $this->colAerolineas;
    }

    public function setDenominacion($value) {
        $this->denominacion =  $value;
    }
    public function setDireccion($value) {
        $this->direccion =  $value;
    }
    public function setColAerolineas($value) {
        $this->colAerolineas =  $value;
    }


    public function retornarVuelosAerolinea($aerolinea) {
        $colAerolineas = $this->getColAerolineas();

        foreach ($colAerolineas as $objAerolinea) {
            if ($objAerolinea->getDenominacion() == $aerolinea->getDenominacion()) {
                $vuelos = $objAerolinea->getColVuelosProgramados();
                return $vuelos . "\n";
            }
        }
        
        return "No hay vuelos \n";
    }

    public function ventaAutomatica($cant_asientos, $fecha, $destino) {
        $aerolineas = $this->getColAerolineas();
        $i = 1;

        foreach ($aerolineas as $aerolinea) {
            $vuelos = $aerolinea->getColVuelosProgramados();

            if ($vuelos[$i]->asignarAsientosDisponibles($cant_asientos) && $vuelos[$i]->getDestino() == $destino && $vuelos[$i]->getFecha() == $fecha) {
                return  $vuelos[$i] . "\n" ;
                $aerolinea->venderVueloADestino($cant_asientos, $destino, $fecha);
            }
            $i++;
        }

        return "No se encontraron vuelos \n";
    }

    public function promedioRecaudadoXAerolinea($identificacionAerolinea) {
        $aerolineas = $this->getColAerolineas();
        $promedio = 0;

        foreach ($aerolineas as $aerolinea) {
            if ($identificacionAerolinea == $aerolinea->getIdentificacion()) {
                $promedio= $aerolinea->montoPromedioRecaudado();
            }
        }
        return "El promedio recaudado de esta aerolinea es: " . $promedio . "\n";
    }


}

?>