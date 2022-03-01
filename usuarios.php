<?php

function usuario_guardar($db_datos,$datos_formulario,$operacion){

    if (isset($operacion)){
        switch ($operacion){
            case 'usuario_alta_guardar':
                $usuario_nombre=ucwords($datos_formulario['usuario_nombre']);
                $usuario_apellido=ucwords($datos_formulario['usuario_apellido']);
                $usuario_email=$datos_formulario['usuario_email'];
                $usuario_user=$datos_formulario['usuario_user'];
                $usuario_password=$datos_formulario['usuario_password'];                
                $consulta="INSERT INTO usuarios (usuario_nombre,usuario_apellido,usuario_user,usuario_password,usuario_email) VALUES ('$usuario_nombre','$usuario_apellido','$usuario_user','$usuario_password','$usuario_email')";
                break;
            case 'usuario_baja_guardar':
                $usuario_id=$datos_formulario['usuario_id'];
                $consulta="UPDATE usuarios SET usuario_estado = 'e' WHERE (usuario_id ='".$usuario_id."')";
                break;
            case 'usuario_modificacion_guardar':
                $usuario_id=$datos_formulario['usuario_id'];
                $usuario_nombre=ucwords($datos_formulario['usuario_nombre']);
                $usuario_apellido=ucwords($datos_formulario['usuario_apellido']);
                $usuario_email=$datos_formulario['usuario_email'];
                $usuario_user=$datos_formulario['usuario_user'];               
                $consulta="UPDATE usuarios SET usuario_nombre='$usuario_nombre',usuario_apellido='$usuario_apellido',usuario_user='$usuario_user',usuario_email='$usuario_email' WHERE (usuario_id ='".$usuario_id."')";
                break;
            case 'usuario_password_guardar':
                $usuario_id=$datos_formulario['usuario_id'];
                $usuario_password=$datos_formulario['usuario_password'];
                $consulta="UPDATE usuarios SET usuario_password = '". $usuario_password ."' WHERE (usuario_id ='".$usuario_id."')";
                break;
            case 'usuario_habilitar':
                $usuario_id=$datos_formulario['usuario_id'];
                $consulta="UPDATE usuarios SET usuario_intentos = 0 WHERE (usuario_id ='".$usuario_id."')";
                break;
            }

        $resultado=db_recuperar($db_datos,$consulta);
            
        if ($resultado == 1){
            echo "La operación fue realizado con éxito" . "<br>";
        }else{
            echo "Ha ocurrido un error." . "<br>" . "La operacion no pudo realizarse.";
        }
    }
}

function usuario_seleccionar($db_datos,$operacion){

    $consulta="SELECT * FROM usuarios where (usuario_estado = 'a')";
    $resultado=db_recuperar($db_datos,$consulta);
    $contador=mysqli_num_rows($resultado);
    $link_accion="home.php?menu_opcion=".$operacion;
    ?>
    <form action="<?php echo $link_accion; ?>" method="post"> 
        <select name="usuario_id">
        <?php
        while ($fila = mysqli_fetch_array($resultado)){
            echo "<option value='".$fila['usuario_id']."'>".$fila['usuario_apellido'] . " " .$fila['usuario_nombre']."</option>"; 
        }
        ?>
        </select>
        <br> <br>
        <input type="submit" name="btn_frm_enviar" value="Seleccionar">
    </form>
    <?php
}


function usuario_alta(){

    ?>
    <form action="home.php?menu_opcion=usuario_alta_guardar" method="post">        
        <label for="usuario_nombre">Nombre</label><br>
        <input type="text" name="usuario_nombre" id="usuario_nombre" required><br>
        <label for="usuario_apellido">Apellido</label><br>
        <input type="text" name="usuario_apellido" id="usuario_apellido" required><br>
        <label for="usuario_email">E-Mail</label><br>
        <input type="email" name="usuario_email" id="usuario_email" required><br>
        <label for="usuario_user">Usuario</label><br>
        <input type="text" name="usuario_user" id="usuario_user" required><br>
        <label for="usuario_password">Constraseña</label><br>
        <input type="password" name="usuario_password" id="usuario_password" required><br>
        <br><br>
        <input type="submit" name="btn_frm_enviar" value="Guardar">
    </form>
    <?php        
}


