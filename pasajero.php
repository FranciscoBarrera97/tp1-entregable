<?php
class Pasajero{
    private $nombreP;
    private $apellidoP;
    private $numDocP;
    private $telefonoP;
    private $numAsiento;
    private $numTicket;

    

//metodo constructor
public function __construct($numDocP,$nombreP,$apellidoP,$telefonoP, $numAsiento, $numTicket){
    $this->nombreP=$nombreP;
    $this->apellidoP=$apellidoP;
    $this->numDocP=$numDocP;
    $this->telefonoP=$telefonoP;
    
    $this->numAsiento=$numAsiento;
    $this->numTicket=$numTicket;
}


//metodo de acceso GET
public function getNombreP(){
    return $this->nombreP;
}

public function getApellidoP(){
    return $this->apellidoP;
}

public function getNumDocP(){
    return $this->numDocP;
}

public function getTelefonoP(){
    return $this->telefonoP;
}





public function getNumAsiento(){
    return $this->numAsiento;
}

public function getNumTicket(){
    return $this->numTicket;
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




public function setNumAsiento($numAsiento){
    $this->numAsiento=$numAsiento;
}

public function setNumTicket($numTicket){
    $this->numTicket=$numTicket;
}





//toString de pasajero
public function __toString(){
    return "\n" ."PASAJERO DNI: " . $this->getNumDocP() . 
            "\n" . " Nombre: " . $this->getNombreP() . 
            "\n" . " Apellido: " . $this->getApellidoP() .  
            "\n" . " Telefono: " . $this->getTelefonoP() .
            "\n" . "Numero de Asiento:". $this->getNumAsiento(); 
            "\n" . "Numero de Ticket". $this->getNumTicket();
}






//funcion para dar porcentaje de incremento 
public function darPorcentajeIncremento(){
    $porcentaje= 0;
    return $porcentaje;
}
}