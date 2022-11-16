<?php
//iniciar sesion y darles un identificador unico
session_start();
session_unset();
//En servidores que no son de desarrollo evita que se muestren los errores
error_reporting(0);

//Hacer la conexión con la base de datos
include 'config/database.php';
$db = new ConectarBD;

$conn=$db->Conexion();

//Se revisa si la variables POST están llenas para hacer las validaciones necesarias
if(isset($_POST['No_cuenta'])){
    $No_cuenta=htmlspecialchars($_POST['No_cuenta']);
    $contrasena=htmlspecialchars($_POST['contrasena']);
    $hashcontrasena=md5(hash('sha512',$contrasena));
    $query="SELECT * FROM Login where No_cuenta = $No_cuenta";
    $stmt=$conn->query($query);
    $row=$stmt->fetch_assoc();
    $truecontrasena=$row['contrasena'];

    //Se comprueba que la contraseña introducida sea igual a la contraseña guardada
    if($truecontrasena==$hashcontrasena){
        $_SESSION['contrasena']=$truecontrasena;
        //Redirige a la pagina de almacen
        header('Location: public/almacen.php');

    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/normalize.css">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
    <div class="container">
        <div class="row">
            <div class="col-1">
                <picture>
                    <img class="img-fluid w-10 h-10" width="80px" src="public/img/logo.jpg" alt="biblioteca">
                </picture>
            </div>
            <div class="col">
                <h1 class="text-center Header">Biblioteca Servicios en la Nube</h1>
            </div>
        </div>
    </div>

<body>
    <div class="container contenedor">
        <div class="row">
            <div class="col text-center">
                <h1>Inicio de sesión</h1>
            </div>
        </div>
        <!-- Formulario para el inicio de sesión -->
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="row">
            <div class="col text-center">
                <label class="" for="No_cuenta">Ingrese su No de cuenta</label>
            </div>
        <div class="row">
            <div class="col text-center">
                <input class="" type="number" placeholder="No_cuenta" name="No_cuenta">
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <label class="" for="password">Ingrese su Contraseña</label>
            </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <input type="password" placeholder="contraseña" name="contrasena">
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <input type="submit" class="btn btn-primary mt-2" value="Log In">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <p>¿No tienes una cuenta?<p>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <!-- Redirige a la pagina para crear un usuario -->
                <a href="public/registro.php"><p>Registrarse<p></a>
            </div>
        </div>
    </div>
    <?php
    include 'template/footer.php'
    ?>
</body>
</html>
