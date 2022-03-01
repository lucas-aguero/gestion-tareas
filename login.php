<?php
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head lang="es">
        <meta charset="UTF-8">
        <title>Gestion de Tareas - Login</title>
        <meta charset="UTF-8">		
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="css/fontello.css">
        <link rel="stylesheet" href="css/login.css">

    </head>

    <body>
        <?php
         if (isset($_SESSION['user'])) {
            header('Location: home.php?menu_opcion=gestion_listar');
        }else{
        ?>
            <form action="login_db.php" method="post">
                <h2>Login</h2>
                <input type="text" name="usuario_user" id="usuario_user" placeholder="&#128100; Usuario">
                <input type="password" name="usuario_password" id="usuario_password" placeholder="&#128273; Contraseña">
                <input type="submit" name="btn_frm_enviar" value="Ingresar"><br>
            </form>
        <?php
        }
        ?>
	</body>
</html>