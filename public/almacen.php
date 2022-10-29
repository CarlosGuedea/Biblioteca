<?php
session_start();

if (isset($_SESSION['contrasena'])){
    
}else{
//Aqui lo redireccionas al lugar que quieras.
    header('Location: index.php');
    die() ;
}
//var_dump(session_id());

include '../config/database.php';
$db = new ConectarBD;

$conn=$db->Conexion();

$query="SELECT * FROM Libros";

$stmt=$conn->query($query);

if(isset($_POST['No_producto'])){

    $No_producto = htmlspecialchars($_POST['No_producto']);
    $Descripción = htmlspecialchars($_POST['Descripción']);
    $Precio = htmlspecialchars($_POST['Precio']);
    $Costo = htmlspecialchars($_POST['Costo']);
    $Existencia = htmlspecialchars($_POST['Existencia']);
    $Incluido = htmlspecialchars($_POST['Incluido']);
    $S_max = htmlspecialchars($_POST['S_max']);
    $S_min = htmlspecialchars($_POST['S_min']);

    $query2="INSERT INTO Masajes (No_producto,Descripción,Precio,Costo,Incluido,Existencia,S_max,S_min)
    VALUES (?,?,?,?,?,?,?,?)";

    $stmt2=$conn->prepare($query2);

    $stmt2->execute([$No_producto,$Descripción,$Precio,$Costo,$Incluido,$Existencia,$S_max,$S_min]);

    header('Location: Masajes_Almacen.php');

}

include '../templates/header.php';
?>
    <body>
            <div class="container mt-5">
                    <div class="row"> 
                        
                        <div class="col-md-3">
                            <a href="Areas.php"><h1>Biblioteca</h1></a>
                            <h1>Ingrese datos</h1>
                                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">

                                <input type="text" class="form-control mb-3" name="No_producto" placeholder="No_producto" value="<?php echo $_POST['No_producto']  ?>">
                                <input type="text" class="form-control mb-3" name="Descripción" placeholder="Descripción" value="<?php echo $_POST['Descripción'] ?>">
                                <input type="number" class="form-control mb-3" name="Precio" placeholder="Precio" value="<?php echo $_POST['Precio']  ?>">
                                <input type="number" class="form-control mb-3" name="Costo" placeholder="Costo" value="<?php echo $_POST['Costo']  ?>">
                                <input type="number" class="form-control mb-3" name="Existencia" placeholder="Existencia" value="<?php echo $_POST['Existencia']  ?>">
                                <input type="number" class="form-control mb-3" name="Incluido" placeholder="Incluido" value="<?php echo $_POST['Incluido']  ?>">
                                <input type="text" class="form-control mb-3" name="S_max" placeholder="S_max" value="<?php echo $_POST['S_max']  ?>">
                                <input type="text" class="form-control mb-3" name="S_min" placeholder="S_min" value="<?php echo $_POST['S_min']  ?>">
                                
                                <input type="submit" class="btn btn-primary">
                                </form>
                        </div>

                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Autor</th>
                                        <th>Editorial</th>
                                        <th>Stock</th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            while($row=$stmt->fetch_assoc()){
                                        ?>
                                            <tr>
                                                <th><?php  echo $row['nombre']?></th>
                                                <th><?php  echo $row['autor']?></th>
                                                <th><?php  echo $row['editorial']?></th>
                                                <th><?php  echo $row['stock']?></th>    
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
                            <th><a href="Masajes_Actualizar.php" class="btn btn-info">Editar</a></th>
                            <th><a href="Masajes_Eliminar.php" class="btn btn-danger">Eliminar</a></th>
                        </div>
                    </div>  
            </div>
            <div class="container">
                <div class="row">
                <th><a href="Masajes_Eliminar.php" class="btn btn-danger">Cerrar Sesión</a></th>
                </div>
            </div>
    <?php
    include '../templates/footer.php'
    ?>
    </body>
</html>