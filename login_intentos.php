<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head lang="es">
        <meta charset="UTF-8">
        <title>Gestion de Tareas - Contraseña Inválida</title>
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
                <h2>Advertencia!!!</h2>	
                <p><span class="icon-alert"></span>Contraseña Inválida.</p> 
                <p>Le quedan <?php echo $_SESSION['usuario_intentos']; ?> intentos de login.</p>
                <input type="submit" value="Volver">
            </form>
        <?php 
        }
        ?>
	</body>
</html>