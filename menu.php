<!DOCTYPE html>

<html lang="es">
    <head>
        <title>Menu responsive</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">
        <link rel="stylesheet" type="text/css" href="css/menu.css">
        <link rel="stylesheet" type="text/css" href="css/flaticon.css">
    </head>

<body>
   
    <nav class="menu">
        <ul >
            <li class="submenu"><a href="#"><span class="flaticon-login"></span>Usuario</a>
                <ul>
                    <li><a href="home.php?menu_opcion=usuario_alta" title="Crear un nuevo Usuario"><span class="flaticon-usuario"></span>Alta</a></li>
                    <li><a href="home.php?menu_opcion=usuario_baja_seleccionar" title="Sleccionar y borrar un Usuario"><span class="flaticon-basura"></span>Baja</a></li>
                    <li><a href="home.php?menu_opcion=usuario_modificacion_seleccionar" title="Selecionar y editar un Usuario"><span class="flaticon-pluma"></span>Modificación</a></li>
                    <li><a href="home.php?menu_opcion=usuario_password_seleccionar" title="Seleccionar un usuario y cambiar su contraseña"><span class="flaticon-llave"></span>Cambiar Password</a></li>
                    <li><a href="home.php?menu_opcion=usuario_listar"><span class="flaticon-editar" title="Lista todos los Usuarios"></span>Listar</a></li>
                </ul>
            </li>   
            <li class="submenu"><a href="#"><span class="flaticon-lista"></span>Proyectos</a>
                <ul>
                    <li><a href="home.php?menu_opcion=proyecto_alta" title="Crear un nuevo Proyecto"><span class="flaticon-tareas-1"></span>Alta</a></li>
                    <li><a href="home.php?menu_opcion=proyecto_baja_seleccionar" title="Seleccionar y borrar un Proyecto"><span class="flaticon-basura"></span>Baja</a></li>
                    <li><a href="home.php?menu_opcion=proyecto_modificacion_seleccionar" title="Seleccionar y editar un Proyecto"><span class="flaticon-pluma"></span>Modificación</a></li>
                    <li><a href="home.php?menu_opcion=proyecto_listar" title="Listar todos los Proyectos"><span class="flaticon-editar"></span>Listar</a></li>
                </ul>
            </li>
            <li><a href="home.php?menu_opcion=gestion_listar" title="Gestion de Proyectos"><span class="flaticon-check-list"></span>Gestión</a></li>
            <li><a href="#" title="Usuario actual del sistema"><span class="flaticon-usuario"></span>Usuario: <?php echo $_SESSION['user']; ?></a></li>
            <li><a href="salir.php" title="Salir del sistema"><span class="flaticon-logout"></span>Salir</a></li>
        </ul>
    </nav>

</body>
</html>