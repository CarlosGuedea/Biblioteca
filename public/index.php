<?php
session_start();
session_unset();

include '../config/database.php';
$db = new ConectarBD;

$conn=$db->Conexion();

if(isset($_POST['No_cuenta'])){
    $No_cuenta=htmlspecialchars($_POST['No_cuenta']);
    $contrasena=htmlspecialchars($_POST['contrasena']);
    $hashcontrasena=md5(hash('sha512',$contrasena));
    $query="SELECT * FROM Login where No_cuenta = $No_cuenta";
    $stmt=$conn->query($query);
    $row=$stmt->fetch_assoc();
    $truecontrasena=$row['contrasena'];

    if($truecontrasena==$hashcontrasena){
        $_SESSION['contrasena']=$truecontrasena;
        header('Location: almacen.php');

    }
}

include '../templates/header.php';
?>


<body>
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
