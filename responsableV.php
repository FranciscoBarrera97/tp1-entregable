<?php
class ResponsableV{
    private $numEmpleado;
    private $numLicencia;
    private $nombreE;
    private $apellidoE;


//metodo constructor
public function __construct($numEmpleado,$numLicencia,$nombreE,$apellidoE){
    $this->numEmpleado=$numEmpleado;
    $this->numLicencia=$numLicencia;
    $this->nombreE=$nombreE;
    $this->apellidoE=$apellidoE;
}


//metodo de acceso GET
public function getNumEmpleado(){
    return $this->numEmpleado;
}

public function getNumLicencia(){
    return $this->numLicencia;
}

public function getNombreEmpleado(){
    return $this->nombreE;
}

public function getApellidoEmpleado(){
    return $this->apellidoE;
}



//metodo de acceso SET
public function setNumEmpleado($numEmpleado){
    $this->numEmpleado=$numEmpleado;
}

public function setNumeroLicencia($numLicencia){
    $this->numLicencia=$numLicencia;
}

public function setNombreEmpleado($nombreE){
    $this->nombreE=$nombreE;
}

public function setApellidoEmpleado($apellidoE){
    $this->apellidoE=$apellidoE;
}


//metodo __toString para responsable del viaje
public function __toString(){
    return "Responsable numero empleado: " . $this->numEmpleado . "\n". 
            "numero de licencia: " . $this->numLicencia . "\n" .
            "nombre: " . $this->nombreE ."\n" .
            "apellido: " .  $this->apellidoE."\n";
}
}

