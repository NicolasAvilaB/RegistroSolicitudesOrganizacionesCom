<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<noscript>
  <META HTTP-EQUIV="Refresh" CONTENT="0;URL=java.html">
</noscript>
<article id="contenedor_carga">
	<article id="carga"></article>
</article>
<script src="./Imagenes/jquery_fade.min.js"></script>
<script src="./Imagenes/jquery-1.9.1.min.js"></script>
<script>
	window.onload = function(){
	var contenedor = document.getElementById('contenedor_carga');
	contenedor.style.visibility = 'hidden';
	contenedor.style.opacity = '0';
	var carg = document.getElementById('carga');
    carg.style.animationPlayState = "paused"; 
	}
</script>
<style type="text/css">
@import url("login.css");
</style>
<link href="login.css" rel="stylesheet" type="text/css">
<title>Registro y Solicitud Organizaciones Comunitarias - Municipalidad de Peralillo </title>
<body oncopy="return false" onpaste="return false" oncontextmenu="return false">
<img src="Imagenes/fondo_login_difuminado.jpg" id="fondo" alt=""/>
<button type="button" src="Imagenes/help_negro.png" id="ayuda" class="ayuda" onclick="Mostrar_Ocultar();"><span class="tooltipayuda"></span></button>
<script src="funci.js"> </script>
<?php
SESSION_START();
SESSION_UNSET();
SESSION_DESTROY();
?>
<p></p>
<img class="dis" src="./Imagenes/logomuni.png" alt="">
<form id="form1" class="form1" autocomplete="off"name="form1" action="login.php" method="POST" onSubmit="return validar(this)">
<aside class="cuadrado">
<p></p>
<p class= "titulo2">Registro y Solicitud Organizaciones Comunitarias</p>
</aside>
<p>&nbsp;</p>
<p class= "titulo3">Nombre:</p> <input type="text" class="nombre" id="nombre" name="nombre" style="text-align:center" placeholder="Ingrese Nombre de Usuario..." size="30" maxlength="50" autocomplete="off" onkeypress="return valida_letras_numeros(event)" autofocus/>
<p class= "titulo3sp">Clave: </p><input type="password" class="clave" id="clave" name="clave" style="text-align:center" placeholder="Ingrese Clave..." size="30" maxlength="50" autocomplete="off" onkeypress="return valida_letras_numeros(event)"/>
<aside class="elemento"><p class="recupera_contra" onclick="recuperar_contrase()">¿Olvidaste tu Contraseña?</p></aside><aside class="elementos"><p class="ver" id="ver" onclick="mostrar_esconder_clave()">Mostrar Contraseña</p></aside>
<input type="submit" onclick="" id="gu" class="g" name="gu" value="Ingresar">
</p>
<p>
<?php
$var = "";
  if(isset($_POST["gu"])){
     	header("Content-Type: text/html;charset=utf-8");
	$nombre = ucwords($_POST["nombre"]);
	$nombre = ucwords(strtolower($nombre));
	$nombre = ucwords($_POST["nombre"]);
 	if (ctype_upper($nombre)) {
		$nombre = ucwords($_POST["nombre"]);
		$nombre = ucwords(strtolower($nombre));
    	} else {
		$nombre = ucwords($_POST["nombre"]);
		$nombre = ucwords(strtolower($nombre));
    	}
	$clave = $_POST["clave"];
	$conversion1 = base64_encode($nombre);
	$conversion2 = base64_encode($clave);
	$conexion = mysqli_connect("localhost","cre37351_root","lacomunagana","cre37351_deptosocial");
	mysqli_set_charset($conexion,"utf8");
	$consulta = mysqli_query($conexion, "Call Login('".$nombre."','".$clave."')");
	if (mysqli_fetch_assoc($consulta) == true)
	{
		include('./registro/functions.php');
		if ($resultset = getSQLResultSet("Call Consulta_Tipo_Usuario('".$nombre."','".$clave."')"))
		{
			while ($row = $resultset->fetch_array(MYSQLI_NUM)) {
				$tipo_usuario = $row[0];
			}
			if ($tipo_usuario == "Administrador"){
				date_default_timezone_set('America/Santiago');
				$horainicio=strftime("%H:%M:%S", time());
				$fechainicio=strftime("%Y-%m-%d", time());
				$pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
                for($i = 0; $i < 15; $i++) {
                    $suma .= $pattern{rand(0, 35)};
                }
				ejecutarSQLCommand("Call Ingreso_Sesion('".$suma."','".$nombre."','".$horainicio."','".$fechainicio."')");
				mysqli_free_result($consulta);
				mysqli_close($conexion);
				SESSION_START();
				$_SESSION['usuarios']=$conversion1;
				$_SESSION['claves']=$conversion2;
				$_SESSION['tipous']="Administrador";
				header("Location:menu_admin.php");
			}
			elseif ($tipo_usuario == "Operario"){
				date_default_timezone_set('America/Santiago');
				$horainicio=strftime("%H:%M:%S", time());
				$fechainicio=strftime("%Y-%m-%d", time());
				$pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
                for($i = 0; $i < 15; $i++) {
                    $suma .= $pattern{rand(0, 35)};
                }
				ejecutarSQLCommand("Call Ingreso_Sesion('".$suma."','".$nombre."','".$horainicio."','".$fechainicio."')");
				mysqli_free_result($consulta);
				mysqli_close($conexion);
				SESSION_START();
				$_SESSION['usuarios']=$conversion1;
				$_SESSION['claves']=$conversion2;
				$_SESSION['i']="Operario";
				header("Location:menu.php");
			}
		}
	}
	else
	{
		$message2 = utf8_encode("Advertencia: Nombre de Usuario y/o Contraseña Son Incorrectos");
		$mensaje3alert = utf8_decode($message2);
		echo "<script type='text/javascript'>alert('$mensaje3alert');</script>";
		mysqli_free_result($consulta);
		mysqli_close($conexion);
	}
}
?>
<p class="titulo75">MUNICIPALIDAD DE PERALILLO</p>
<p class="copy"><a href='https://nicolas.systemchile.com' type='button' style="color:white;text-decoration: none;" class='btn btn-primary' target='_blank'>Copyright © 2019 | Diseñado por N.A.B para Muniperalillo</a></p>
</form>
<div class="ayudas" id="ayudas">
<aside class="cuadrado2">
<button type="button" src="Imagenes/regresar.png" id="volver" class="volver" onclick="Ocultar();"><span class="tooltipvolver"></span></button><p class="titulo_ayuda" id="titulo_ayuda">Ayuda</p>
<input type="text" class="busqueda_ayuda" id="busqueda_ayuda" name="busqueda_ayuda" style="text-align:center" placeholder="Buscar en la Ayuda..." size="30" maxlength="50" autocomplete="off"/> <button type="button" class="cerrar" id="cerrar">x<span class="tooltipcerrar"></span></button>
<i class="fa fa-search"></i>
</aside>
<aside class="contenido" id="contenido">
    <div class="div_info_oculto" id="texto2">
    <iframe class="traeayuda" src="ayuda/texto_ayuda_login.html"></iframe>
    </div>
    <div class="div_info_oculto" id="texto9">
    <iframe class="traeayuda" src="ayuda/modotrabajo.html"></iframe>
    </div>
    <p id="subtitulo" class="subtitulo">Todos</p>
    
    <ul id="items" class="items">
				<li>
                    <a class="seleccion" onclick="Mostrar('1');"><img class="icono" src="./Imagenes/icono_ayuda.png" alt=""></img><span class="letras">Objetivo e Ingreso Sesión</span></a>
				</li>
				<li>
                    <a class="item9" onclick="Mostrar9('9');"><img class="icono" src="./Imagenes/icono_ayuda.png" alt=""></img><span class="letras">Modos de Trabajo</span></a>
				</li>
			</ul>
   <p>&nbsp;</p>
</aside>
</div>
</body>
</head>
</html>
