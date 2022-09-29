<!DOCTYPE html>
<html>
<head>
<noscript>
  <META HTTP-EQUIV="Refresh" CONTENT="0;URL=java.html">
</noscript>
<article id="contenedor_carga">
	<article id="carga"></article>
</article>
<script>
	window.onload = function(){
	var contenedor = document.getElementById('contenedor_carga');
	contenedor.style.visibility = 'hidden';
	contenedor.style.opacity = '0';
	var carg = document.getElementById('carga');
    carg.style.animationPlayState = "paused"; 
	}
</script>
<script src="func.js"> </script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1"/> 
<style type="text/css">
@import url("modificar_solicitud.css");
</style>
<link href="modificar_solicitud.css" rel="stylesheet" type="text/css">
<!-- <img class="dis" src="Imagenes/logo.jpg" width="318" height="160"> -->
<title>Registro Organizaciones Comunitarias - Municipalidad de Peralillo </title>
<body oncopy="return false" onpaste="return false" oncontextmenu="return false">
<div> 
<?php
header( "Content-Type: text/html;charset=utf-8" );
SESSION_START();
$n = $_SESSION['usua'];
$c = $_SESSION['cla'];
$o = $_SESSION['t'];
if($n == "" && $c == "" && $o == ""){
header("Location:../login.php");
}
?>
<p></p>
<img class="dis" src="../Imagenes/logomuni.png">
<p class="titulo75">MUNICIPALIDAD DE PERALILLO</p>
<p class="copy">Copyright © 2019 | Diseñado por N.A.B para Muniperalillo</p>
<ul class="nav nav-pills nav-stacked">
  <li><a href="historial_sol.php">Historial Solicitudes</a></li>
  <li><a href="../menu_admin.php">Volver al Menu</a></li>
  <!--<li><a href="mant_riego.php">Planes de Riego</a></li>
  <li><a href="mant_suelo.php">Suelo</a></li>
  <li><a href="mant_usuarios.php">Usuarios</a></li>
  <li><a href="mant_c.php">Cultivos y Notificaciones</a></li>
  <li><a href="mant_inv.php">Invernaderos</a></li>-->
  <li>
  <!--<ul class="dropdown">
  <li><a class="his" href="#">Historiales</a></li>
  <li class="dropdown-content">
    <a href="hist_riego.php">Historial Riego</a>
    <a href="hist_suelo.php">Historial Suelo</a>
    <a href="hist_clima.php">Historial Clima</a>
    <a href="hist_sesion.php">Historial Sesión</a>
  </li>
  </ul>
  <li><a class="sal" href="#">Salir</a></li>
  </li>-->

</ul>
</div>
<section>
<?php
    header( "Content-Type: text/html;charset=utf-8" );
    $conexion = mysqli_connect("localhost","cre37351_root","lacomunagana","cre37351_deptosocial") or die ("Error");
    mysqli_set_charset($conexion,"utf8");
    if(isset($_GET["modificar"])){
        $editar_id = $_GET["modificar"];
        $ejecutar = mysqli_query($conexion, "Call Buscar_ID_Solicitud('".$editar_id."')");
        $fila = mysqli_fetch_array($ejecutar);
        $doctorwho = $fila[0];
        $a = $fila[1];
    	$b = $fila[2];
    }
?>
<form id="form1" name="form1" action="modificar_solicitud.php" method="POST" onSubmit="return validar(this)">
<p class= "titulo2" align="center"> Modificar Solicitud</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p class= "titulo3">ID: <input type="text" class="id" id="id" name="id" style="text-align:center" placeholder="Ingrese ID..." size="30"  onkeypress="return valida_letras_numeros(event)" maxlength="45" autocomplete="off" value="<?php echo $doctorwho; ?>" readonly=”readonly”/> </p>
<p class= "titulo3">Estado: 
<select class="estado" id="estado" name="estado">
    <option value="">Seleccione Estado Solicitud...</option>
    <option value="Pendiente">Pendiente</option>
    <option value="Ejecucion">Ejecucion</option>
    <option value="Evaluacion">Evaluacion</option>
    <option value="Realizado">Realizado</option>
</select> </p>
<p class= "titulo3">Fecha Hasta: <input type="date" class="fecha" id="fecha" name="fecha" style="text-align:center" placeholder="Ingrese Fecha Hasta..." size="30" maxlength="10" step="1" min="1900-01-01" max="2100-12-31" autocomplete="off" value="<?php echo $a; ?>"/> </p>
<p class= "titulo3">Observacion: <input type="text" class="obse" id="obse" name="obse" style="text-align:center" placeholder="Ingrese Observacion..." size="30" maxlength="90" autocomplete="off" onkeypress="return valida_letras_numeros(event)" value="<?php echo $b; ?>"/> </p>
<!--sectores -->
<p>&nbsp;</p>
<input type="submit" onclick="" id="gu" class="g" name="gu" value="Modificar">
</form>
</p>
<p>
<?php
$var = "";
if(isset($_POST["gu"])){
    include('functions.php');
    header("Content-Type: application/json; charset=UTF-8");
    header("Content-Type: text/html;charset=utf-8");
	$obse = ucwords($_POST["obse"]);
	$obse = ucwords(strtolower($obse));
	$obse = ucwords($_POST["obse"]);
 	if (ctype_upper($obse)) 
 	{
		$obse = ucwords($_POST["obse"]);
		$obse = ucwords(strtolower($obse));
    } 
    else 
    {
		$obse = ucwords($_POST["obse"]);
		$obse = ucwords(strtolower($obse));
    }
	$estado = $_POST["estado"];
	$fecha = $_POST["fecha"];
    $doc = $_POST["id"];
    ejecutarSQLCommand("Call Modificar_Solicitud('$estado','$fecha','$obse','$doc')");
	echo "<script>alert('Datos modificados correctamente')</script>";
	echo "<script language=Javascript> location.href=\"historial_sol.php\"; </script>"; 
}
?>
</section>
</body>
</head>
</html>