<?php
//Cerrar sesion y quitar las credenciales al usuario
session_start();
session_unset();
session_destroy();
header('Location: ../index.php');