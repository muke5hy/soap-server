<?php

//serverW.php es el fichero descrito anteriormente, donde se implementan los métodos que se se ofrecen
        require_once 'Productos.php';
        require_once 'WSDLDocument.php'; //script que generará el fichero xml 
 
        $url="http://dwes.com/tarea09/serviciow.php";
        $uri="http://dwes.com/tarea09";
 
 
         //serviciow.php es el fichero que genera el objeto servidor soap 
        $accion = new WSDLDocument("Productos",$url,$uri);
 
      echo  $accion->saveXML(); //Genera el en  navegador el fichero xml que hay que revisar
/* LOS PARAMETROS DE WSDLDOCUMENT(   )
    1º: El nombre de la clase que gestionará las peticiones al servicio.
    2º: La URL en que se ofrece el servicio.
    3º: El espacio de nombres destino.
 * */

