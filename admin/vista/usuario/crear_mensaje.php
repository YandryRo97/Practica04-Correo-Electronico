<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: SistemaDeGestion/public/vista/login.html");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nuevo Mensaje</title>
        <link rel="stylesheet" rel="stylesheet" href="../../../style.css">
    </head>
    <body>
        <?php $codigo = $_GET['codigo']; ?>
        <nav>
            <ul>
                <li><a href="index.php?codigo=<?php echo $codigo ?>"">Inicio</a></li>
                <li><a href="crear_mensaje.php?codigo=<?php echo $codigo ?>">Crear Mensaje</a></li>
                <li><a href="listar_mensaje.php?codigo=<?php echo $codigo ?>">Mensajes</a></li>
                <li><a href="cuenta.php?codigo=<?php echo $codigo ?>">Perfil</a></li>
                <li><a href="../../../config/cerrar_sesion.php">Cerrar Sesion</a></li>
            </ul>
        </nav>
        <form id="formulario01" method="POST" action="../../controladores/user/crear_mensaje.php">
            <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>">

            <label for="remite">De:</label>
            <input type="text" id="remite" name="remite" value="<?php echo buscarCorreo($codigo) ?>" disabled>
            <br>

            <label for="destino">Para:</label>
            <input type="text" id="destino" name="destino" value="">
            <br>

            <label for="asunto">Asunto: </label>
            <input type="text" id="asunto" name="asunto" value="">
            <br>

            <label for="mensaje">Mensaje</label>
            <input type="text" id="mensaje" name="mensaje" value="">
            <br>

            <input type="submit" id="enviar" name="enviar" value="Enviar">
            <input type="reset" id="cancelar" name="cancelar" value="Cancelar">
        </form>
        <footer>
            <p>Copyright</p>
            <p>Yandry Romero - 05/2019</p>
        </footer>
    </body>
</html>
<?php
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
?>