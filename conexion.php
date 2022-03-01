<?php
$db_datos['db_user'] = "id14871673_gestor";
$db_datos['db_host'] = "localhost";
$db_datos['db_port'] = "3306";
$db_datos['db_pass'] = "J<0_+u]6/wCC[sTS";
$db_datos['db_name'] = "id14871673_gestion_tareas";

function mostrar_request($datos){
	print "<pre>";
	print_r($datos);
	print "</pre>";
}


function db_conectar($db_datos){
	if (!($link = mysqli_connect($db_datos['db_host'] . ":" . $db_datos['db_port'], $db_datos['db_user'], $db_datos['db_pass']))) {
		echo"Ha ocurrido un error al intentar conectar  con el servidor: " . $host . "<br>";
		exit();
	}
	if (!mysqli_select_db($link, $db_datos['db_name'])) {
		echo "Ha ocurrido un error a l intentar conectar con la Base de Datos ". $db_datos['db_name'] . "<br>";
		exit();
	}

	return $link;
}

function db_recuperar ($db_datos,$consulta){

    $conexion_db = db_conectar($db_datos);
    $resultado=mysqli_query($conexion_db, $consulta);
    mysqli_close($conexion_db);

    return $resultado;
}


function titular_pagina($menu_opcion){
   if ($menu_opcion == ""){
   		$titulo_pagina="Gestion de Tareas";
   	}else{
    switch ($menu_opcion){
        case 'usuario_alta':
            $titulo_pagina="Alta de nuevo Usuario";
            break;
        case 'usuario_alta_guardar':
            $titulo_pagina="Salvar nuevo Usuario";
            break;
        case 'usuario_baja_seleccionar':
            $titulo_pagina="Seleccionar Usuario";
            break;            
        case 'usuario_baja':
            $titulo_pagina="Confirmar Usuario seleccionado";
            break;
        case 'usuario_baja_guardar':
            $titulo_pagina="Borrar Usuario";
            break;         
        case 'usuario_modificacion_seleccionar':
            $titulo_pagina="Seleccionar Usuario";
            break;                           
        case 'usuario_modificacion':
            $titulo_pagina="Modificación de datos del Usuario";
            break;
        case 'usuario_modificacion_guardar':
            $titulo_pagina="Guardar Cambios";
            break;        
        case 'usuario_password_seleccionar':
            $titulo_pagina="Seleccionar Usuario";
            break;                   
        case 'usuario_password':
            $titulo_pagina="Modificación Constraseña Usuario";
            break;
        case 'usuario_password_guardar':
            $titulo_pagina="Guardar Cambios";
            break;            
        case 'usuario_listar':
            $titulo_pagina="Lista de Usuarios";
            break;
        case 'usuario_habilitar':
            $titulo_pagina="Habilitar Login de Usuario";
            break;
        case 'proyecto_alta':
           $titulo_pagina="Proyectos: Alta";
            break;
        case 'proyecto_alta_guardar':
           $titulo_pagina="Proyectos: Salvar Nuevo Proyecto";
            break;
        case 'proyecto_baja_seleccionar':
            $titulo_pagina="Seleccionar Proyecto";            
            break;
        case 'proyecto_baja':
            $titulo_pagina="Confirmar Proyecto Seleccionado";
            break;            
        case 'proyecto_baja_guardar':
            $titulo_pagina="Borrar Proyecto";
            break;
        case 'proyecto_modificacion_seleccionar':
            $titulo_pagina="Seleccionar Proyecto";
            break;            
        case 'proyecto_modificacion':
            $titulo_pagina="Modificacion de datos del Proyecto";
            break;
        case 'proyecto_modificacion_guardar':
            $titulo_pagina="Guardar Cambios";
            break;            
        case 'proyecto_listar':
            $titulo_pagina="Lista de Proyectos";
            break;
        case 'gestion_listar':
            $titulo_pagina="Gestion General";
            break;
        case 'gestion_deadline':
            $titulo_pagina="Cambiar Deadline";
            break;        
        case 'gestion_deadline_guardar':
            $titulo_pagina="Guardar Cambios";
            break;                     
        case 'gestion_avances':
            $titulo_pagina="Cargar Avances del Proyecto";
            break;        
        case 'gestion_avances_guardar':
            $titulo_pagina="Guardar Cambios";
            break;               
        case 'gestion_reasignar':
            $titulo_pagina="Reasignar Proyecto";
            break;        
        case 'gestion_reasignar_guardar':
            $titulo_pagina="Guardar Cambios";
            break;    
        case 'gestion_enviar_mail':
            $titulo_pagina="Enviar correo electronico";
            break;                                                                         
        }
    }
    return $titulo_pagina;
}

?>
