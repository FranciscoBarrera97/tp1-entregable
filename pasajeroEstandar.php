<?php
class PasajeroEstandar extends Pasajero{





//constructor (aunque no se si hace falta, ya que tiene los mismos atributos que la clase padre "pasajero")

public function __construct($numDocP,$nombreP,$apellidoP,$telefonoP, $numAsiento, $numTicket){
    parent :: __construct($numDocP,$nombreP,$apellidoP,$telefonoP, $numAsiento, $numTicket);
}

//toString (igual que construct)

public function __toString(){
    $cadena = parent :: __toString() ;
    return $cadena;
}


//metodo para dar porcentaje de incremento
public function darPorcentajeIncremento()
{
    $porcentaje=10;
    return $porcentaje;
}


}

