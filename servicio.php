<?php

$url = "http://dwes.com/tarea09/serviciow.php";
$uri = "http://dwes.com/tarea09/";
 
//Creamos un cliente para llamar a esa URL. 
//Es obligatorio establecer el parámetro 'uri' al no tener WSDL , igual que ocurría al instanciar el objeto SoapServer
 
$cliente = new SoapClient(null, array('location'=>$url,'uri'=>$uri));

$familias = $cliente->getFamilias();
$stock = $cliente->getStock("OPTIOLS1100",1);
$pvp = $cliente->getPVP("SMSN150101LD");
$proFamilia = $cliente->getProductosFamilia("ORDENA");
print_r($familias);
echo '<br>-------<br>';
print_r($stock);
echo '<br>-------<br>';
print_r($pvp);
echo '<br>-------<br>';
print_r($proFamilia);