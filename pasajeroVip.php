<?php
class PasajeroVip extends Pasajero{
    private $numViajeroFrec;
    private $cantMillas;



//construct
public function __construct($numDocP,$nombreP,$apellidoP,$telefonoP, $numAsiento, $numTicket, $numViajeroFrec, $cantMillas,){
    parent :: __construct($numDocP,$nombreP,$apellidoP,$telefonoP, $numAsiento, $numTicket);

    $this->numViajeroFrec=$numViajeroFrec;
    $this->cantMillas=$cantMillas;
}


//get
public function getNumViajeroFrec(){
    return $this->numViajeroFrec;
}

public function getCantMillas(){
    return $this->cantMillas;
}



//set

public function setNumViajeroFrec($numViajeroFrec){
    $this->numViajeroFrec=$numViajeroFrec;
}


public function setCantMillas($cantMillas){
    $this->cantMillas=$cantMillas;
}




//toString

public function __toString(){
    $cadena = parent :: __toString() ;
    $cadena.=  "\n" . "Numero de pasajero frecuente:" . $this->getNumViajeroFrec() . 
                "\n" . "Cantidad de millas: " . $this->getCantMillas();
    return $cadena;
}


//metodo para dar porcentaje de incremento
public function darPorcentajeIncremento(){
    $millas= $this->getCantMillas();
    if($millas>300){
        $porcentaje=30;
    }else {
        $porcentaje=35;
    }
    return $porcentaje;
}




}