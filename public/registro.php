<?php
session_start();
session_unset();
error_reporting(0);

include '../config/database.php';
$db = new ConectarBD;

$conn=$db->Conexion();

if(isset($_POST['No_cuenta'])){
    $No_cuenta=htmlspecialchars($_POST['No_cuenta']);
    $contrasena=htmlspecialchars($_POST['contrasena']);
    $hashcontrasena=md5(hash('sha512',$contrasena));
    $query="Insert into Login (No_cuenta,contrasena) values (?,?)";
    $stmt=$conn->prepare($query);
    $stmt->execute([$No_cuenta,$hashcontrasena]);
}

include '../templates/header.php';
?>


<body>
    <div class="container contenedor">
        <div class="row">
            <div class="col text-center">
                <h1>Registro</h1>
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
                <label class="" for="password">Ingrese su contraseña</label>
            </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <input type="password" placeholder="contraseña" name="contrasena">
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <input type="submit" class="btn btn-primary mt-2" value="Registrarse">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <p>¿Ya tienes una cuenta?<p>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <a href="index.php"><p>Iniciar Sesión<p></a>
            </div>
        </div>
    </div>
    <?php
    include '../templates/footer.php'
    ?>
</body>
</html>
