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
        <title>Nuevo Mensaje</title>
        <link rel="stylesheet" rel="stylesheet" href="../../../css/mensaje.css">
    </head>
    <body>
        <?php $codigo = $_GET['codigo']; ?>
        <nav>
            <ul>
                <li><a href="index.php?codigo=<?php echo $codigo ?>"">Principal</a></li>
                <li><a href="nuevo_mensaje.php?codigo=<?php echo $codigo ?>">Crear Mensaje</a></li>
                <li><a href="mensajes_enviados.php?codigo=<?php echo $codigo ?>">Mensajes Enviados</a></li>
                <li><a href="micuenta.php?codigo=<?php echo $codigo ?>">Perfil</a></li>
                <li><a href="../../../config/cerrar_sesion.php">Cerrar Sesion</a></li>
            </ul>
        </nav>
        <form id="formulario01" method="POST" action="../../controladores/user/nuevo_mensaje.php">
            <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>">

            

            <label for="destino">Para:</label>
            <input type="text" id="destino" name="destino" value="">
            <br>

            <label for="destino">Asunto:</label>
            <input type="text" id="asunto" name="asunto" value="">
            <br>

           
            <input type="text" class="mensaje" id="mensaje" name="mensaje" value="">
            <br>

            <input type="submit" id="enviar" name="enviar" value="Enviar    ">
            <input type="reset" id="cancelar" name="cancelar" value="Cancelar" onclick="location.href='index.php'">
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