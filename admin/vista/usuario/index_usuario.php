<?php
    include '../../../config/verificar_sesion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Correo Electronico</title>
</head>
<body>
    <h1 style= "text-align:center">Correo Electronico</h1>
    <?php
        /*$sql = "SELECT * FROM mensaje WHERE men_usu_destinatario='".$_SESSION['usuario']."' and leido IS NULL";
        $res = $conn->query($sql);*/
    ?>
    Menu: <a href="../../../public/controladores/crear_mensaje.php">Crear mensajes</a> | <a href="../../../config/cerrar_sesion.php">Cerrar sesion</a><br /><br />

    
    
    
</body>
</html>