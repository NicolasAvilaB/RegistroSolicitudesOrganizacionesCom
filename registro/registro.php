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
<script src="../Imagenes/jquery-1.9.1.min.js"></script>
<script> 
$(document).ready(function() {
    $("#resultadoBusqueda").html('');
});

function buscar() {
	var textoBusqueda = $("input#rut").val();
	if (textoBusqueda != "") {
		$.post("buscar.php", {valorBusqueda: textoBusqueda}, 		
		function(mensaje) {
			$("#resultadoBusqueda").html(mensaje);
		}); 
	} 
	else 
	{ 
		$("#resultadoBusqueda").html('');
    };
};

function verificar(){
    if(document.form1.rut.value==0){
        $("#resultadoBusqueda").html('');
    }
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1"/> 
<style type="text/css">
@import url("registro.css");
</style>
<link href="registro.css" rel="stylesheet" type="text/css">
<!-- <img class="dis" src="Imagenes/logo.jpg" width="318" height="160"> -->
<title>Registro Organizaciones Comunitarias - Municipalidad de Peralillo </title>
<body oncopy="return false" onpaste="return false" oncontextmenu="return false">
<div> 
<button type="button" src="../Imagenes/help_negro.png" id="ayuda" class="ayuda" onclick="Mostrar_Ocultar();"><span class="tooltipayuda"></span></button>
<script src="func.js"> </script>
<?php
header( "Content-Type: text/html;charset=utf-8" );
SESSION_START();
$n = $_SESSION['usua'];
$c = $_SESSION['cla'];
$io = $_SESSION['is'];
if($n == "" && $c == "" && $io == ""){
SESSION_START();
SESSION_UNSET();
SESSION_DESTROY();
header("Location:../login.php");
}
else{
    if ($io=="Operario"){
    }else{
        SESSION_START();
		SESSION_UNSET();
		SESSION_DESTROY();
        header("Location:../login.php");
    }
}
#$usuario=$_GET['nombre_usuario'];
#$clave=$_GET['clave_usuario'];
#$conexion = mysqli_connect("systemchile.com","cre37351_root","lacomunagana","cre37351_deptosocial") or die ("Error");
#mysqli_set_charset($conexion,"utf8");
#$ejecutar = mysqli_query($conexion,"Call Login('".$usuario."','".$clave."')"); 
#$fa = mysqli_fetch_array($ejecutar);
#$nm = $fa[0];
#$cl = $fa[1];
#if ($usuario == $nm && $clave == $cl){
#}
#else{
#header("Location:../login.php");
#}
#?nombre_usuario=<?php echo $usuario = $_GET['nombre_usuario'];?#>&clave_usuario=<?php echo $clave = $_GET['clave_usuario'];
?>
<p></p>
<img class="dis" src="../Imagenes/logomuni.png">
<p class="titulo75">MUNICIPALIDAD DE PERALILLO</p>
<p class="copy">Copyright © 2019 | Diseñado por N.A.B para Muniperalillo</p>
<ul class="nav nav-pills nav-stacked">
    <ul class="dropdown">
        <li class="dropdown-content">
            <a onclick="location.href = '../historial_registro_org_operario/historial_org.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['is1']=$io;?>'">Historial Organizaciones Comunitarias</a>
            <a onclick="location.href = '../solicitud/registro_solicitud.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['is2']=$io;?>'">Solicitudes Comunitarias</a>
            <a onclick="location.href = '../historial_solicitudes_operario/historial_sol.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['is3']=$io;?>'">Historial Solicitudes Comunitarias</a>
            <a onclick="location.href = '../solicitud_anterior/registro_solicitud.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['is4']=$io;?>'"> Solicitudes Anteriores</a>
            <a onclick="location.href = '../historial_solicitudes_anterior_operario/historial_sol.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['is5']=$io;?>'">Historial Solicitudes Anteriores</a>
        </li>
        <li><a class="active" onclick="location.href = '#home'">Registros Org. Com.</a></li>
    </ul>
<li><a onclick="location.href = '../menu.php'">Volver al Menu</a></li>
</ul>
</div>
<section>
<form id="form1" name="form1" action="registro.php" method="POST" onSubmit="return validar(this)">
<p class= "titulo2" align="center"> Registro Organizaciones Comunitaria</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p class= "titulo3">Rut: <input type="text" class="rut" id="rut" name="rut" style="text-align:center" placeholder="Ingrese Rut de Organizacion..." size="30" maxlength="10" autocomplete="off" required oninput="checkRut(this)" onkeyup="verificar();" onblur="buscar();"/> </p>

<p class= "titulo3">Nombre: <input type="text" class="nombre" id="nombre" name="nombre" style="text-align:center" placeholder="Ingrese Nombre Organizacion..." size="30" onkeypress="return valida_letras(event)" maxlength="105" autocomplete="off"/> </p>

<p class= "titulo3">Tipo Organizacion: <input list="list" class="juntas" id="juntas" name="juntas" type="text" style="text-align:center" placeholder="Ingrese y/o Busque Tipo Organizacion..." size="30" onkeypress="return valida_letras(event)" maxlength="105" autocomplete="off"/>
<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("localhost","cre37351_root","lacomunagana","cre37351_deptosocial") or die ("Error");
mysqli_set_charset($conexion,"utf8");
$ejecutar = mysqli_query($conexion," Call Consulta_Organizacion");
mysqli_set_charset($conexion,"utf8");
?>
<datalist id="list">
<?php while ($row = mysqli_fetch_array($ejecutar)) { ?> 
<option><?php echo $row[0];?></option>
<?php } ?>
</datalist>
</p>

<p class= "titulo3">Lugar de Reunion: <input type="text" class="direccion" id="direccion" name="direccion" style="text-align:center" placeholder="Ingrese Lugar de Reunion..." size="30" onkeypress="return valida_letras_numeros(event)" maxlength="75"  autocomplete="off"/>  </p>

<p class= "titulo3">Telefono: <input type="text" class="telefono" id="telefono" name="telefono" style="text-align:center" placeholder="Ingrese 9 Digitos Telefono..." size="30" onkeypress="return valida(event)" maxlength="9"  autocomplete="off"/>
<select class="se" id="se" name="se">
  <option value="">Propietario de Telefono...</option>
  <option value="Presidente/a">Presidente/a</option>
  <option value="Tesorero/a">Tesorero/a</option>
  <option value="Secretario/a">Secretario/a</option>
    <option value="Director1">Director1</option>
  <option value="Director2">Director2</option>
</select> </p>

<input type="text" class="stelefono" id="stelefono" name="stelefono" style="text-align:center" placeholder="Ingrese Nombre Usuario del Telefono..." size="30" onkeypress="return valida_letras(event)" maxlength="80"  autocomplete="off"/>
<p class="titulo3"></p>
<p class= "titulo3">Telefono 2: <input type="text" class="telefono2" id="telefono2" name="telefono2" style="text-align:center" placeholder="Ingrese 9 Digitos Telefono..." size="30" onkeypress="return valida(event)" maxlength="9"  autocomplete="off"/><select class="se2" id="se2" name="se2">
  <option value="">Propietario de Telefono...</option>
  <option value="Presidente/a">Presidente/a</option>
  <option value="Tesorero/a">Tesorero/a</option>
  <option value="Secretario/a">Secretario/a</option>
      <option value="Director1">Director1</option>
  <option value="Director2">Director2</option>
</select> </p>

<input type="text" class="s2telefono" id="s2telefono" name="s2telefono" style="text-align:center" placeholder="Ingrese Nombre Usuario del Telefono..." size="30" onkeypress="return valida_letras(event)" maxlength="80"  autocomplete="off"/>
<p class="titulo3"></p>
<p class= "titulo3">Telefono 3: <input type="text" class="telefono3" id="telefono3" name="telefono3" style="text-align:center" placeholder="Ingrese 9 Digitos Telefono..." size="30" onkeypress="return valida(event)" maxlength="9"  autocomplete="off"/><select class="se3" id="se3" name="se3">
  <option value="">Propietario de Telefono...</option>
  <option value="Presidente/a">Presidente/a</option>
  <option value="Tesorero/a">Tesorero/a</option>
  <option value="Secretario/a">Secretario/a</option>
      <option value="Director1">Director1</option>
  <option value="Director2">Director2</option>
</select> </p>
<input type="text" class="s3telefono" id="s3telefono" name="s3telefono" style="text-align:center" placeholder="Ingrese Nombre Usuario del Telefono..." size="30" onkeypress="return valida_letras(event)" maxlength="80"  autocomplete="off"/>
<p class="titulo3"></p>
<p class= "titulo3">Telefono 4: <input type="text" class="telefono4" id="telefono4" name="telefono4" style="text-align:center" placeholder="Ingrese 9 Digitos Telefono..." size="30" onkeypress="return valida(event)" maxlength="9"  autocomplete="off"/><select class="se4" id="se4" name="se4">
  <option value="">Propietario de Telefono...</option>
  <option value="Presidente/a">Presidente/a</option>
  <option value="Tesorero/a">Tesorero/a</option>
  <option value="Secretario/a">Secretario/a</option>
      <option value="Director1">Director1</option>
  <option value="Director2">Director2</option>
</select> </p>
<input type="text" class="s4telefono" id="s4telefono" name="s4telefono" style="text-align:center" placeholder="Ingrese Nombre Usuario del Telefono..." size="30" onkeypress="return valida_letras(event)" maxlength="80"  autocomplete="off"/>
<p class="titulo3"></p>
<p class= "titulo3">Telefono 5: <input type="text" class="telefono5" id="telefono5" name="telefono5" style="text-align:center" placeholder="Ingrese 9 Digitos Telefono..." size="30" onkeypress="return valida(event)" maxlength="9"  autocomplete="off"/><select class="se5" id="se5" name="se5">
  <option value="">Propietario de Telefono...</option>
  <option value="Presidente/a">Presidente/a</option>
  <option value="Tesorero/a">Tesorero/a</option>
  <option value="Secretario/a">Secretario/a</option>
  <option value="Director1">Director1</option>
  <option value="Director2">Director2</option>
</select> </p>
<input type="text" class="s5telefono" id="s5telefono" name="s5telefono" style="text-align:center" placeholder="Ingrese Nombre Usuario del Telefono..." size="30" onkeypress="return valida_letras(event)" maxlength="80"  autocomplete="off"/>
<p class="titulo3"></p>
<p class= "titulo3">Fecha Origen: <input type="date" class="fecha" id="fecha" name="fecha" style="text-align:center" placeholder="Ingrese Fecha..." size="30" maxlength="10" step="1" min="1900-01-01" max="2100-12-31" autocomplete="off"/> </p>

<p class= "titulo3">Clasificacion: <select class="cargo" id="cargo" name="cargo">
  <option value="">Seleccione Clasificación...</option>
  <option value="Territoriales">Territoriales</option>
  <option value="Funcionales">Funcionales</option>
</select> </p>

<p class= "titulo3">Estado Directiva: <select class="directiva" id="directiva" name="directiva">
  <option value="">Seleccione Estado Directiva...</option>
  <option value="Vigente">Vigente</option>
  <option value="No Vigente">No Vigente</option>
</select> </p>
<!--sectores -->

<p class= "titulo3">Sector: <input list="list2" class="sector" id="sector" name="sector" type="text" style="text-align:center" placeholder="Ingrese y/o Busque Sectores..." size="30" onkeypress="return valida_letras(event)" maxlength="105" autocomplete="off"/>
<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("localhost","cre37351_root","lacomunagana","cre37351_deptosocial") or die ("Error");
mysqli_set_charset($conexion,"utf8");
$ejecutar = mysqli_query($conexion," Call Consulta_Sectores");
mysqli_set_charset($conexion,"utf8");
?>
<datalist id="list2">
<?php while ($row = mysqli_fetch_array($ejecutar)) {  ?> 
<option><?php echo $row[0] . ' - ' . $row[1];?></option>
<?php } ?>
</datalist>

</p> 
<p>&nbsp;</p>
<input type="submit" onclick="" id="gu" class="g" name="gu" value="Guardar">
<aside class="resultadoBusqueda" id="resultadoBusqueda"></aside>

</p>
<p>
<?php
$var = "";
  if(isset($_POST["gu"])){
     	header("Content-Type: application/json; charset=UTF-8");
     	header("Content-Type: text/html;charset=utf-8");
     	include('functions.php');
    	$rut = $_POST["rut"];
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
	$juntas = $_POST["juntas"];
	$direccion = ucwords($_POST["direccion"]);
	$direccion = ucwords(strtolower($direccion));
	$direccion = ucwords($_POST["direccion"]);
 	if (ctype_upper($direccion)) {
		$direccion = ucwords($_POST["direccion"]);
		$direccion = ucwords(strtolower($direccion));
    	} else {
		$direccion = ucwords($_POST["direccion"]);
		$direccion = ucwords(strtolower($direccion));
    	}
	$telefono= $_POST["telefono"];
	$stelefono = ucwords($_POST["stelefono"]);
	$stelefono = ucwords(strtolower($stelefono));
	$stelefono = ucwords($_POST["stelefono"]);
 	if (ctype_upper($stelefono)) {
		$stelefono = ucwords($_POST["stelefono"]);
		$stelefono = ucwords(strtolower($stelefono));
    } else {
		$stelefono = ucwords($_POST["stelefono"]);
		$stelefono = ucwords(strtolower($stelefono));
    }
	$telefono2= $_POST["telefono2"];
	$s2telefono = ucwords($_POST["s2telefono"]);
	$s2telefono = ucwords(strtolower($s2telefono));
	$s2telefono = ucwords($_POST["s2telefono"]);
 	if (ctype_upper($s2telefono)) {
		$s2telefono = ucwords($_POST["s2telefono"]);
		$s2telefono = ucwords(strtolower($s2telefono));
    } else {
		$s2telefono = ucwords($_POST["s2telefono"]);
		$s2telefono = ucwords(strtolower($s2telefono));
    }
	$telefono3= $_POST["telefono3"];
	$s3telefono = ucwords($_POST["s3telefono"]);
	$s3telefono = ucwords(strtolower($s3telefono));
	$s3telefono = ucwords($_POST["s3telefono"]);
 	if (ctype_upper($s3telefono)) {
		$s3telefono = ucwords($_POST["s3telefono"]);
		$s3telefono = ucwords(strtolower($s3telefono));
    } else {
		$s3telefono = ucwords($_POST["s3telefono"]);
		$s3telefono = ucwords(strtolower($s3telefono));
    }
    $telefono4= $_POST["telefono4"];
	$s4telefono = ucwords($_POST["s4telefono"]);
	$s4telefono = ucwords(strtolower($s4telefono));
	$s4telefono = ucwords($_POST["s4telefono"]);
 	if (ctype_upper($s4telefono)) {
		$s4telefono = ucwords($_POST["s4telefono"]);
		$s4telefono = ucwords(strtolower($s4telefono));
    } else {
		$s4telefono = ucwords($_POST["s4telefono"]);
		$s4telefono = ucwords(strtolower($s4telefono));
    }
    $telefono5= $_POST["telefono5"];
	$s5telefono = ucwords($_POST["s5telefono"]);
	$s5telefono = ucwords(strtolower($s5telefono));
	$s5telefono = ucwords($_POST["s5telefono"]);
 	if (ctype_upper($s5telefono)) {
		$s5telefono = ucwords($_POST["s5telefono"]);
		$s5telefono = ucwords(strtolower($s5telefono));
    } else {
		$s5telefono = ucwords($_POST["s5telefono"]);
		$s5telefono = ucwords(strtolower($s5telefono));
    }
	$se= $_POST["se"];
	$se2= $_POST["se2"];
	$se3= $_POST["se3"];
	$se4= $_POST["se4"];
	$se5= $_POST["se5"];
	$fecha = $_POST["fecha"];
	$clasificacion = $_POST["cargo"];
	$directiva = $_POST["directiva"];
	$sector = $_POST["sector"];
	if ($resultset = getSQLResultSet("Call Consulta_Rut('$rut')")) {
	    	while ($row = $resultset->fetch_array(MYSQLI_NUM)) {
		  $var = $row['0'];
		}
	}
	if ($rut == $var){
		echo "<script>alert('Rut de Organizacion ya Existente')</script>";
	}
	else{ 
	    if ($telefono == ""){
	        $telefono = "0";
	    }
	    if ($telefono2 == ""){
	        $telefono2 = "0";
	    }
	    if ($telefono3 == ""){
	        $telefono3 = "0";
	    }
	    if ($telefono4 == ""){
	        $telefono4 = "0";
	    }
	    if ($telefono5 == ""){
	        $telefono5 = "0";
	    }
		ejecutarSQLCommand("Call Ingresar_Organizacion ('$rut','$nombre','$juntas','$direccion','$se - $stelefono $telefono','$se2 - $s2telefono $telefono2','$se3 - $s3telefono $telefono3','$se4 - $s4telefono $telefono4','$se5 - $s5telefono $telefono5','$fecha','$clasificacion','$directiva','$sector')");
		echo "<script>alert('Datos ingresados correctamente')</script>";
	}    
}
?>
</section>
<article class="ayudas" id="ayudas">
<article class="cuadrado2" id="cuadrado2">
<button type="button" src="../Imagenes/regresar.png" id="volver" class="volver" onclick="Ocultar();"><span class="tooltipvolver"></span></button><p class="titulo_ayuda" id="titulo_ayuda">Ayuda</p>
<input type="text" class="busqueda_ayuda" id="busqueda_ayuda" name="busqueda_ayuda" style="text-align:center" placeholder="Buscar en la Ayuda..." size="30" maxlength="50" autocomplete="off"/> <button type="button" class="cerrar" id="cerrar">x<span class="tooltipcerrar"></span></button>
<i class="fa fa-search"></i>
</article>
<article class="contenido" id="contenido">
    <article class="div_info_oculto" id="texto2">
    <iframe class="traeayuda" src="../ayuda/texto_ayuda_login.html"></iframe>
    </article>
    <article class="div_info_oculto" id="texto22">
    <iframe class="traeayuda" src="../ayuda/menu.html"></iframe>
    </article>
    <article class="div_info_oculto" id="texto3">
    <iframe class="traeayuda2" src="../ayuda/registro_organizaciones_com.html"></iframe>
    </article>
     <article class="div_info_oculto" id="texto4">
    <iframe class="traeayuda2" src="../ayuda/historial_org.html"></iframe>
    </article>
     <article class="div_info_oculto" id="texto5">
    <iframe class="traeayuda" src="../ayuda/solicitud_com.html"></iframe>
    </article>
     <article class="div_info_oculto" id="texto6">
    <iframe class="traeayuda2" src="../ayuda/historial_sol.html"></iframe>
    </article>
     <article class="div_info_oculto" id="texto7">
    <iframe class="traeayuda2" src="../ayuda/solicitud_com_anterior.html"></iframe>
    </article>
     <article class="div_info_oculto" id="texto8">
    <iframe class="traeayuda2" src="../ayuda/historial_solicitud_anterior.html"></iframe>
    </article>
    <article class="div_info_oculto" id="texto9">
    <iframe class="traeayuda" src="../ayuda/modotrabajo.html"></iframe>
    </article>
    <p id="subtitulo" class="subtitulo">Todos</p>
    
    <ul id="items" class="items">
         <p>&nbsp;</p>
				<li>
                    <a class="seleccion" onclick="Mostrar('1');"><img class="icono" src="../Imagenes/icono_ayuda.png" alt=""></img><span class="letras">Objetivo e Ingreso Sesión</span></a>
				</li>
			 
				<li>
                    <a class="item2" onclick="Mostrar2('2');"><img class="icono" src="../Imagenes/icono_ayuda.png" alt=""></img><span class="letras">Menu</span></a>
				</li>
				<li>
                    <a class="item3" onclick="Mostrar3('3');"><img class="icono" src="../Imagenes/icono_ayuda.png" alt=""></img><span class="letras">Registros Organizaciones Com.</span></a>
				</li>
				<li>
                    <a class="item4" onclick="Mostrar4('4');"><img class="icono" src="../Imagenes/icono_ayuda.png" alt=""></img><span class="letras">Historial Organizaciones Com.</span></a>
				</li>
				<li>
                    <a class="item5" onclick="Mostrar5('5');"><img class="icono" src="../Imagenes/icono_ayuda.png" alt=""></img><span class="letras">Solicitudes Comunitarias</span></a>
				</li>
				<li>
                    <a class="item6" onclick="Mostrar6('6');"><img class="icono" src="../Imagenes/icono_ayuda.png" alt=""></img><span class="letras">Historial Solicitudes Com.</span></a>
				</li>
				<li>
                    <a class="item7" onclick="Mostrar7('7');"><img class="icono2" src="../Imagenes/icono_ayuda.png" alt=""></img><span class="letras">Solicitudes Com. (ANTERIORES)</span></a>
				</li>
				<li>
                    <a class="item8" onclick="Mostrar8('8');"><img class="icono3" src="../Imagenes/icono_ayuda.png" alt=""></img><span class="letras">Historial Solicitudes Com. (ANTERIORES)</span></a>
				</li>
				<li>
                    <a class="item9" onclick="Mostrar9('9');"><img class="icono" src="../Imagenes/icono_ayuda.png" alt=""></img><span class="letras">Modos de Trabajo</span></a>
				</li>
			</ul>
   <p>&nbsp;</p>
</article>
</article>
</body>
</head>
</html>