function usuario_baja($db_datos,$datos_formulario){

    $usuario_id=$datos_formulario['usuario_id'];
    $consulta_tarea="SELECT * FROM proyectos where (proyecto_usuario_id = '$usuario_id')";
    $resultado_tarea=db_recuperar($db_datos,$consulta_tarea);
    $contador_proyectos=mysqli_num_rows($resultado_tarea);

    if ($contador_proyectos == 0){
        $consulta="SELECT * FROM usuarios where (usuario_id = '$usuario_id')";
        $resultado=db_recuperar($db_datos,$consulta);
        $db_registros = mysqli_fetch_array($resultado);
        $usuario_nombre=$db_registros['usuario_nombre'];
        $usuario_apellido=$db_registros['usuario_apellido'];
        $usuario_email=$db_registros['usuario_email'];
        $usuario_user=$db_registros['usuario_user'];
        ?>
        <form action="home.php?menu_opcion=usuario_baja_guardar" method="post">
            <!-- <label for="usuario_id">ID</label><br>    -->
            <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $usuario_id; ?>" readonly><br>            
            <label for="usuario_nombre">Nombre</label><br>
            <input type="text" name="usuario_nombre" id="usuario_nombre"  value="<?php echo $usuario_nombre; ?>" readonly><br>
            <label for="usuario_apellido">Apellido</label><br>
            <input type="text" name="usuario_apellido" id="usuario_apellido"  value="<?php echo $usuario_apellido; ?>" readonly><br>
            <label for="usuario_email">E-Mail</label><br>
            <input type="email" name="usuario_email" id="usuario_email"  value="<?php echo $usuario_email; ?>" readonly><br>
            <label for="usuario_user">Usuario</label><br>
            <input type="text" name="usuario_user" id="usuario_user"  value="<?php echo $usuario_user; ?>" readonly><br>
            <br><br>
            <input type="submit" name="btn_frm_enviar" value="Borrar">
        </form>
        <?php   
    }else{
        echo "El Usuario tiene proyectos asigandos y no puede ser elimando." . "<br>";
    }     
}

function usuario_modificacion($db_datos,$datos_formulario){
    
    $usuario_id=$datos_formulario['usuario_id'];
    $consulta="SELECT * FROM usuarios where (usuario_id = '$usuario_id')";
    $resultado=db_recuperar($db_datos,$consulta);
    $db_registros = mysqli_fetch_array($resultado);
    $usuario_nombre=$db_registros['usuario_nombre'];
    $usuario_apellido=$db_registros['usuario_apellido'];
    $usuario_email=$db_registros['usuario_email'];
    $usuario_user=$db_registros['usuario_user'];
    ?>
    <form action="home.php?menu_opcion=usuario_modificacion_guardar" method="post">
        <!-- <label for="usuario_id">ID</label><br>    -->
        <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $usuario_id; ?>" readonly><br>            
        <label for="usuario_nombre">Nombre</label><br>
        <input type="text" name="usuario_nombre" id="usuario_nombre"  value="<?php echo $usuario_nombre; ?>"><br>
        <label for="usuario_apellido">Apellido</label><br>
        <input type="text" name="usuario_apellido" id="usuario_apellido"  value="<?php echo $usuario_apellido; ?>"><br>
        <label for="usuario_email">E-Mail</label><br>
        <input type="email" name="usuario_email" id="usuario_email"  value="<?php echo $usuario_email; ?>"><br>
        <label for="usuario_user">Usuario</label><br>
        <input type="text" name="usuario_user" id="usuario_user"  value="<?php echo $usuario_user; ?>"><br>
        <br><br>
        <input type="submit" name="btn_frm_enviar" value="Guardar">
    </form>
<?php        
}

