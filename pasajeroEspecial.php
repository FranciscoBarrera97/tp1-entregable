<?php

class PasajeroEspecial extends Pasajero {
    private  $serviciosEspeciales;

//constructor   

//$necesidad es valor que proviene de un contador 
public function __construct($numDocP,$nombreP,$apellidoP,$telefonoP, $numAsiento, $numTicket, $serviciosEspeciales){      
    parent :: __construct($numDocP,$nombreP,$apellidoP,$telefonoP,  $numAsiento, $numTicket);
    $this->serviciosEspeciales=$serviciosEspeciales;
}


//get
public function getServiciosEspeciales(){
    return $this->serviciosEspeciales;
}

//set
public function setServiciosEspeciales($serviciosEspeciales){
    $this->serviciosEspeciales=$serviciosEspeciales;
}


//toString
public function __toString(){
        $cadena = parent :: __toString() ;
        $cadena.= "\n" . "Cantidad de servicios especiales requeridos:" . $this->getServiciosEspeciales();
        return $cadena;
    }



//metodo para dar porcentaje de incremento
public function darPorcentajeIncremento(){
    $cantServEsp= $this->getServiciosEspeciales();
    if($cantServEsp<=1){
        $porcentaje=15;
    }else{
        $porcentaje=30;
    }
    return $porcentaje;
}







}
