<?php


class DB {

    protected static function ejecutaConsulta($sql) {
        $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $dsn = "mysql:host=localhost;dbname=tarea6";
        $usuario = 'dwes';
        $contrasena = 'abc123.';

        $dwes = new PDO($dsn, $usuario, $contrasena, $opc);
        $resultado = null;
        if (isset($dwes)) {
            $resultado = $dwes->query($sql);
        }
        return $resultado;
    }

    public static function obtieneFamilias() {
        $sql = "SELECT cod FROM familia;";
        $resultado = self::ejecutaConsulta($sql);
        $familias = array();

        if ($resultado) {
            // Añadimos un elemento por cada producto obtenido
            $row = $resultado->fetch();
            while ($row != null) {
                $familias[] = $row;
                $row = $resultado->fetch();
            }
        }

        return $familias;
    }

    public static function obtieneProductosFamilia($familia) {
        $sql = "SELECT cod FROM producto WHERE familia='" . $familia . "'";
        $resultado = self::ejecutaConsulta($sql);
        $codigos = array();

        if ($resultado) {
            // Añadimos un elemento por cada producto obtenido
            $row = $resultado->fetch();
            while ($row != null) {
                $codigos[] = $row;
                $row = $resultado->fetch();
            }
        }

        return $codigos;
    }

    public static function getStock($codigo, $codTienda) {

        $sql = "SELECT stock.unidades FROM stock JOIN tienda ON tienda.cod = stock.tienda WHERE tienda.cod='" . $codTienda . "' AND stock.producto='" . $codigo . "'";
        $resultado = self::ejecutaConsulta($sql);
        if ($resultado) {
            $stock = $resultado->fetch();
        }

        return $stock;
    }

    public static function getPVP($codigo) {
        $sql = "SELECT PVP FROM producto";
        $sql .= " WHERE cod='" . $codigo . "'";
        $resultado = self::ejecutaConsulta($sql);

        if ($resultado) {
            $pvp = $resultado->fetch();
        }

        return $pvp;
    }
    
    public static function newProducto($codigo,$nombre,$nombre_corto,$descripcion,$pvp,$familia){
       
        $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $dsn = "mysql:host=localhost;dbname=tarea6";
        $usuario = 'dwes';
        $contrasena = 'abc123.';
        $dwes = new PDO($dsn, $usuario, $contrasena, $opc);
        $sql = "INSERT INTO producto (cod, nombre, nombre_corto, descripcion, PVP, familia)VALUES('$codigo','$nombre','$nombre_corto','$descripcion','$pvp','$familia')";
        $dwes->exec($sql);
    }
    

}
