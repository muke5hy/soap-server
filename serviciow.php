<?php
// creo el servidor y añado la clase productos
require_once 'Productos.php';

    $uri = "http://dwes.com/tarea09/";
    $server = new SoapServer(null, array('uri'=>$uri));
    $server->setClass('Productos');
    $server->handle();

