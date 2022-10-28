<?php

include '../config/database.php';
$db = new ConectarBD;

$conn=$db->Conexion();

$No_cuenta=htmlspecialchars($_POST['No_cuenta']);
$contrasena=htmlspecialchars($_POST['contrasena']);

$hashcontrasena=md5(hash('sha512',$contrasena));

if(isset($_POST['No_cuenta'])){
    $query="SELECT * FROM Login where No_cuenta = $No_cuenta";
    $stmt=$conn->query($query);
    $row=$stmt->fetch_assoc();
    var_dump($row);
    $truecontrasena=$row['contrasena'];
    $hashcontrasena=md5(hash('sha512',$contrasena));

    if($truecontrasena==$hashcontrasena){
        echo 'Usuario Logeado exitosamente';
        session_start();

    }
}

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
                <a href="registro.php"><p>Registrarse<p></a>
            </div>
        </div>
    </div>
    <?php
    include '../templates/footer.php'
    ?>
</body>
</html>
