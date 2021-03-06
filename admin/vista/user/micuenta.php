<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: /SistemaDeGestion/public/vista/login.html");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mi Cuenta</title>
        <link rel="stylesheet" rel="stylesheet" href="../../../css/correo.css">
    </head>
    <body>
        <?php 
        include '../../../config/conexionBD.php';
        $codigo = $_GET['codigo']; 
        ?>
        <nav>
            <ul>
                <li><a href="index.php?codigo=<?php echo $codigo ?>"">Principal</a></li>
                <li><a href="nuevo_mensaje.php?codigo=<?php echo $codigo ?>">Crear Mensaje</a></li>
                <li><a href="mensajes_enviados.php?codigo=<?php echo $codigo ?>">Mensajes Enviados</a></li>
                <li><a href="micuenta.php?codigo=<?php echo $codigo ?>">Perfil</a></li>
                <li><a href="../../../config/cerrar_sesion.php">Cerrar Sesion</a></li>
            </ul>
        </nav>
        <section class="info">
            <?php
                $sqli ="SELECT usu_imagen,usu_nombres,usu_apellidos FROM usuario WHERE usu_codigo='$codigo'";
                $stm = $conn->query($sqli);
                while ($datos = $stm->fetch_object()){
            ?>
                <p><?php echo $datos->usu_nombres." ".$datos->usu_apellidos ?></p>
                <img class="imagen"src="data:image/jpg; base64,<?php echo base64_encode($datos->usu_imagen) ?>">
            <?php   
                }
            ?>
        </section>
        <table id="buzon">
            <tr>
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Fecha Nacimiento</th>
                <th>Foto Perfil</th>
                <th>Editar Datos</th>
                <th>Cambiar contrasena</th>
            </tr>

            <?php
                include '../../../config/conexionBD.php';

                $sql = "SELECT * FROM usuario WHERE usu_codigo='$codigo'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        if($row["usu_eliminado"]!='S'){
                            echo "<tr>";
                            echo "<td>" .$row["usu_cedula"]."</td>";
                            echo "<td>" .$row["usu_nombres"]."</td>";
                            echo "<td>" .$row["usu_apellidos"]."</td>";
                            echo "<td>" .$row["usu_direccion"]."</td>";
                            echo "<td>" .$row["usu_telefono"]."</td>";
                            echo "<td>" .$row["usu_correo"]."</td>";
                            echo "<td>" .$row["usu_fecha_nacimiento"]."</td>";
                            echo "<td class='accion'><a href='cambiar_imagen.php?codigo=".$row['usu_codigo']."'>Editar</a></td>";
                            echo "<td class='accion'><a href='modificar.php?codigo=".$row['usu_codigo']."'>Modificar</a></td>";
                            echo "<td class='accion'><a href='cambiar_contrasena.php?codigo=".$row['usu_codigo']."'>Cambiar contrasena</a></td>";
                        }
                    }
                }else{
                    echo "<tr>";
                    echo "<td colspan='8'>No existen usuarios registrados en el sistema</td>";
                    echo "</tr>";
                }
                $conn->close();
            ?>
        </table>
        <footer>
            <p>Copyright</p>
            <p>Yandry Romero - 05/2019</p>
        </footer>
    </body>
</html>