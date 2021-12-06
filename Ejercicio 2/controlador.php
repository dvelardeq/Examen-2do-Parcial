<?php
	session_start();
	include "conexion.inc.php";
	$flujo = $_GET["flujo"];
	$proceso = $_GET["proceso"];
	$formulario = $_GET["formulario"];
	include $formulario.".controlador.form.inc.php";
	if (isset($_GET["Siguiente"])){
		$sql = "SELECT * FROM flujo_proceso WHERE flujo='$flujo' AND proceso='$proceso'";
		$resultado = mysqli_query($conn, $sql);
		$fila = mysqli_fetch_array($resultado);
		$proceso_siguiente = $fila["proceso_siguiente"];

		$sql = "SELECT * FROM seguimiento WHERE flujo='$flujo' AND proceso='$proceso' AND fecha_final IS NULL AND ci=".$_SESSION["IdUser"];
		$resultado = mysqli_query($conn, $sql);
		$fila = mysqli_fetch_array($resultado);
		$nro = $fila["nro_tramite"];
		if(isset($fila)){
			$sql = "UPDATE seguimiento SET fecha_fin='".date("Y-m-d")."' WHERE flujo='$flujo' AND proceso='$proceso' AND nro_tramite='".$fila['nro']."' AND ci=".$_SESSION["IdUser"];			
			$res = mysqli_query($conn, $sql);
		}else{
			$sql2 = "SELECT * FROM seguimiento WHERE flujo='$flujo' AND proceso='$proceso' AND fecha_final IS NOT NULL AND ci=".$_SESSION["IdUser"];
			$resultado2 = mysqli_query($conn, $sql2);
			$fila2 = mysqli_fetch_array($resultado2);
			if(!isset($fila2)){
				$sql = "INSERT INTO seguimiento (flujo, proceso, Id, fecha_inicio, fecha_final) VALUES ('$flujo','$proceso',".$_SESSION["IdUser"].",'".date('Y-m-d')."','".date('Y-m-d')."')";
				$res = mysqli_query($conn, $sql);
			}
		}
		header("Location: motor.php?flujo=$flujo&proceso=$proceso_siguiente");
	}else if(isset($_GET["Salir"])){
		header("Location: index.php");
	}else{
		$sql = "SELECT * FROM seguimiento WHERE flujo='$flujo' AND proceso='$proceso' AND fecha_final IS NULL AND ci=".$_SESSION["IdUser"];
		$resultado = mysqli_query($conn, $sql);
		$fila = mysqli_fetch_array($resultado);
		if(!isset($fila)){
			$sql = "INSERT INTO seguimiento (flujo, proceso, ci, fecha_inicio, fecha_final) VALUES ('$flujo','$proceso',".$_SESSION["IdUser"].",'".date('Y-m-d')."',NULL)";
			$res = mysqli_query($conn, $sql);
		}
		/*session_unset();
		session_destroy();
		header("Location: index.php");*/
	}
?>
