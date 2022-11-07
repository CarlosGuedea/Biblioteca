<?php
session_start();

if (isset($_SESSION['contrasena'])){
    
}else{
//Aqui lo redireccionas al lugar que quieras.
    header('Location: index.php');
    die() ;
}

include '../config/database.php';
$db = new ConectarBD;

$conn=$db->Conexion();

$id = htmlspecialchars($_POST['id']);

if(isset($_POST['id'])){
    $query2="DELETE FROM Libros WHERE id = $id";

    $stmt2=$conn->prepare($query2);

    $stmt2->execute();

    header('Location: almacen.php');

}

include '../templates/header.php';
?>

<body>
<div class="container mt-5">
    <h1>Introduzca el ID que desea eliminar</h1>
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">            
                    <input type="text" class="form-control mb-3" name="id" placeholder="ID" value="<?php echo $_POST['id']  ?>">
                            <input type="submit" class="btn btn-primary btn-danger" value="Eliminar">
                    </form>
                    
                </div>
    <?php
    include '../templates/footer.php'
    ?>
</body>
</html>