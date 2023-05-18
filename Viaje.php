<?php
class Viaje{
    // Registro de informacion referente a los viajes de la empresa "Viaje Feliz"
   
    // Los atributos son:
    private $codigoViaje;
    private $destinoViaje;
    private $maxPasajeros;
    private $array_pasajeros;
    private $responsableV;    //es un objeto

    private $costoViaje;
    private $acumPasajesVendidos;




//metodo constructor de la clase Viajes
public function __construct($codigoViaje,$destinoViaje,$maxPasajeros,$objResponsableV, $costoViaje, $acumPasajesVendidos){
   
    $this->codigoViaje=$codigoViaje;
    $this->destinoViaje=$destinoViaje;
    $this->maxPasajeros=$maxPasajeros;
    $this->array_pasajeros=[];                                  
    $this->responsableV=$objResponsableV; 


    $this->costoViaje= $costoViaje;
    $this->acumPasajesVendidos=$acumPasajesVendidos;
}




//metodos de acceso GET                               

public function getCodigoViaje(){
    return $this->codigoViaje;
}

public function getDestinoViaje(){
    return $this->destinoViaje;
}

public function getMaxPasajeros(){
    return $this->maxPasajeros;
}

public function getArrayPasajeros(){
    return $this->array_pasajeros;
}

public function getResponsableV(){
    return $this->responsableV;
}

public function getCostoViaje(){
    return $this->costoViaje;
}
public function getAcumPasajesVendidos(){
    return $this->acumPasajesVendidos;
}






//metodos de seteo (SET)
public function setCodigoViaje($codigoViaje){
    $this->codigoViaje=$codigoViaje;
}
public function setDestinoViaje($destinoViaje){
    $this->destinoViaje=$destinoViaje;
}
public function setMaxPasajeros($maxPasajeros){
    $this->maxPasajeros=$maxPasajeros;
}
public function setArrayPasajeros($objPasajero){          
    $this->array_pasajeros=$objPasajero;
}

public function setResponsableV($objResponsableV){
    $this->responsableV=$objResponsableV;
}


public function setCostoViaje($costoViaje){
    $this->costoViaje=$costoViaje;
}

public function setAcumPasajesVendidos($acumPasajesVendidos){
    $this->acumPasajesVendidos= $acumPasajesVendidos;
}





//mas funciones




// funcion para ver si hay pasajes disponibles en el viaje,es decir, si hay espacio libre para ingresar un pasajero
public function hayPasajeDisponible(){
    $capacidadMax=$this->getMaxPasajeros();
    $numPasajeros= count($this->getArrayPasajeros());
    
    if($capacidadMax-$numPasajeros<0){
        $disponibilidad= false;
    }else{
        $disponibilidad=true;
    }       
    return $disponibilidad;
}


// funcion para vender pasaje
public function venderPasaje($objPasajero){
        //incorporp el objPasajero al array pasajero?
        $this->setArrayPasajeros($objPasajero);  

        if($objPasajero instanceof pasajeroEstandar){
            $porcentajeInc=$objPasajero->darPorcentajeIncremento();
            $precioViaje=$this->getCostoViaje();
            $precioFinal= $precioViaje + (($precioViaje* $porcentajeInc)/100);
        }
        
        if($objPasajero instanceof PasajeroVip){
            $precioViaje=$this->getCostoViaje();
            $porcentajeInc=$objPasajero->darPorcentajeIncremento();
            $precioFinal= $precioViaje + (($precioViaje* $porcentajeInc)/100);
        }

        if($objPasajero instanceof PasajeroEspecial){
            $precioViaje=$this->getCostoViaje();
            $porcentajeInc=$objPasajero->darPorcentajeIncremento();
            $precioFinal= $precioViaje + (($precioViaje* $porcentajeInc)/100);
        }

        return $precioFinal;
 }






public function eliminarPasajero($dni){

        //Verifico que exista
        if (array_key_exists($dni, $this->array_pasajeros)) {
          
            //elimina valores en cierta posicion del array
            unset($this->array_pasajeros[$dni]);
         }
}





//funciones para modificar datos de pasajero

public function modificarNombrePasajero($dni, $nombreNuevo){

    //verifico que exista el pasajero
    if (array_key_exists($dni, $this->array_pasajeros)){
        ($this->array_pasajeros[$dni])->setNombreP($nombreNuevo);
    }
}


public function modificarApellidoPasajero($dni,$apellidoNuevo){
    
    //verifico que exista el pasajero
    if (array_key_exists($dni, $this->array_pasajeros)){
        ($this->array_pasajeros[$dni])->setApellidoP($apellidoNuevo);
    }
}

public function modificarTelefonoPasajero($dni,$telefonoNuevo){

    //verifico que exista el pasajero
    if (array_key_exists($dni, $this->array_pasajeros)){
        ($this->array_pasajeros[$dni])->setTelefonoP($telefonoNuevo);
    }
}

//funcion/es para responsable del viaje
public function eliminarResponsableV(){
    $this->responsableV = null;
}



//metodo toString    //CORREGIR LA PARTE DE PASAJEROS
public function toString(){
    
        $resultado = "\n". "Vuelo de código: " . $this->codigoViaje .
                      "\n" ." Destino: " . $this->destinoViaje .               
                      "\n".  " Cantidad máxima: " . $this -> maxPasajeros .
                      "\n". "responsable del viaje:" . $this->responsableV;
        
        foreach ($this->array_pasajeros as $pasajero){
           $resultado = $resultado . "  ". $pasajero . "\n";
        }
        return $resultado;
    }


}





























/*
//funciones para "responsable del viaje"




public function modificarNumResponsable($numeroEmpleado){
    $this->responsableV -> setNumEmpleado($numeroEmpleado);
}


public function modificarLicenciaResponsable($numLicencia){
    $this->responsableV -> setNumeroLicencia($numLicencia);
}


public function modificarNombreResponsable($nombreResponsable){
    $this-> responsableV -> setNombreEmpleado($nombreResponsable);
}

public function modificarApellidoResponsable($apellidoResponsable){
    $this-> responsableV -> setApellidoEmpleado($apellidoResponsable);
}
*/
/*
public function agregarPasajero($pasajero){
   
    $dni = $pasajero->getNumDocP();

    //Para no agregar duplicado, verifico que no exista
    if(!array_key_exists($dni, $this->array_pasajeros)){

       $this->array_pasajeros[$dni] = $pasajero;
    }

}*/