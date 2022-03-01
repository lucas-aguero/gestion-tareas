<?php

function proyecto_guardar($db_datos,$datos_formulario,$operacion){

    if (isset($operacion)){
        switch ($operacion){
            case 'proyecto_alta_guardar':
                $proyecto_nombre=ucwords($datos_formulario['proyecto_nombre']);
                $proyecto_titulo=ucwords($datos_formulario['proyecto_titulo']);
                $proyecto_deadline=$datos_formulario['proyecto_deadline'];
                $proyecto_usuario_id=$datos_formulario['usuario_id'];              
                $consulta="INSERT INTO proyectos (proyecto_nombre,proyecto_titulo,proyecto_usuario_id,proyecto_deadline) VALUES ('$proyecto_nombre','$proyecto_titulo','$proyecto_usuario_id','$proyecto_deadline')";
                break;
            case 'proyecto_baja_guardar':
                $proyecto_id=$datos_formulario['proyecto_id'];
                $consulta="UPDATE proyectos SET proyecto_estado = 'e' WHERE (proyecto_id ='".$proyecto_id."')";
                break;
            case 'proyecto_modificacion_guardar':
                $proyecto_id=$datos_formulario['proyecto_id'];
                $proyecto_nombre=ucwords($datos_formulario['proyecto_nombre']);
                $proyecto_titulo=ucwords($datos_formulario['proyecto_apellido']);
                $proyecto_deadline=$datos_formulario['proyecto_email'];
                $proyecto_usuario_id=$datos_formulario['usuario_id'];               
                $consulta="UPDATE proyectos SET proyecto_nombre='$proyecto_nombre',proyecto_titulo='$proyecto_titulo',proyecto_deadline='$proyecto_deadline',proyecto_usuario_id='$proyecto_usuario_id' WHERE (proyecto_id ='".$proyecto_id."')";
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

function proyecto_seleccionar($db_datos,$operacion){

    $consulta="SELECT * FROM proyectos where (proyecto_estado = 'a')";
    $resultado=db_recuperar($db_datos,$consulta);
    $contador=mysqli_num_rows($resultado);
    $link_accion="home.php?menu_opcion=".$operacion;
    ?>
    <form action="<?php echo $link_accion; ?>" method="post"> 
        <select name="proyecto_id">
        <?php
        while ($fila = mysqli_fetch_array($resultado)){
            echo "<option value='".$fila['proyecto_id']."'>".$fila['proyecto_nombre'] . " | " .$fila['proyecto_titulo']."</option>"; 
        }
        ?>
        </select>
        <br> 
        <br>
        <input type="submit" name="btn_frm_enviar" value="Seleccionar">
    </form>
    <?php
}

function proyecto_alta($db_datos){
    $consulta="SELECT * FROM usuarios where (usuario_estado = 'a')";
    $resultado=db_recuperar($db_datos,$consulta);
    $contador=mysqli_num_rows($resultado);
      
    ?>
    <form action="home.php?menu_opcion=proyecto_alta_guardar" method="post">        
        <label for="proyecto_nombre">Nombre</label><br>
        <input type="text" name="proyecto_nombre" id="proyecto_nombre" required><br>
        <label for="proyecto_titulo">Titulo</label><br>
        <input type="text" name="proyecto_titulo" id="proyecto_titulo" required><br>
        <label for="proyecto_deadline">Deadline</label><br>
        <input type="date" name="proyecto_deadline" id="proyecto_deadline" required><br>
        <label for="proyecto_user">Usuario</label><br>
        <select name="usuario_id">
            <option value="-1">Seleccione un Usuario</option>
            <?php
            while ($fila = mysqli_fetch_array($resultado)){
                echo "<option value='".$fila['usuario_id']."'>".$fila['usuario_nombre'] . " | " .$fila['usuario_apellido']."(".$fila['usuario_user'].")</option>"; 
            }
            ?>
        </select>
        <br>
        <br>
        <input type="submit" name="btn_frm_enviar" value="Guardar">
    </form>
    <?php        
}


function proyecto_baja($db_datos,$datos_formulario){

    $proyecto_id=$datos_formulario['proyecto_id'];
    $consulta="SELECT * FROM proyectos Inner Join usuarios ON (usuario_id = proyecto_usuario_id) WHERE (proyecto_id = '$proyecto_id')";
    $resultado=db_recuperar($db_datos,$consulta);    
    $db_registros = mysqli_fetch_array($resultado);
    $proyecto_nombre=$db_registros['proyecto_nombre'];
    $proyecto_titulo=$db_registros['proyecto_titulo'];
    $proyecto_deadline=$db_registros['proyecto_deadline'];
    $proyecto_user=$db_registros['usuario_user'];
    ?>
    <form action="home.php?menu_opcion=proyecto_baja_guardar" method="post">
        <!-- <label for="proyecto_id">ID</label><br>    -->
        <input type="hidden" name="proyecto_id" id="proyecto_id" value="<?php echo $proyecto_id; ?>" readonly><br>            
        <label for="proyecto_nombre">Nombre</label><br>
        <input type="text" name="proyecto_nombre" id="proyecto_nombre"  value="<?php echo $proyecto_nombre; ?>" readonly><br>
        <label for="proyecto_apellido">Titulo</label><br>
        <input type="text" name="proyecto_apellido" id="proyecto_apellido"  value="<?php echo $proyecto_titulo; ?>" readonly><br>
        <label for="proyecto_deadline">DeadLine</label><br>
        <input type="date" name="proyecto_deadline" id="proyecto_deadline"  value="<?php echo $proyecto_deadline; ?>" readonly><br>
        <label for="proyecto_user">Usuario</label><br>
        <input type="text" name="proyecto_user" id="proyecto_user"  value="<?php echo $proyecto_user; ?>" readonly><br>
        <br>
        <br>
        <input type="submit" name="btn_frm_enviar" value="Borrar">
    </form>
<?php   
}

function proyecto_modificacion($db_datos,$datos_formulario){

    $consulta_usuario="SELECT * FROM usuarios where (usuario_estado = 'a')";
    $resultado_usuario=db_recuperar($db_datos,$consulta_usuario);

    $proyecto_id=$datos_formulario['proyecto_id'];
    $consulta="SELECT * FROM proyectos Inner Join usuarios ON (usuario_id = proyecto_usuario_id) WHERE (proyecto_id = '$proyecto_id')";
    $resultado=db_recuperar($db_datos,$consulta);    
    $db_registros = mysqli_fetch_array($resultado);
    $proyecto_nombre=$db_registros['proyecto_nombre'];
    $proyecto_titulo=$db_registros['proyecto_titulo'];
    $proyecto_deadline=$db_registros['proyecto_deadline'];
    $proyecto_user_id=$db_registros['proyecto_usuario_id'];
    $proyecto_user=$db_registros['usuario_user'];
    ?>
    <form action="home.php?menu_opcion=proyecto_baja_guardar" method="post">
        <!-- <label for="proyecto_id">ID</label><br>    -->
        <input type="hidden" name="proyecto_id" id="proyecto_id" value="<?php echo $proyecto_id; ?>" readonly><br>            
        <label for="proyecto_nombre">Nombre</label><br>
        <input type="text" name="proyecto_nombre" id="proyecto_nombre"  value="<?php echo $proyecto_nombre; ?>"><br>
        <label for="proyecto_apellido">Titulo</label><br>
        <input type="text" name="proyecto_apellido" id="proyecto_apellido"  value="<?php echo $proyecto_titulo; ?>"><br>
        <label for="proyecto_deadline">DeadLine</label><br>
        <input type="date" name="proyecto_deadline" id="proyecto_deadline"  value="<?php echo $proyecto_deadline; ?>"><br>
        <label for="proyecto_user">Usuario</label><br>
        <select name="usuario_id">
            <option value="-1">Seleccione un Usuario</option>
            <?php
             while ($fila = mysqli_fetch_array($resultado_usuario)){
                if ($fila['usuario_id'] == $proyecto_user_id){
                    $seleccionado="selected";
                }else{
                        $seleccionado="";
                }
                echo "<option value='".$fila['usuario_id']."'" ." ". $seleccionado .">".$fila['usuario_nombre'] . " | " .$fila['usuario_apellido']."(".$fila['usuario_user'].")</option>"; 
            }
            ?>
        </select>
        <br>
        <br>
        <input type="submit" name="btn_frm_enviar" value="Guardar">
    </form>
<?php        
}

function proyecto_listar($db_datos){

    $consulta="SELECT * FROM proyectos Inner Join usuarios ON (usuario_id = proyecto_usuario_id) WHERE (proyecto_estado = 'a')";
    $resultado=db_recuperar($db_datos,$consulta);
    $contador=mysqli_num_rows($resultado);
    if ($contador < 0){
        echo "La consulta no trajo resultado" . "<br>";
    }
    else{
        ?>
        <a class="tareas" href="home.php?menu_opcion=proyecto_alta"><span class="btn_registrarse">&#43;&#128100;</span></a>
        <br>
        <br>
        <table class="brown_table">
            <thead>
            <tr>
                <!-- <th>ID</th> -->
                <th>Nombre</th>
                <th>Titulo</th>
                <th>Usuario</th>
                <th>Tareas</th>
            </tr>
            </thead>
            <tbody>
                <tr>
            <?php
            while ($fila = mysqli_fetch_array($resultado)){

                $link_borrar="home.php?menu_opcion=proyecto_baja&proyecto_id=" . $fila['proyecto_id'];
                $link_modificar="home.php?menu_opcion=proyecto_modificacion&proyecto_id=" . $fila['proyecto_id'];
                ?>
                <tr>
                    <!-- <td><?php //echo $fila['proyecto_id'];          ?></td> -->
                    <td><?php echo $fila['proyecto_nombre'];        ?></td>
                    <td><?php echo $fila['proyecto_titulo'];      ?></td>
                    <td><?php echo $fila['usuario_user'];      ?></td>
                    <td><a class="tareas" href="<?php echo $link_borrar   ; ?>" title="Borrar el proyecto seleccionado"><span class="flaticon-basura"></span></a>
                        <a class="tareas" href="<?php echo $link_modificar; ?>" title="Modificar el proyecto seleccionado"><span class="flaticon-pluma"></span></a>
                    </td> 
                </tr>
            <?php
            }
            ?>
            </tr>
            </tbody>
        </table>
    <?php
    }
}

?>