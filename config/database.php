<?php
//Se incluye el archivo de composer
include '../vendor/autoload.php';

//Clase para la conexión de la base de datoss
class ConectarBD{
    function Conexion(){
        $conn = new mysqli('localhost', 'root', 'Particionar22', 'Biblioteca');
        if(!$conn){
            exit;
        }
        return $conn;
    }
}