<?php

Class Aerolinea {
    private $identificacion;
    private $nombre;
    private $colVuelosProgramados;

    public function __construct($identificacion, $nombre) {
        $this->identificacion = $identificacion;
        $this->nombre = $nombre;
        $this->colVuelosProgramados = [];
    }

    public function mostrarVuelos($vuelos) {
        $cadena = "";
        foreach ($vuelos as $vuelo) {
            $cadena .= $vuelo . "\n";
        }
        return $cadena;
    }
    public function __toString() {
        $cadena = "Identificacion " . $this->getIdentificacion() . "\n"; 
        $cadena .= "Nombre: " . $this->getNombre() . "\n"; 
        $cadena .= "Los vuelos son: \n" . $this->mostrarVuelos($this->getColVuelosProgramados()) . "\n";
        return $cadena;
    }

    public function getColVuelosProgramados() {
        return $this->colVuelosProgramados;
    }
    public function getIdentificacion() {
        return $this->identificacion;
    }
    public function getNombre() {
        return $this->nombre;
    }

    public function setIdentificacion($value) {
        $this->identificacion = $value;
    }
    public function setNombre($value) {
        $this->nombre = $value;
    }
    public function setColVuelosProgramados($value) {
        $this->colVuelosProgramados = $value;
    }

    public function darVueloADestino($destino, $cant_asientos) {
        $colVuelos = [];
        $colVuelosAerolinea = $this->getColVuelosProgramados();

        foreach ($colVuelosAerolinea as $vuelo) {
            $destinoAerolinea = $vuelo->getDestino();
            $cant_disponible = $vuelo->getCantAsientosDisponibles();
             if ($destino == $destinoAerolinea && $cant_disponible >= $cant_asientos) {
                array_push($colVuelos, $vuelo);
             }
        }
        return $colVuelos;
    }


    public function incorporarVuelo($vuelo) {
        $colVuelos = $this->getColVuelosProgramados();
        $respuesta = false;

        foreach ($colVuelos as $objVuelo) {
            if (($vuelo->getDestino() != $objVuelo->getDestino()) && ($vuelo->getFecha() != $objVuelo->getFecha()) && ($vuelo->getHora_partida() != $objVuelo->getHora_partida())) {
                $respuesta = true;
                array_push($colVuelos, $vuelo);
                $this->setColVuelosProgramados($colVuelos);
            } 
        }
        return $respuesta;
    }


    public function venderVueloADestino($cant_asientos, $destino, $fecha) {
        $colVuelos = $this->getColVuelosProgramados();
        $vueloEncontrado = [];
        $encontrado = false;

        foreach($colVuelos as $vuelo) {
            if($vuelo->getDestino() == $destino && $vuelo->getFecha() == $fecha) {
                if($vuelo->asignarAsientosDisponibles($cant_asientos)) {
                    $encontrado = true;
                    array_push($vueloEncontrado, $vuelo);
                }
            } 
            
        }
        if ($encontrado) {
            return $vueloEncontrado . "\n";
        } else {
            return null;
        }
    }

    public function montoPromedioRecaudado() {
        $colVuelosAerolinea = $this->getColVuelosProgramados();
        $totalRecaudado = 0;
        $cantVuelos = count($colVuelosAerolinea);
        
        if ($cantVuelos > 0 ) {
        foreach ($colVuelosAerolinea as $vuelo) {
            $importe = $vuelo->getImporte();
            $asientosVendidos = $vuelo->getCantAsientosTotales() - $vuelo->getCantAsientosDisponibles();
            $recaudadoVuelo = $importe * $asientosVendidos;
            $totalRecaudado += $recaudadoVuelo;
        }
        $promedio = $totalRecaudado / $cantVuelos;
    }
    return $promedio . "\n";
}
}

?>