<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Gestion de Tareas</title>
    </head>
    <body>
    	<?php
    	if (!isset($_SESSION['user'])) {
    		header('Location: login.php');
     	}else{
     		header('Location: home.php');
     	}
     	?>
    </body>
</html>
