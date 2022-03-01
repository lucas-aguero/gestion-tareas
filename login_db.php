<?php

include("conexion.php");

$usuario_user = $_REQUEST['usuario_user'];
$usuario_pass = $_REQUEST['usuario_password'];
$intentos_max = 3;
$consulta="SELECT * FROM usuarios where ((usuario_user = '$usuario_user') and (usuario_estado = 'a'))";
$resultado=db_recuperar($db_datos,$consulta);
$fila = mysqli_fetch_array($resultado);
$contador=mysqli_num_rows($resultado);

if ($contador == 0){
	header('Location: 404.php');
}else{
	if ($intentos_max > $fila['usuario_intentos']){
		if ($fila['usuario_password'] == $usuario_pass){
			$consulta="UPDATE usuarios SET usuario_intentos = 0 WHERE (usuario_id ='".$fila[usuario_id]."')";
			$resultado=db_recuperar($db_datos,$consulta);
			session_start();
			$_SESSION['user']=$fila['usuario_user'];
			$_SESSION['user_id']=$fila['usuario_id'];
			$_SESSION['user_login']="ok";
			header('Location: home.php?menu_opcion=gestion_listar');
		}else{
			$consulta="UPDATE usuarios SET usuario_intentos = usuario_intentos + 1 WHERE (usuario_id ='".$fila[usuario_id]."')";
			$resultado=db_recuperar($db_datos,$consulta);
			if (($fila['usuario_intentos'] + 1) < $intentos_max){
				session_start();
				$_SESSION['usuario_intentos']=$intentos_max - ($fila['usuario_intentos'] + 1);
				header('Location: login_intentos.php');	
			}else{
				header('Location: login_max.php');
			}
		}
	}else {
		header('Location: login_max.php');
	}
}
?>