function usuario_cambiar_password($db_datos,$datos_formulario){

    $usuario_id=$datos_formulario['usuario_id'];
    $consulta="SELECT * FROM usuarios where (usuario_id = '$usuario_id')";
    $resultado=db_recuperar($db_datos,$consulta);
    $db_registros = mysqli_fetch_array($resultado);
    $usuario_user=$db_registros['usuario_user'];    
    ?>
    <form action="home.php?menu_opcion=usuario_password_guardar" method="post">
        <!-- <label for="usuario_id">ID</label><br>    -->
        <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $usuario_id; ?>" readonly><br>               
        <label for="usuario_user">Usuario</label><br>
        <input type="text" name="usuario_user" id="usuario_user" value="<?php echo $usuario_user; ?>" readonly><br>
        <label for="usuario_password">Constraseña</label><br>
        <input type="password" name="usuario_password" id="usuario_password" placeholder="Nueva Contraseña"><br>
        <br><br>
        <input type="submit" name="btn_frm_enviar" value="Cambiar">
    </form>
    <?php        
}


function usuario_listar($db_datos){

    $consulta="SELECT * FROM usuarios where (usuario_estado = 'a')";
    $resultado=db_recuperar($db_datos,$consulta);
    $contador=mysqli_num_rows($resultado);
    $intentos_max=3;
    if ($contador < 0){
        echo "La consulta no trajo resultado" . "<br>";
    }
    else{
        ?>
        <br>
        <a class="tareas" href="home.php?menu_opcion=usuario_alta" title="Crear un nuevo Usuario"><span class="btn_registrarse">&#43;&#128100;</span></a>
        <br>
        <br>
        <table class="brown_table">
            <thead>
            <tr>
                <!-- <th>ID</th> -->
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>E-Mail</th>
                <th>Tareas</th>
            </tr>
            </thead>
            <tbody>
                <tr>
            <?php
            while ($fila = mysqli_fetch_array($resultado)){
                $link_borrar="home.php?menu_opcion=usuario_baja&usuario_id=" . $fila['usuario_id'];
                $link_modificar="home.php?menu_opcion=usuario_modificacion&usuario_id=" . $fila['usuario_id'];
                $link_cambiar="home.php?menu_opcion=usuario_password&usuario_id=" . $fila['usuario_id'];
                $link_habilitar="home.php?menu_opcion=usuario_habilitar&usuario_id=" . $fila['usuario_id'];
                ?>
                <tr>
                    <!-- <td><?php //echo $fila['usuario_id'];          ?></td> -->
                    <td><?php echo $fila['usuario_user'];        ?></td>
                    <td><?php echo $fila['usuario_nombre'];      ?></td>
                    <td><?php echo $fila['usuario_apellido'];    ?></td>
                    <td><?php echo $fila['usuario_email'];       ?></td>
                    <td><a class="tareas" href="<?php echo $link_borrar   ; ?>" title="Borrar el usuario seleccionado"><span class="flaticon-basura"></span></a>
                        <a class="tareas" href="<?php echo $link_modificar; ?>" title="Editar el usuario seleccionado"><span class="flaticon-pluma"></span></a>
                        <a class="tareas" href="<?php echo $link_cambiar  ; ?>" title="Cambiar Contraseña el usuario seleccionado"><span class="flaticon-llave"></span></a>
                        <?php
                        if ($fila['usuario_intentos'] >= $intentos_max){
                            ?>
                            <a class="tareas" href="<?php echo $link_habilitar  ; ?>" title="Habilitar Login el usuario seleccionado"><span class="flaticon-candado"></span></a>
                        <?php
                        }
                        ?>
                    </td> 
                </tr>
            <?php
            }
            ?>
            </tr>
            </tbody>
        </table>
        <br>    
        <br>    
        <p>Los usuario que tiene el <span class="flaticon-candado"></span> significa que alcanzaron el limite maximo de intentos de login y deben se habilitados nuevamente para poder usar el sistema.</p>
    <?php
    }
}

?>