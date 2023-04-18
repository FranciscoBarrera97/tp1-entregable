<?php

include "viaje.php";
include "pasajero.php";
include "responsableV.php";

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
  

      $opcionElegida=readline("Ingrese una opción: ");   // nota: es similar que usar trim(fgets(STDIN)), pero mas corto y devuelve un string

      switch ($opcionElegida){
            case "1" : //crear viaje

                  $codigo = readline("Ingrese el código del viaje: ");
                  $destino = readline("Ingrese el destino del viaje: ");
                  $cantMax =  readline("Ingrese la cantidad máxima del viaje: ");

                  $viaje = new Viaje($codigo, $destino, $cantMax);
            break;

                              
            case "2" : //añadir pasajero
                 
                  if ($viaje === null) {

                        echo "Primero, debe crear el viaje en la opción 1 \n";
                    } else {
        
                        $dni = readline("Ingrese el dni del pasajero: ");
                        $nombre = readline("Ingrese el nombre del pasajero: ");
                        $apellido =  readline("Ingrese el apellido del pasajero: ");
                        $telefono = readline("Ingrese el telefono del pasajero: ");
        
        
                        $nuevoPasajero = new Pasajero($dni, $nombre, $apellido, $telefono);
        
                        $viaje->agregarPasajero($nuevoPasajero);
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
                        echo "| 1. Opción 1:  Modificar dni           |\n"; // Preguntar si es necesario cambiar, porque se supone que un pasajero no cambia de dni, es unico
                        echo "| 2. Opción 2:  Modificar nombre        |\n";
                        echo "| 3. Opción 3:  Modificar el apellido   |\n";
                        echo "| 4. Opción 4:  Modificar teléfono      |\n";
                        echo "----------------------------------------\n";
                        echo "| 0. Salir                              |\n";
                        echo "---------------------------------------\n";
                        
                        $opcion_modificar=readline("Seleccione la opcion a realizar: ");

                        switch($opcion_modificar){
                              case "1":  
                                  $opcion_modificar=0;
                                    //modificar el dni (PREGUNTAR)
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
                  $viaje->agregarResponsableV($responsable);
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
                                   $viaje->modificarNumResponsable($nuevoNumeroEmpleado);
                              break;
                              
                              case "2": //modificar numero de licencia
                                    $nuevoNumLicencia= readline("Ingrese el nuevo numero de licencia del empleado: ") . "\n";
                                    $viaje->modificarLicenciaResponsable($nuevoNumLicencia);
                              break;
                              
                              case "3": //modificar nombre del responsable
                                    $nuevoNombreEmpleado= readline("Ingrese el nuevo nombre del empleado: ") . "\n";
                                    $viaje->modificarNombreResponsablele($nuevoNombreEmpleado);
                              
                              break;
                         
                               case "4": //modificar apellido del responsable
                                    $nuevoNumeroEmpleado= readline("Ingrese el nuevo apellido del empleado: ") . "\n";
                                    $viaje-> setApellidoEmpleado($nuevoNumeroEmpleado);
                              break;
                   
                              case "0":
                                    echo "volviendo al menu principal \n";
                              break;
                        }//cierra el switch de $opcionACambiar
                  }//cierra el  while de $opcionACambiar
            break;



            case "11" :  //ver datos del viaje;

                  echo $viaje;
            break;
            
            case "0" :
                  echo "saliendo del menu";
            break;


      }//CIERRA EL  switch ($opcionElegida)

}//cierra el while ($opcionElegida != 0 )



  