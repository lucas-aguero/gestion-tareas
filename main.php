<main>
<h2><?php echo ucwords($titulo_pagina); ?></h2>
<br>
<br>
<?php
if (isset($menu_opcion)){
switch ($menu_opcion){
    case 'gestion':
        echo "Gestión" . "<br>";
        break;    
    case 'usuario_alta':
        usuario_alta();
        break;
    case 'usuario_alta_guardar':
        usuario_guardar($db_datos,$_REQUEST,$menu_opcion);
        break;
    case 'usuario_baja_seleccionar':
        usuario_seleccionar($db_datos,"usuario_baja");
        break;        
    case 'usuario_baja':
        usuario_baja($db_datos,$_REQUEST);
        break;
    case 'usuario_baja_guardar':
        usuario_guardar($db_datos,$_REQUEST,$menu_opcion);
        break;
    case 'usuario_modificacion_seleccionar':
        usuario_seleccionar($db_datos,"usuario_modificacion");
        break;                
    case 'usuario_modificacion':
        usuario_modificacion($db_datos,$_REQUEST);
        break;                    
    case 'usuario_modificacion_guardar':
        usuario_guardar($db_datos,$_REQUEST,$menu_opcion);
        break;
    case 'usuario_password_seleccionar':
        usuario_seleccionar($db_datos,"usuario_password");
        break;                  
    case 'usuario_password':
        usuario_cambiar_password($db_datos,$_REQUEST);
        break;
    case 'usuario_password_guardar':
        usuario_guardar($db_datos,$_REQUEST,$menu_opcion);
        break;            
    case 'usuario_listar':
        usuario_listar($db_datos);
        break;
    case 'usuario_habilitar':
        usuario_guardar($db_datos,$_REQUEST,$menu_opcion);
        break;



    case 'proyecto_alta':
        proyecto_alta($db_datos);
        break;
    case 'proyecto_alta_guardar':
        proyecto_guardar($db_datos,$_REQUEST,$menu_opcion);
        break;
    case 'proyecto_baja_seleccionar':
        proyecto_seleccionar($db_datos,"proyecto_baja");
        break;        
    case 'proyecto_baja':
        proyecto_baja($db_datos,$_REQUEST);
        break;
    case 'proyecto_baja_guardar':
        proyecto_guardar($db_datos,$_REQUEST,$menu_opcion);
        break;
    case 'proyecto_modificacion_seleccionar':
        proyecto_seleccionar($db_datos,"proyecto_modificacion");
        break;                
    case 'proyecto_modificacion':
        proyecto_modificacion($db_datos,$_REQUEST);
        break;                    
    case 'proyecto_modificacion_guardar':
        proyecto_guardar($db_datos,$_REQUEST,$menu_opcion);
        break;
    case 'proyecto_listar':
        proyecto_listar($db_datos);
        break;
    
    case 'gestion_listar':
        gestion_listar($db_datos);
        break;
    case 'gestion_deadline':
        gestion_deadline($db_datos,$_REQUEST);
        break;
    case 'gestion_deadline_guardar':
        gestion_guardar($db_datos,$_REQUEST,$menu_opcion);
        break;
    case 'gestion_avances':
        gestion_avances($db_datos,$_REQUEST);
        break;
    case 'gestion_avances_guardar':
        gestion_guardar($db_datos,$_REQUEST,$menu_opcion);
        break;
    case 'gestion_reasignar':
        gestion_reasignar($db_datos,$_REQUEST);
        break;
    case 'gestion_reasignar_guardar':
        gestion_guardar($db_datos,$_REQUEST,$menu_opcion);
        break;                
    case 'gestion_enviar_mail':
        gestion_enviar_mail($db_datos,$_REQUEST);
        break;                        
    }
}
?>
</main>            