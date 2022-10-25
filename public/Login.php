<?php

include '../config/database.php';
$db = new ConectarBD;

$conn=$db->Conexion();

$email=$_POST['email'];
$password=$_POST['password'];

$hashpassword=md5(hash('sha512',$password));

// if($_POST['email']){
//     $truepassword=$conn->get($email);
//     $hashpassword=md5(hash('sha512',$password));
//     if($truepassword==$hashpassword){
//         session_start();
//     }
// }

include '../templates/header.php';
?>


<body>
    <div class="container">
        <div class="row">
            <div class="col-1">
                <picture>
                    <img class="img-fluid w-10 h-10" width="80px" src="img/logo.jpg" alt="biblioteca">
                </picture>
            </div>
            <div class="col">
                <h1 class="text-center Header">Biblioteca Servicios en la Nube</h1>
            </div>
        </div>
    </div>
    <div class="container contenedor">
        <div class="row">
            <div class="col text-center">
                <h1>Inicio de sesión</h1>
            </div>
        </div>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="row">
            <div class="col text-center">
                <label class="" for="email">Ingrese su correo</label>
            </div>
        <div class="row">
            <div class="col text-center">
                <input class="" type="email" placeholder="Correo electrónico" name="email">
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <label class="" for="password">Ingrese su contraseña</label>
            </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <input type="password" name="password">
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
                <a href="Login.php"><p>Registrarse<p></a>
            </div>
        </div>
    </div>
    <?php
    include '../templates/footer.php'
    ?>
</body>
</html>
