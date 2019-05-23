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
        <title>Mensajes Enviados</title>
        
        <link rel="stylesheet" rel="stylesheet" href="">
    </head>
    <body>
        <?php
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
        <section class="mensajes">
            <h3>Mensajes Enviados</h3>
            <form id="form_mensajes">
                <input type="text" id="correoBuscar" name="correoBuscar" value="" placeholder="Buscar mensaje electronico...">
                <input type="submit" id="buscar" name="buscar" value="Buscar" onclick="buscarCorreo()">
                <table  id="buzon">
                    <tr>
                        <th>Destino</th>
                        <th>Asunto</th>
                        <th>Mensaje</th>
                        <th>Fecha y hora de envio</th>
                    </tr>
                    <?php
                        include '../../../config/conexionBD.php';


                        $sql = "SELECT * FROM correo WHERE cor_usu_remite='$codigo' ORDER BY cor_fecha_envio";
                        $result = $conn->query($sql);
                        

                        if ($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                    echo "<tr>";
                                    echo "<td>".buscarCorreo($row["cor_usu_destino"])."</td>";
                                    echo "<td>" .$row["cor_asunto"]."</td>";
                                    echo "<td>" .$row["cor_mensaje"]."</td>";
                                    echo "<td>" .$row["cor_fecha_envio"]."</td>";
                            }
                        }else{
                            echo "<td colspan=4>No tiene mensajes enviados</td>ERROR";
                        }

                        function buscarCorreo($codigoCorreo){
                            include '../../../config/conexionBD.php';
                            $sql1 = "SELECT usu_correo FROM usuario WHERE usu_codigo='$codigoCorreo'";
                            $result = $conn->query($sql1);
                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    $direccionCorreo=$row["usu_correo"];
                                }
                            }
                            return $direccionCorreo;
                        }

                        

                        $conn->close();
                    ?>
                </table>
            </form>
        </section>
        <footer>
            <p>Copyright</p>
            <p>Yandry Romero - 05/2019</p>
        </footer>
    </body>
</html>