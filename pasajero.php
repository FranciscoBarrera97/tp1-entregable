<?php
class Pasajero{
    private $nombreP;
    private $apellidoP;
    private $numDocP;
    private $telefonoP;


//metodo constructor
public function __construct($numDocP,$nombreP,$apellidoP,$telefonoP){
    $this->nombreP=$nombreP;
    $this->apellidoP=$apellidoP;
    $this->numDocP=$numDocP;
    $this->telefonoP=$telefonoP;
}


//metodo de acceso GET
public function getNombreP(){
    return $this->nombreP;
}

public function getApellidoP(){
    return $this->nombreP;
}

public function getNumDocP(){
    return $this->numDocP;
}

public function getTelefonoP(){
    return $this->telefonoP;
}


//metodos SET

public function setNombreP($nombreP){
    $this->nombreP=$nombreP;
}

public function setApellidoP($apellidoP){
    $this->apellidoP=$apellidoP;
}

public function setNumDocP($numDocP){
    $this->numDocP=$numDocP;
}

public function setTelefonoP($telefonoP){
    $this->telefonoP=$telefonoP;
}


//toString de pasajero
public function __toString(){
    return "PASAJERO DNI: " . $this->numDocP . "\n" . 
            " Nombre: " . $this->nombreP . "\n" . 
            " Apellido: " . $this->apellidoP . "\n" . 
            " Telefono: " . $this->telefonoP . "\n" ;
}
}