<?php
//FUNCIONES:



include "viaje.php";
// se crea una objeto y se le asigna a una variable
$viaje= new Viaje(0," ",0,array());



// inicio del menu, con las opciones disponibles a realizar
// int $codigo,$nuevoCodigo,$nuevaCapacidad $capacidadPasajeros, $opcionElegida,$dniPasajero,$opcionModificacion
// string $lugarLlegada,$nuevoDestino,$nombrePasajero,$apellidoPasajero,
// array $pasajeros 


echo "Elegir la opcion a realizar:" . "\n";
echo "Ingresar : "."\n".
     "'1' para cargar informacion de un viaje,"."\n".
     "'2' para modificar datos de un viaje"."\n". 
     "'3' para ver datos de viaje, "."\n".
     "'4' para salir" . "\n";    

      $opcionElegida=trim(fgets(STDIN));

do {
    switch ($opcionElegida){
        case 1:
         //cargar informacion de un viaje 
         echo "Ingresar el codigo del viaje"."\n";
         $codigo=trim(fgets(STDIN));
         $viaje->setCodigoViaje($codigo);
        
         echo "Ingresar el destino del viaje"."\n";
         $lugarLlegada=trim(fgets(STDIN));
         $viaje->setDestino($lugarLlegada);
        
         echo "Ingresar el limite de capacidad de pasajeros que tiene el viaje"."\n";
         $capacidadPasajeros=trim(fgets(STDIN));
         $viaje->setmaxPasajeros($capacidadPasajeros);

         echo "Ingresar nombre del pasajero"."\n";
         $nombrePasajero=trim(fgets(STDIN));
         echo "Ingresar apellido del pasajero"."\n";
         $apellidoPasajero=trim(fgets(STDIN));
         echo "Ingresar dni del pasajero"."\n";
         $dniPasajero=trim(fgets(STDIN));
         $viaje->cargarPasajeros($nombrePasajero,$apellidoPasajero,$dniPasajero);
        ;break;

    
    case 2: 
         // modificar datos de un viaje 
         echo  "Ingresar : "."\n".
         "'1' para modificar datos de un viaje"."\n".
         "'2' para modificar datos de un pasajero"."\n". 
         $opcionModificacion=trim(fgets(STDIN));
         if($opcionModificacion==1){
            echo "Ingresar nuevo codigo de viaje \n";
            $nuevoCodigo=trim(fgets(STDIN));
            $viaje->setCodigoViaje($nuevoCodigo);
            
            echo "Ingresar nuevo destino de viaje \n";
            $nuevoDestino=trim(fgets(STDIN));
            $viaje->setDestino($nuevoDestino);

            echo "Ingresar nuevo limite de capacidad del viaje \n";
            $nuevaCapacidad=trim(fgets(STDIN));
            $viaje->setCodigoViaje($nuevaCapacidad);
         }
         if($opcionModificacion==2){
                                                        // HAY PROBLEMA CON EL ARREGLO, ENTONCES NO PUDE TERMINAR ACA
         }
                    
          
            
            ;break;
    case 3:
         //ver datos de un viaje                        // se "tilda" la terminal
            print_r ($viaje);
            ;break;
    case 4:
        //salir del menu
            ;break;
    default: 
        echo "Ingresar un valor dentro de las opciones iniciales \n";
        $opcionElegida=trim(fgets(STDIN));
   }
} while ($opcionElegida != 4); 