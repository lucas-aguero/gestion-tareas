<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head lang="es">
        <meta charset="UTF-8">
        <title>Gestion de Tareas - 404</title>
        <meta charset="UTF-8">		
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="css/fontello.css">
        <link rel="stylesheet" href="css/login.css">
    </head>

    <body>
        <?php
        session_start();
        if (isset($_SESSION['user'])) {
            header('Location: home.php');
        }else{
        ?>        
            <form action="index.php">
                <h2>Error</h2>	
                <p><span class="icon-alert"></span>Usuario no valido.</p> 
                <p>Por favor ingrese al sistema con un usuario y contraseña válidos.</p>
                <input type="submit" value="Volver">
            </form>
        <?php 
        }
        ?>
	</body>
</html>