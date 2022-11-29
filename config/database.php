<?php
//Se incluye el archivo de composer
include '../vendor/autoload.php';

//Clase para la conexión de la base de datoss
class ConectarBD{
    function Conexion(){
        $conn=mysqli_init(); 
        mysqli_real_connect($conn, "serviciosnube.mysql.database.azure.com", "CarlosGuedea@serviciosnube", "Particionar22", "Biblioteca", 3306);
        if(!$conn){
            exit;
        }
        return $conn;
    }
}