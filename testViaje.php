<?php

include_once "Viaje.php";         
include_once "pasajero.php"; 
include_once "pasajeroEspecial";
include_once "pasajeroVip";     
include_once "pasajeroEstandar.php";
include_once "responsableV.php";


$viaje= new Viaje(0,null,0,[], null, 0, 0 );



$opcionElegida=-1;   
while ($opcionElegida != 0 ){

      echo "-------------------------------------------\n";
      echo "|       Seleccione una opción             |\n";
      echo "-------------------------------------------\n";
      echo "| 1. Opción 1:  Crear un viaje            |\n";
      echo "| 2. Opción 2:  Añadir pasajero           |\n";
      echo "| 3. Opción 3:  Eliminar pasajero         |\n";
      echo "| 4. Opción 4:  Modificar pasajero        |\n";
      echo "| 5. Opción 5:  Cambiar código            |\n";  
      echo "| 6. Opción 6:  Cambiar destino           |\n";  
      echo "| 7. Opción 7:  Cambiar cantidad máxima   |\n";  
      echo "| 8. Opción 8:  Crear responsable viaje   |\n";
      echo "| 9. Opción 9:  Eliminar responsable      |\n";
      echo "| 10. Opción 10: Modificar responsable    |\n";
      echo "| 11. Opción 11: Mostrar viaje            |\n";
      echo "------------------------------------------\n";
      echo "| 0. Salir                                |\n";
      echo "------------------------------------------\n";
  

      $opcionElegida=readline("Ingrese una opción: ");   /* nota: es similar que usar trim(fgets(STDIN)), pero mas corto y devuelve un string */

      switch ($opcionElegida){
            case "1" : //crear viaje (se modifican los datos del objeto $viaje inicializado)

                  $codigo = readline("Ingrese el código del viaje: ");
                  $destino = readline("Ingrese el destino del viaje: ");
                  $cantMax =  readline("Ingrese la cantidad máxima del viaje: ");
                  $costoInicial= readline("Ingrese el costo inicial del viaje: ");

                  $viaje->setCodigoViaje($codigo);
                  $viaje->setDestinoViaje($destino);
                  $viaje->setMaxPasajeros($cantMax);
                  $viaje->setCostoViaje($costoInicial);
                  
            break;

                              
            case "2" : //añadir pasajero
                 
                  if ($viaje === null) {                                //VER SI CORRE ESTO,ya que el viaje se inicializa "null"

                        echo "Primero, debe crear el viaje en la opción 1 \n";
                    } else {
        
                        $dni = readline("Ingrese el dni del pasajero: ");
                        $nombre = readline("Ingrese el nombre del pasajero: ");
                        $apellido =  readline("Ingrese el apellido del pasajero: ");
                        $telefono = readline("Ingrese el telefono del pasajero: ");
                        
                        echo "Ingrese '1' si el pasajero es estandar, '2' si es VIP o '3' si es especial". "\n";
                        $tipoPasajero= trim(fgets(STDIN));
                        if(($tipoPasajero >3) || ($tipoPasajero<1)){
                              echo "debe elegir un valor entre 1 y 3";
                              $tipoPasajero= trim(fgets(STDIN));
                        }else{
                              if ($tipoPasajero==1){
                                    //creo pasajero estandar
                                    $nuevoPasajero= new PasajeroEstandar($dni,$nombre,$apellido,$telefono, null, null);
                              }
                              if ($tipoPasajero==2){
                                    //creo pasajero vip
                                    $nViajeroFrecuente= readline("Ingrese el numero de viajero frecuente: ");
                                    $totalMillas= readline ("Ingrese la cantidad de millas del pasajero vip: ");
                                    
                                    $nuevoPasajero= new PasajeroVip($dni,$nombre,$apellido,$telefono, null, null,$nViajeroFrecuente,$totalMillas);
                              }
                             
                              if ($tipoPasajero==3){
                              //creo pasajero especial 
                              // $contNecesidades se refiere a la cantidad de servicios que requiere el pasajero especial
                                    $contNecesidades=0;
                                    echo "Necesita servicios especiales?" . "\n";
                                    $rta= trim(fgets(STDIN));
                                    if(($rta=="si") || ($rta=="s") || ($rta=="S")){
                                          $contNecesidades=$contNecesidades + 1;
                                    }
                                    
                                    echo "Necesita Asistencia?" . "\n";
                                    $rta= trim(fgets(STDIN));
                                    if(($rta=="si") || ($rta=="s") || ($rta=="S")){
                                          $contNecesidades=$contNecesidades + 1;
                                    }

                                    echo "Necesita servicios especiales? s/n" . "\n";
                                    $rta= trim(fgets(STDIN));
                                    if(($rta=="si") || ($rta=="s") || ($rta=="S")){
                                          $contNecesidades=$contNecesidades + 1;
                                    }

                                    $nuevoPasajero= new PasajeroEspecial($dni, $nombre, $apellido, $telefono, null,null, $contNecesidades);
                              }
                        }
                        //veo si hay lugar para incluir pasajero 
                        $hayDisponibilidad= $viaje->hayPasajeDisponible();
                        if($hayDisponibilidad==true){
                               //Tengo que aplicar la funcion venderPasaje($objPasajero)
                               $viaje->venderPasaje($nuevoPasajero);                                  //duda con el retorno de esta funcion
                              
                              //Si se logra vender el pasaje, habria que completar los atributos del pasajero?
                              $nAsiento= readline ("Ingrese numero de asiento del pasajero: ");
                              $nTicket= readline ("ingrese numero de ticket del pasajero: ");
                              $nuevoPasajero->setNumAsiento($nAsiento);
                              $nuevoPasajero-> setNumTicket($nTicket);
                        }     
                         
                    }
        
            break;

            case "3" : //eliminar pasajero
                  if ($viaje === null) {

                        echo "Primero, debe crear el viaje en la opción 1 \n";
                    } else {
        
                        $dni = readline("Ingrese el dni del pasajero a eliminar: ");
        
                        $viaje->eliminarPasajero($dni);
                    }
            break;

            case "4" : //modificar pasajero
                  $opcion_modificar = -1;
                  while($opcion_modificar!=0) {
                        echo "-----------------------------------------\n";
                        echo "|       Seleccione una opción           |\n";
                        echo "-----------------------------------------\n";
                        echo "| 1. Opción 1:  Modificar dni           |\n"; 
                        echo "| 2. Opción 2:  Modificar nombre        |\n";
                        echo "| 3. Opción 3:  Modificar el apellido   |\n";
                        echo "| 4. Opción 4:  Modificar teléfono      |\n";
                        echo "----------------------------------------\n";
                        echo "| 0. Salir                              |\n";
                        echo "---------------------------------------\n";
                        
                        $opcion_modificar=readline("Seleccione la opcion a realizar: ");

                        switch($opcion_modificar){
                              case "1":  
                                  //modificar el dni
                                    $opcion_modificar=0;
                                    
                              break;

                              case "2": 
                                    if ($viaje === null) {
            
                                        echo "No existe el viaje aún \n";
                                        $opcion_modificar = 0;
                                        
                                    } else {
                                        
                                        $dni = readline("Ingrese el dni del pasajero a modificar: ");
                                        $nombreNuevo = readline("Ingrese el nuevo nombre: ");
            
                                        $viaje->modificarNombrePasajero($dni, $nombreNuevo);
                                    }
                              break;

                              case "3":
                                    if ($viaje === null) {
            
                                          echo "No existe el viaje aún \n";
                                          $opcion_modificar = 0;
                                    }else{     
                                           $dni = readline("Ingrese el dni del pasajero a modificar: ");
                                          $apellidoNuevo= readline("Ingrese el nuevo apellido: ");

                                          $viaje->modificarApellidoPasajero($dni,$apellidoNuevo);
                                    }
                               break;

                              case "4":
                                    if ($viaje === null) {
            
                                          echo "No existe el viaje aún \n";
                                          $opcion_modificar = 0;
                                    }else{
                                          $dni = readline("Ingrese el dni del pasajero a modificar: ");
                                          $telefonoNuevo= readline("Ingrese el nuevo telefono: ");
      
                                          $viaje->modificarTelefonoPasajero($dni,$telefonoNuevo);
                                    }
                              break;

                              case "0":
                                    echo "volviendo al menu principal \n";
                              break;
                        }//cierra el switch con la opcion a modificar
                  }// cierra el while del $opcion_modificar
            break;

            case "5" : //cambiar codigo del viaje
                  //primero verifico que el viaje exista
                  if ($viaje === null) {
                        echo "Primero, debe crear el viaje en la opción 1 \n";
                    } else {
                        $nuevoCodigo= readline("Ingrese el nuevo codigo del viaje");
                        $viaje->setCodigoViaje($nuevoCodigo);
                    }
                  
            break;

            case "6" :  //cambiar el destino del viaje
                   //primero verifico que el viaje exista
                   if ($viaje === null) {
                        echo "Primero, debe crear el viaje en la opción 1 \n";
                    } else {
                        $nuevoDestino= readline("Ingrese el nuevo destino del viaje");
                        $viaje->setDestinoViaje($nuevoDestino);
                    }
            break;

            case "7" : //modificar la cantida maxima de pasajeros del viaje 
                  //primero verifico que el viaje exista
                  if ($viaje === null) {
                        echo "Primero, debe crear el viaje en la opción 1 \n";
                    } else {
                        $nuevaCapacidad= readline("Ingrese la nueva capacidad maxima del viaje");
                        $viaje->setMaxPasajeros($nuevaCapacidad);
                    }
            break;

            case "8" : //crear responsable del viaje
                  $nombre_responsable = readline("Ingrese el nombre del responsable: ");
                  $apellido_responsable = readline("Ingrese el apellido del responsable: ");
                  $numero_empleado = readline("Ingrese el numero de empleado del responsable: ");
                  $numero_licencia = readline("Ingrese el numero de licencia del responsable: ");
                  
                  $responsable= new ResponsableV( $numero_empleado,$numero_licencia, $nombre_responsable, $apellido_responsable);
                  $viaje->setResponsableV($responsable);
            break;

            case "9" : //eliminar responsable del viaje;

                  $viaje->eliminarResponsableV();
            break;

            case "10" : //modificar responsable del viaje;
                  $opcionACambiar = -1;
                  while($opcionACambiar !=0) {
                        echo "--------------------------------------------------------\n";
                        echo "|       Seleccione una opción                         |\n";
                        echo "--------------------------------------------------------\n";
                        echo "| 1. Opción 1:  Modificar numero de empleado          |\n";
                        echo "| 2. Opción 2:  Modificar numero de licencia          |\n";
                        echo "| 3. Opción 3:  Modificar el nombre del responsable   |\n";
                        echo "| 4. Opción 4:  Modificar el apellido del responsable |\n";
                        echo "----------------------------------------------------\n";
                        echo "| 0. Salir                                            |\n";
                        echo "----------------------------------------------------\n";

                        $opcionACambiar=readline ("seleccione la opcion a realizar");

                        switch($opcionACambiar){
                              case "1": //modificar numero de empleado
                                   $nuevoNumeroEmpleado= readline("Ingrese el nuevo numero de empleado: ") . "\n";
                                   $responsable->setNumEmpleado($nuevoNumeroEmpleado);
                              break;
                              
                              case "2": //modificar numero de licencia
                                    $nuevoNumLicencia= readline("Ingrese el nuevo numero de licencia del empleado: ") . "\n";
                                    $responsable->setNumeroLicencia($nuevoNumLicencia);
                              break;
                              
                              case "3": //modificar nombre del responsable
                                    $nuevoNombreEmpleado= readline("Ingrese el nuevo nombre del empleado: ") . "\n";
                                    $responsable->setNombreEmpleado($nuevoNombreEmpleado);
                              
                              break;
                         
                               case "4": //modificar apellido del responsable
                                    $nuevoNumeroEmpleado= readline("Ingrese el nuevo apellido del empleado: ") . "\n";
                                    $responsable-> setApellidoEmpleado($nuevoNumeroEmpleado);
                              break;
                   
                              case "0":
                                    echo "volviendo al menu principal \n";
                              break;
                        }//cierra el switch de $opcionACambiar
                  }//cierra el  while de $opcionACambiar
            break;



            case "11" :  //ver datos del viaje;

                  echo $viaje . "\n";
            break;
            
            case "0" :
                  echo "saliendo del menu";
            break;


      }//CIERRA EL  switch ($opcionElegida)

}//cierra el while ($opcionElegida != 0 )



  