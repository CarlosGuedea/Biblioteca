<?php
//iniciar sesion y darles un identificador unico
session_start();
//En servidores que no son de desarrollo evita que se muestren los errores
error_reporting(0);

if (isset($_SESSION['contrasena'])){
    
}else{
//Aqui lo redireccionas al lugar que quieras.
    header('Location: index.php');
    die() ;
}

include '../config/database.php';
$db = new ConectarBD;

$conn=$db->Conexion();

//Muestra todos los lirbos ingresados en la biblioteca

$query="SELECT * FROM Libros";

$stmt=$conn->query($query);

//Inserte nuevos libros
if(isset($_POST['id'])){

    $id = htmlspecialchars($_POST['id']);
    $nombre = htmlspecialchars($_POST['nombre']);
    $autor = htmlspecialchars($_POST['autor']);
    $editorial = htmlspecialchars($_POST['editorial']);
    $stock = htmlspecialchars($_POST['stock']);

    $query2="INSERT INTO Libros (id,nombre,autor,editorial,stock)
    VALUES (?,?,?,?,?)";

    $stmt2=$conn->prepare($query2);

    $stmt2->execute([$id,$nombre,$autor,$editorial,$stock]);

    header('Location: almacen.php');

}

include '../template/header.php';
?>
    <body>
            <div class="container mt-5">
                    <div class="row"> 
                        
                        <div class="col-md-3">
                            <h1>Biblioteca</h1>
                            <!-- Formulario para ingresar nuevos libros -->
                            <h1>Ingrese datos</h1>
                                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">

                                <input type="text" class="form-control mb-3" name="id" placeholder="id" value="<?php echo $_POST['id']  ?>">
                                <input type="text" class="form-control mb-3" name="nombre" placeholder="nombre" value="<?php echo $_POST['nombre'] ?>">
                                <input type="text" class="form-control mb-3" name="autor" placeholder="autor" value="<?php echo $_POST['autor']  ?>">
                                <input type="text" class="form-control mb-3" name="editorial" placeholder="editorial" value="<?php echo $_POST['editorial']  ?>">
                                <input type="number" class="form-control mb-3" name="stock" placeholder="stock" value="<?php echo $_POST['stock']  ?>">
                                
                                <input type="submit" class="btn btn-primary">
                                </form>
                        </div>

                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Autor</th>
                                        <th>Editorial</th>
                                        <th>Stock</th>
                                    </tr>
                                </thead>
                                    <!-- Formulario para mostrar los libros ya ingresados -->
                                <tbody>
                                        <?php
                                            while($row=$stmt->fetch_assoc()){
                                        ?>
                                            <tr>
                                                <th><?php  echo $row['id']?></th>
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
                            <th><a href="actualizar.php" class="btn btn-info">Editar</a></th>
                            <th><a href="eliminar.php" class="btn btn-danger">Eliminar</a></th>
                        </div>
                    </div>  
            </div>
            <div class="container">
                <div class="row">
                <th><a href="cerrar.php" class="btn btn-danger button-cerrar">Cerrar Sesión</a></th>
                </div>
            </div>
    <?php
    include '../template/footer.php'
    ?>
    </body>
</html>