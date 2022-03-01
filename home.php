<?php
session_start();
include("conexion.php");
include("usuarios.php");
include("proyectos.php");
include("gestion.php");

if (!isset($_SESSION['user'])) {
	header('Location: login.php');
}else{
    $menu_opcion=$_GET['menu_opcion'];
    $titulo_pagina=titular_pagina($menu_opcion);
	?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Sistema de Gestion de Proyectos</title>
            <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
            <link rel="stylesheet" type="text/css" href="css/estilos.css">
        </head>
        <body>            
            <header>
            	<h1>Sistema de Gestión de Proyectos</h1>
            </header>    	
            <?php
            include("menu.php");
            include("main.php");
            ?>
            <footer>
            </footer>
        </body>
    </html>            
<?php
}
?>