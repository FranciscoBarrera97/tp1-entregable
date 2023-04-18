<?php
class Viaje{
    // Registro de informacion referente a los viajes de la empresa "Viaje Feliz"
   
    // Los atributos son:
    private $codigoViaje;
    private $destinoViaje;
    private $maxPasajeros;
    private $array_pasajeros;
    private $responsableV;




//metodo constructor de la clase Viajes
public function __construct($codigoViaje,$destinoViaje,$maxPasajeros){
   
    $this->codigoViaje=$codigoViaje;
    $this->destinoViaje=$destinoViaje;
    $this->maxPasajeros=$maxPasajeros;
    $this->array_pasajeros=[];                                      
}

//metodos de acceso GET                               //pasajeros y responsable son objetos, por lo que no hay metodos get y set
  

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
public function setArrayPasajeros($arrayPasajeros){
    $this->array_pasajeros=$arrayPasajeros;
}




//mas funciones


public function agregarPasajero($pasajero){
   
    $dni = $pasajero->getNumDocP();

    //Para no agregar duplicado, verifico que no exista
    if(!array_key_exists($dni, $this->array_pasajeros)){

       $this->array_pasajeros[$dni] = $pasajero;
    }

}

public function eliminarPasajero($dni){

        //Verifico que exista
        if (array_key_exists($dni, $this->array_pasajeros)) {
          
            //elimina valores en cierta posicion del array
            unset($this->array_pasajeros[$dni]);
         }
}





//funciones para modificar datos de pasajero (PREGUNTAR EL CASO DEL MODIFICAR DNI DEL PASAJERO)

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





//funciones para "responsable del viaje"

public function agregarResponsableV($responsableV){
    
    $this->responsableV = $responsableV;
}

public function eliminarResponsableV(){
    $this->responsableV = null;
}

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




//metodo toString
public function toString(){
    {
        $resultado =  "Vuelo de código: " . $this->codigoViaje ."\n".
                     " Destino: " . $this->destinoViaje ."\n".
                     " Cantidad máxima: " . $this -> maxPasajeros. "\n";
  
        foreach ($this->array_pasajeros as $pasajero){
           $resultado = $resultado . "  ". $pasajero . "\n";
        }
  
        $resultado = $resultado . $this->responsableV . "\n";
        return $resultado;
    }   
}
}