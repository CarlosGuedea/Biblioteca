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

if(isset($_POST['id'])){

    $id = htmlspecialchars($_POST['id']);
    $nombre = htmlspecialchars($_POST['nombre']);
    $autor = htmlspecialchars($_POST['autor']);
    $editorial = htmlspecialchars($_POST['editorial']);
    $stock = htmlspecialchars($_POST['stock']);

    $query2="UPDATE Libros SET nombre = ?, autor = ?, editorial = ? , stock = ?
    WHERE id = ?";

    $stmt2=$conn->prepare($query2);

    $stmt2->execute([$nombre,$autor,$editorial,$stock,$id]);

    header('Location: almacen.php');

}

include '../templates/header.php';
?>

<body>
<div class="container mt-5">
    <h1>Actualizar información</h1>
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">            
                    <input type="text" class="form-control mb-3" name="id" placeholder="id" value="<?php echo $_POST['id']  ?>">
                                <input type="text" class="form-control mb-3" name="nombre" placeholder="nombre" value="<?php echo $_POST['nombre'] ?>">
                                <input type="text" class="form-control mb-3" name="autor" placeholder="autor" value="<?php echo $_POST['autor']  ?>">
                                <input type="text" class="form-control mb-3" name="editorial" placeholder="editorial" value="<?php echo $_POST['editorial']  ?>">
                                <input type="number" class="form-control mb-3" name="stock" placeholder="stock" value="<?php echo $_POST['stock']  ?>">
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
    <?php
    include '../templates/footer.php'
    ?>
</body>
</html>