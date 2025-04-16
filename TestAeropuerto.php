<?php

include "Aerolinea.php";
include "Aeropuerto.php";
include "Persona.php";
include "Vuelo.php";

$aerolinea1 = new Aerolinea("12","Jet Smart");
$aerolinea2 = new Aerolinea("13", "FlyBondi");

$responsable1 = new Persona("Juan", "Perez", "San Martin 3902", "Juan24@gmail.com", 2994590123);
$responsable2 = new Persona("Sofia", "Martinez", "Av. Argentina 123", "sofiaMartinez22@gmail.com", 2994589123);


$vuelo1 = new Vuelo("AR101", 25000, "05-05-2025", "Buenos Aires", "14:00", "12:15", 150, 54, $responsable1);
$vuelo2 = new Vuelo("AR102", 50000, "12-05-2025", "Tucuman", "13:40", "10:00", 180, 100, $responsable2);
$vuelo3 = new Vuelo("AR103", 150000, "21-04-2025", "Rio de Janeiro", "21:00", "18:00", 250, 25, $responsable1);
$vuelo4 = new Vuelo("AR104", 200000, "22-04-2025", "Cancun", "22:00", "10:00", 300, 150, $responsable2);

$aerolinea1->setColVuelosProgramados([$vuelo1, $vuelo3]);
$aerolinea2->setColVuelosProgramados([$vuelo2, $vuelo4]);

$aeropuertoNeuquen = new Aeropuerto("Aeropuerto Internacional Juan Domingo Peron", "Juan domingo Peron 5901", [$aerolinea1, $aerolinea2]);

echo $aeropuertoNeuquen->ventaAutomatica(3, "21-04-2025", "Rio de Janeiro");

echo $aeropuertoNeuquen->promedioRecaudadoXAerolinea($aerolinea1);