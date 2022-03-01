<?php

function gestion_guardar($db_datos,$datos_formulario,$operacion){

    if (isset($operacion)){
        switch ($operacion){
            /*case 'proyecto_alta_guardar':
                $proyecto_nombre=ucwords($datos_formulario['proyecto_nombre']);
                $proyecto_titulo=ucwords($datos_formulario['proyecto_titulo']);
                $proyecto_deadline=$datos_formulario['proyecto_deadline'];
                $proyecto_usuario_id=$datos_formulario['usuario_id'];              
                $consulta="INSERT INTO proyectos (proyecto_nombre,proyecto_titulo,proyecto_usuario_id,proyecto_deadline) VALUES ('$proyecto_nombre','$proyecto_titulo','$proyecto_usuario_id','$proyecto_deadline')";
                break;*/
            case 'gestion_avances_guardar':
                $proyecto_id=$datos_formulario['proyecto_id'];
                $proyecto_progreso=$datos_formulario['proyecto_progreso'];               
                $consulta="UPDATE proyectos SET proyecto_progreso='$proyecto_progreso' WHERE (proyecto_id ='".$proyecto_id."')";
                break;
            case 'gestion_deadline_guardar':
                $proyecto_id=$datos_formulario['proyecto_id'];
                $proyecto_deadline=$datos_formulario['proyecto_deadline'];               
                $consulta="UPDATE proyectos SET proyecto_deadline='$proyecto_deadline' WHERE (proyecto_id ='".$proyecto_id."')";
                break;
            case 'gestion_reasignar_guardar':
                $proyecto_id=$datos_formulario['proyecto_id'];
                $proyecto_usuario_id=$datos_formulario['usuario_id'];               
                $consulta="UPDATE proyectos SET proyecto_usuario_id='$proyecto_usuario_id' WHERE (proyecto_id ='".$proyecto_id."')";
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

function gestion_seleccionar($db_datos,$operacion){

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

function gestion_avances($db_datos,$datos_formulario){

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
    $proyecto_progreso=$db_registros['proyecto_progreso'];
    ?>
    <form action="home.php?menu_opcion=gestion_avances_guardar" method="post">
        <!-- <label for="proyecto_id">ID</label><br>    -->
        <input type="hidden" name="proyecto_id" id="proyecto_id" value="<?php echo $proyecto_id; ?>" readonly><br>            
        <label for="proyecto_nombre">Nombre</label><br>
        <input type="text" name="proyecto_nombre" id="proyecto_nombre"  value="<?php echo $proyecto_nombre; ?>" readonly><br>
        <label for="proyecto_apellido">Titulo</label><br>
        <input type="text" name="proyecto_apellido" id="proyecto_apellido"  value="<?php echo $proyecto_titulo; ?>" readonly><br>
        <label for="proyecto_progreso">DeadLine</label><br>
        <input type="range" name="proyecto_progreso" min="1" max="100" value="<?php echo $proyecto_progreso; ?>" class="slider" id="proyecto_progreso"><br>
        <br>
        <br>
        <input type="submit" name="btn_frm_enviar" value="Guardar">
    </form>
<?php        
}


function gestion_deadline($db_datos,$datos_formulario){

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
    <form action="home.php?menu_opcion=gestion_deadline_guardar" method="post">
        <!-- <label for="proyecto_id">ID</label><br>    -->
        <input type="hidden" name="proyecto_id" id="proyecto_id" value="<?php echo $proyecto_id; ?>" readonly><br>            
        <label for="proyecto_nombre">Nombre</label><br>
        <input type="text" name="proyecto_nombre" id="proyecto_nombre"  value="<?php echo $proyecto_nombre; ?>" readonly><br>
        <label for="proyecto_apellido">Titulo</label><br>
        <input type="text" name="proyecto_apellido" id="proyecto_apellido"  value="<?php echo $proyecto_titulo; ?>" readonly><br>
        <label for="proyecto_deadline">DeadLine</label><br>
        <input type="date" name="proyecto_deadline" id="proyecto_deadline"  value="<?php echo $proyecto_deadline; ?>"><br>
        <br>
        <br>
        <input type="submit" name="btn_frm_enviar" value="Guardar">
    </form>
<?php        
}

function gestion_reasignar($db_datos,$datos_formulario){

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
    $usuario_original=$db_registros['usuario_nombre'] . " | " . $db_registros['usuario_apellido'] . "(" . $db_registros['usuario_user'] . ")";
    ?>
    <form action="home.php?menu_opcion=gestion_reasignar_guardar" method="post">
        <!-- <label for="proyecto_id">ID</label><br>    -->
        <input type="hidden" name="proyecto_id" id="proyecto_id" value="<?php echo $proyecto_id; ?>" readonly><br>            
        <label for="proyecto_nombre">Nombre</label><br>
        <input type="text" name="proyecto_nombre" id="proyecto_nombre"  value="<?php echo $proyecto_nombre; ?>" readonly><br>
        <label for="proyecto_apellido">Titulo</label><br>
        <input type="text" name="proyecto_apellido" id="proyecto_apellido"  value="<?php echo $proyecto_titulo; ?>" readonly><br>
        <label for="usuario_viejo">Usuario Original</label><br>
        <input type="text" name="usuario_viejo" id="usuario_viejo"  value="<?php echo $usuario_original; ?>" readonly><br>
        <label for="usuario_id">Nuevo Usuario</label><br>
        <select name="usuario_id">
            <option value="-1" selected>Seleccione un Usuario</option>
            <?php
             while ($fila = mysqli_fetch_array($resultado_usuario)){
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


function gestion_enviar_mail($db_datos,$datos_formulario){

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
    $proyecto_progreso=$db_registros['proyecto_progreso'];
    $usuario_email=$db_registros['usuario_email'];
    $usuario_original=$db_registros['usuario_nombre'] . " | " . $db_registros['usuario_apellido'] . "(" . $db_registros['usuario_user'] . ")";
    $fecha_mostrar = date("d/m/Y", strtotime($db_registros['proyecto_deadline']));
    $fecha_hoy = date("Y-m-d");
    $fecha = $db_registros['proyecto_deadline'];
    if ($fecha_hoy == $fecha){
        $fecha_mostrar=$fecha_mostrar . " (Vence HOY)";
    }
    if ($fecha_hoy > $fecha){
        $fecha_mostrar=$fecha_mostrar . " (Vencido)";
    } 
    $mensaje_asunto="Mensaje Desde Sistema de Gestion de Proyectos: ". $proyecto_nombre . "\r\n";
    $cuerpo_mensaje="Hola ".$usuario_original ."\r\n";
    $cuerpo_mensaje.="Informacion del proyecto:\r\n";
    $cuerpo_mensaje.="Nombre del Proyecto: " . $proyecto_nombre ."\r\n";
    $cuerpo_mensaje.="Titulo del Proyecto: " . $proyecto_titulo ."\r\n";
    $cuerpo_mensaje.="DeadLine           : " . $fecha_mostrar ."\r\n";
    $cuerpo_mensaje.="Progreso           : " . $proyecto_progreso ."\r\n";
    mail($usuario_email,$mensaje_asunto,$cuerpo_mensaje);   

    echo "Destinatario: " . $usuario_email . "<br>";
    echo "Asunto      : " . $mensaje_asunto . "<br>";
    echo "Mensaje:" . "<br>";
    print_r($cuerpo_mensaje);
    echo "<br>";
    echo "La operación fue realizado con éxito" . "<br>";
}


function gestion_listar($db_datos){

    $consulta="SELECT * FROM proyectos Inner Join usuarios ON (usuario_id = proyecto_usuario_id) WHERE (proyecto_estado = 'a')";
    $resultado=db_recuperar($db_datos,$consulta);
    $contador=mysqli_num_rows($resultado);
    if ($contador < 0){
        echo "La consulta no trajo resultado" . "<br>";
    }
    else{
        ?>
        <table class="brown_table">
            <thead>
            <tr>
                <!-- <th>ID</th> -->
                <th>Nombre</th>
                <th>Titulo</th>
                <th>Usuario</th>
                <th>Deadline</th>
                <th>Progreso</th>
                <th>Tareas</th>
            </tr>
            </thead>
            <tbody>
                <tr>
            <?php
            while ($fila = mysqli_fetch_array($resultado)){

                $link_deadline="home.php?menu_opcion=gestion_deadline&proyecto_id=" . $fila['proyecto_id'];
                $link_avances="home.php?menu_opcion=gestion_avances&proyecto_id=" . $fila['proyecto_id'];
                $link_reasignar="home.php?menu_opcion=gestion_reasignar&proyecto_id=" . $fila['proyecto_id'];
                $link_enviar="home.php?menu_opcion=gestion_enviar_mail&proyecto_id=" . $fila['proyecto_id'];

                $fecha_mostrar = date("d/m/Y", strtotime($fila['proyecto_deadline']));
                $fecha_hoy = date("Y-m-d");
                $fecha = $fila['proyecto_deadline'];
                if ($fecha_hoy == $fecha){
                    $fecha_mostrar=$fecha_mostrar . " (Vence HOY)";
                }
                if ($fecha_hoy > $fecha){
                    $fecha_mostrar=$fecha_mostrar . " (Vencido)";
                }

                ?>
                <tr>
                    <!-- <td><?php //echo $fila['proyecto_id'];          ?></td> -->
                    <td><?php echo $fila['proyecto_nombre'];        ?></td>
                    <td><?php echo $fila['proyecto_titulo'];      ?></td>
                    <td><?php echo $fila['usuario_user'];      ?></td>
                    <td><?php echo $fecha_mostrar; ?></td>
                    <td><progress id="progressBar" max="100" value="<?php echo $fila['proyecto_progreso'];?>"></progress>
                        <?php echo $fila['proyecto_progreso'];?>
                    </td>
                    <td><a class="tareas" href="<?php echo $link_deadline ; ?>" title="Cambiar le Deadline del proyecto seleccionado"><span class="flaticon-reloj"></span></a>
                        <a class="tareas" href="<?php echo $link_avances; ?>" title="Cargar avances del proyecto"><span class="flaticon-check-list"></span></a>
                        <a class="tareas" href="<?php echo $link_reasignar; ?>" title="Reasignar el proyecto a otro usuario"><span class="flaticon-usuario"></span></a>
                        <a class="tareas" href="<?php echo $link_enviar; ?>" title="Enviar mail con datos del proyecto"><span class="flaticon-correo"></span>
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