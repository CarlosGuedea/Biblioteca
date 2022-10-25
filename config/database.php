<?php

include '../vendor/autoload.php';

class ConectarBD{
    function Conexion(){
        $conn = new PDO('sqlsrv:Server=localhost\\SQLEXPRESS;Database=Hotel', 'usersql', 'root');
        if(!$conn){
            exit;
        }
        return $conn;
    }
}