<?php

include '../vendor/autoload.php';

class ConectarBD{
    function Conexion(){
        $conn = new mysqli('localhost', 'root', 'Particionar22', 'Biblioteca');
        if(!$conn){
            exit;
        }
        return $conn;
    }
}