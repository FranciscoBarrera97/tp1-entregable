<?php
class Viaje{
    // Registro de informacion referente a los viajes de la empresa "Viaje Feliz"
    // Los atributos son: $codigoViaje, $destino, $maxPasajeros, $arrayPasajeros
    
    private $codigoViaje;
    private $destino;
    private $maxPasajeros;
    private $arrayPasajeros;

public function __construct($codigoViaje,$destino,$maxPasajeros,$arrayPasajeros){
    //metodo constructor de la clase Viajes
    // $codigo, $capacPasajeros son datos numericos (int)
    //$lugarLlegada es un dato tipo string                             
    //$pasajero es un array
    $this->codigoViaje=$codigoViaje;
    $this->destino=$destino;
    $this->maxPasajeros=$maxPasajeros;
    $this->arrayPasajeros=array(); 
}
public function getCodigoViaje(){
    return $this->codigoViaje;
}
public function getDestino(){
    return $this->destino;
}
public function getMaxPasajeros(){
    return $this->maxPasajeros;
}
public function getArrayPasajeros(){
    return $this->arrayPasajeros;
}

public function setCodigoViaje($codigoViaje){
    $this->codigoViaje=$codigoViaje;
}
public function setDestino($destino){
    $this->destino=$destino;
}
public function setMaxPasajeros($maxPasajeros){
    $this->maxPasajeros=$maxPasajeros;
}
public function setPasajero($pasajero){
    $this->arrayPasajeros=$pasajero;
}

public function __toString(){
    return "(". $this->codigoViaje." , ".$this->destino. $this->maxPasajeros.")";

}


// funcion para cargar datos de un pasajero
public function cargarPasajeros($nombre,$apellido,$dni){
    //array $pasajero

    $pasajero=[];                                              //ACA HAY UN ERROR, no me reconoce las claves
    $this->arrayPasajeros=$pasajero["nombre"];
    $this->arrayPasajeros=$pasajero["apellido"];
    $this->arrayPasajeros=$pasajero["dni"];
    array_push($this->getArrayPasajeros(), $pasajero);
    return $this->arrayPasajeros;

}

} 