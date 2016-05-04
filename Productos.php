<?php
require_once('DB.php');
//require_once('producto.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of servicio
 *
 * @author luis
 */
class Productos {
    /**
     * Obtiene el precio de un producto a partir de un código de producto
     * 
     * @param string $codigo
     * @return int
     */
    public function getPVP($codigo){
    $pvp = DB::getPVP($codigo);
    return $pvp;
    }
    /**
     * Obtiene el stock de un producto en una tienda en concreto
     * 
     * @param string $codigo
     * @param int $codTienda
     * @return int
     */
    public function getStock($codigo,$codTienda) {
        $stock = DB::getStock($codigo, $codTienda);
        return $stock;  
    }
    /**
     * obtiene un array con las familias 
     * 
     * @return array
     */
    public function getFamilias() {       
        $familias = DB::obtieneFamilias();
        return $familias;      
    }
    /**
     * Obtiene los productos de una familia 
     * 
     * @param string $codFamilia
     * @return array
     */
    public function getProductosFamilia($codFamilia) {
        $proFamilias = DB::obtieneProductosFamilia($codFamilia);
        return $proFamilias;
    } 
    /**
     * Inserta los datos de productos en una tabla
     * 
     * @param string $codigo 
     * @param string $nombre 
     * @param string $nombre_corto 
     * @param string $descripcion 
     * @param float $pvp
     * @param string $familia
     *
     */
    public function insertaProductos($codigo,$nombre,$nombre_corto,$descripcion,$pvp,$familia) {
        DB::newProducto($codigo, $nombre, $nombre_corto, $descripcion, $pvp, $familia);
        return 'ok';
        
    }
}
