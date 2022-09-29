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
<script src="../Imagenes/jquery_fade.min.js"></script>
<script src="../Imagenes/jquery-1.9.1.min.js"></script>
<script src="func.js"> </script>
<script> 
$(document).ready(function() {
    $("#m").html('');
});

function buscar() {
	var textoBusqueda = $("input#orga").val();
	if (textoBusqueda != "") {
		$.post("buscar.php", {valorBusqueda: textoBusqueda}, 		
		function(mensaje) {
			$("#m").html(mensaje);
		}); 
	} 
	else 
	{ 
		$("#m").html('');
    };
};

function verificar(){
    if(document.form1.sector.value==0){
        $("#m").html('');
    }
}
</script>
<script>
function coordenadas(){
var frame = document.getElementById('cont');
var lat = frame.contentWindow.document.getElementById('lat').value;
var lon = frame.contentWindow.document.getElementById('long').value;
    if (lat == "" && lon == ""){
    }
    else if(lat == "undefined" && lon == "undefined"){
    }
    else if(lat == "-34.4784411" && lon == "-71.478234118" || lat == "-34.4784411" && lon == "-71.47823411799999"){
    }
    else{
        document.getElementById('coords').value = lat;
        document.getElementById('coords2').value = lon;
    }
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1"/> 
<style type="text/css">
@import url("registro_solicitud.css");
</style>
<link href="registro_solicitud.css" rel="stylesheet" type="text/css">
<!-- <img class="dis" src="Imagenes/logo.jpg" width="318" height="160"> -->
<title>Registro Organizaciones Comunitarias - Municipalidad de Peralillo </title>
<body oncopy="return false" onpaste="return false" oncontextmenu="return false">
<div>
<button type="button" src="../Imagenes/help_negro.png" id="ayuda" class="ayuda" onclick="Mostrar_Ocultar();"><span class="tooltipayuda"></span></button>
<?php
header( "Content-Type: text/html;charset=utf-8" );
SESSION_START();
$n = $_SESSION['usua'];
$c = $_SESSION['cla'];
$io = $_SESSION['is2'];
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
        <a onclick="location.href = '../registro/registro.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['is']=$io;?>'">Registro Organizaciones Comunitarias</a>
        <a onclick="location.href = '../historial_registro_org_operario/historial_org.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['is1']=$io;?>'">Historial Organizaciones Comunitarias</a>
        <a onclick="location.href = '../historial_solicitudes_operario/historial_sol.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['is3']=$io;?>'">Historial Solicitudes Comunitarias</a>
        <a onclick="location.href = '../solicitud_anterior/registro_solicitud.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['is4']=$io;?>'"> Solicitudes Anteriores</a>
        <a onclick="location.href = '../historial_solicitudes_anterior_operario/historial_sol.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['is5']=$io;?>'">Historial Solicitudes Anteriores</a>
      </li>
    <li><a class="active" onclick="location.href = '#home'">Solicitudes Comunitarias</a></li>
  </ul>
  <li><a onclick="location.href = '../menu.php'">Volver al Menu</a></li>
</ul>
</div>
<section ontouchend="coordenadas();" ontouchstart="coordenadas();" ontouchcancel="coordenadas();">
<form id="form1" name="form1" action="registro_solicitud.php" method="POST" onSubmit="return validar(this)">
<p class= "titulo2" align="center"> Solicitudes Comunitarias</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p class= "titulo3">Organizacion: <input list="list" class="orga" id="orga" name="orga" type="text" style="text-align:center" placeholder="Ingrese y/o Busque Organizacion..." size="30" onkeypress="return valida_letras(event)" maxlength="110" autocomplete="off" onkeyup="verificar();" onblur="buscar();"/>
<?php
header("Content-Type: text/html;charset=utf-8");
$conexion = mysqli_connect("localhost","cre37351_root","lacomunagana","cre37351_deptosocial") or die ("Error");
mysqli_set_charset($conexion,"utf8");
$ejecutar = mysqli_query($conexion," Call Mostrar_Nombre_Tipo_Org");
mysqli_set_charset($conexion,"utf8");
?>
<datalist id="list">
<?php while ($row = mysqli_fetch_array($ejecutar)) { ?> 
<option><?php echo $row[0].' '.$row[1];?></option>
<?php } ?>
</datalist>
</p>
<aside id="m" name="m"></aside>
<!-- <select class="sector" id="sector" name="sector">
<option value="">Seleccione un Sector...</option>
#header("Content-Type: text/html;charset=utf-8");
#$conexion = mysqli_connect("systemchile.com","cre37351_root","lacomunagana","cre37351_deptosocial") or die ("Error");
#mysqli_set_charset($conexion,"utf8");
#$ejecutar = mysqli_query($conexion,"Call Consulta_Sectores");
#mysqli_set_charset($conexion,"utf8");
#while($fila = mysqli_fetch_array($ejecutar)){
#    $i = $fila[0];
#   $i2 = $fila[1];
#  echo '<option value="'.$i.' - '.$i2.'">'.$i.'  -  '.$i2.'</option>';
#}
#
</select> --></p>

<p class= "titulo3">Direccion: <input type="text" class="direccion" id="direccion" name="direccion" style="text-align:center" placeholder="Ingrese Direccion Solicitud..." size="30" onkeypress="return valida_letras_numeros(event)" maxlength="45" autocomplete="off"/> </p>

<p class= "titulo3">Descripcion: <input type="text" class="descripcion" id="descripcion" name="descripcion" style="text-align:center" placeholder="Ingrese Descripcion de Solicitud..." size="30" onkeypress="return valida_letras_numeros(event)" maxlength="280"  autocomplete="off"/>  </p>

<p class= "titulo3">Tipo Solicitud: <select class="tipo" id="tipo" name="tipo">
  <option value="">Seleccione Tipo Solicitud...</option>
  <option value="Escrita">Escrita</option>
  <option value="Telefono">Telefono</option>
  <option value="Correo">Correo</option>
  <option value="Compromiso Alcalde">Compromiso Alcalde</option>
</select> </p>

<p class= "titulo3">Geolocalizacion:  </p>
 <iframe id="cont" class="cont" onmouseenter="coordenadas();"  onmousemove="coordenadas();" onmouseleave="coordenadas();" ontouchend="coordenadas();" ontouchstart="coordenadas();" ontouchcancel="coordenadas();"  oncopy="return false" onpaste="return false" oncontextmenu="return false" src="googlemaps.html" frameborder="0" style="border:0" allowfullscreen ></iframe>
<input type="text" class="coords" id="coords" name="coords" style="text-align:center" placeholder="Buscar direccion y arrastrar marcador..." size="30"  maxlength="280"  autocomplete="off" readonly ="true"/> 
<input type="text" class="coords2" id="coords2" name="coords2" style="text-align:center" placeholder="Buscar direccion y arrastrar marcador..." size="30" maxlength="280"  autocomplete="off" readonly ="true"/>  </p>

<p class= "titulo3">Estado: <select class="est" id="est" name="est">
    <option value="">Seleccione Estado Solicitud...</option>
    <option value="Pendiente">Pendiente</option>
    <option value="Ejecucion">Ejecucion</option>
    <option value="Evaluacion">Evaluacion</option>
    <option value="Realizado">Realizado</option>
</select> </p>

<p class= "titulo3">Fecha Desde: <input type="date" class="fecha" id="fecha" name="fecha" style="text-align:center" placeholder="Ingrese Fecha Desde..." size="30" maxlength="10" step="1" min="1900-01-01" max="2100-12-31" autocomplete="off"/> </p>
<p class= "titulo3">Fecha Hasta: <input type="date" class="fecha2" id="fecha2" name="fecha2" style="text-align:center" placeholder="Ingrese Fecha Hasta..." size="30" maxlength="10" step="1" min="1900-01-01" max="2100-12-31" autocomplete="off"/> </p>
<p class= "titulo3">Observacion: <input type="text" class="obse" id="obse" name="obse" style="text-align:center" placeholder="Ingrese Observacion..." size="30" onkeypress="return valida_letras_numeros(event)" maxlength="280"  autocomplete="off" />  </p>
<!--sectores -->
<p class= "titulo3">Correos Electronicos: <p id="contador">0</p><aside id="correo_electronico" class="correo_electronico"></aside><button class="button" type="button" id="btn_agregar" onclick="ejecutar();">+<span class='tooltipcor'>Agregar Correo</span></button><button class="button" type="button" id="btn_quitar" onclick="quitar();">-<span class='tooltipcor'>Borrar Ultimo Correo</span></button><p>&nbsp;</p><input type="submit" onclick="buscar();" id="gu" class="g" name="gu" value="Guardar" onclick="valores_ll();"/>
</p>
</form>
</p>
<p>
<?php
$var = "";
  if(isset($_POST["gu"])){
     	$suma = "";
     	header("Content-Type: application/json; charset=UTF-8");
     	header("Content-Type: text/html;charset=utf-8");
     	include('functions.php');
     	date_default_timezone_set('America/Santiago');
		$fechainicio=strftime("%Y-%m-%d", time());
	    $orga = ucwords($_POST["orga"]);
    	$orga = ucwords(strtolower($orga));
    	$orga = ucwords($_POST["orga"]);
     	if (ctype_upper($orga)) {
    		$orga = ucwords($_POST["orga"]);
    		$orga = ucwords(strtolower($orga));
        } else {
    		$orga = ucwords($_POST["orga"]);
    		$orga = ucwords(strtolower($orga));
        }
        
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
        
        $descripcion = ucwords($_POST["descripcion"]);
    	$descripcion = ucwords(strtolower($descripcion));
    	$descripcion = ucwords($_POST["descripcion"]);
     	if (ctype_upper($descripcion)) {
    		$descripcion = ucwords($_POST["descripcion"]);
    		$descripcion = ucwords(strtolower($descripcion));
        } else {
    		$descripcion = ucwords($_POST["descripcion"]);
    		$descripcion = ucwords(strtolower($descripcion));
        }
        
        $obse = ucwords($_POST["obse"]);
    	$obse = ucwords(strtolower($obse));
    	$obse = ucwords($_POST["obse"]);
     	if (ctype_upper($obse)) {
    		$obse = ucwords($_POST["obse"]);
    		$obse = ucwords(strtolower($obse));
        } else {
    		$obse = ucwords($_POST["obse"]);
    		$obse = ucwords(strtolower($obse));
        }
        $latitud = $_POST["coords"];
     	$longitud = $_POST["coords2"];
        $est = $_POST["est"];
        $tipo = $_POST["tipo"];
        $sector = $_POST["sector"];
    	$fecha = $_POST["fecha"];
    	$fecha2 = $_POST["fecha2"];
    	$cor_email= $_POST["email_correo"];
    	$pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
        for($i = 0; $i < 15; $i++) {
            $suma .= $pattern{rand(0, 35)};
        }
        if ($obse == ""){
            ejecutarSQLCommand("Call Ingresar_Solicitud ('$suma','$fechainicio','$orga','$direccion','$sector','$descripcion','$tipo','$latitud','$longitud','$est','$fecha','$fecha2','---')");
            if ($resultset = getSQLResultSet("Call Buscar_Correos_Solicitud")) {
                while ($row = $resultset->fetch_array(MYSQLI_NUM)) {
                   $var = $row['0'];
            ini_set( 'display_errors', 1 );
            error_reporting( E_ALL );
            $from = "sysdideco@systemchile.com";
            $to = $var;
            $asunto = "Nueva Solicitud Comunitaria - Registro de Org. Comunitarias";
            $message = "Estimado Usuario: <br>\n".
              "Se hace envio de una nueva solicitud ya ingresada,<br>\n".
              "informamos ademas que recibirá un resumen diario de todas las solicitudes aún pendientes<br>\n". 
              "<br>\n".
              "Datos de Solicitud: <br>\n".
                "<br>\n".
                "Fecha Ingreso: $fechainicio<br>\n".
                "Organización: $orga<br>\n".
                "Sector: $sector<br>\n".
                "Dirección: $direccion<br>\n".
                "Descripción: $descripcion<br>\n".
                "Tipo de Solicitud: $tipo<br>\n".
                "Estado de Solicitud: $est<br>\n".
                "Fecha Desde: $fecha<br>\n".
                "Fecha Limite: $fecha2<br>\n".
                "Observación: No hay observación<br>\n".
                "<br>\n".
              "Recuerda, para acceder dirígete a nuestro sitio web muniperalillo.cl, pestaña Trámites y luego Sistema<br>\n".
              "<br>\n".
              "--NO RESPONDER A ESTE MENSAJE AUTOMATICO--<br>\n".
                "<br>\n".
              "Atte:<br>\n".
              "Departamento Social <br>\n".
              "Ilustre Municipalidad de Peralillo <br>\n".
            "<br>\n".
              "<img src='systemchile.com/MuniSocial/Imagenes/logomuni.png' width='100' height='140'>";
            $headers = "MIME-Version: 1.0\r\n".		//En el envio de cabeceras se usa el \r\n como salto de linea.
               "Content-type: text/html;charset=charset=UTF-8\r\n".
               "From: $from\r\n".				//Nota. Dirección del remitente. 
               "Reply-To: $from\r\n".			//Nota. Dirección de respuesta. //Creo que sobra.
               "Return-path: $from\r\n".		//Nota. Ruta del mensaje desde origen a destino.  //Creo que sobra.
               "\r\n";
            mail($to,$asunto,$message, $headers);
            }
            }
            if ($cor_email == ""){
            }
            else{
                foreach ($_POST['email_correo'] as $correo){
                if($correo == ""){
                }else{
                $correo1 = str_replace(' ', '', $correo);
                $correodefi = trim($correo1);
                ejecutarSQLCommand("Call Insertar_Correos_Externos ('$correodefi','$suma')");
                ini_set( 'display_errors', 1 );
                error_reporting( E_ALL );
                $from = "sysdideco@systemchile.com";
                $to = $correodefi;
                $asunto = "Nueva Solicitud Comunitaria - Registro de Org. Comunitarias";
                $message = "Estimado Usuario: <br>\n".
                  "Se hace envio de una nueva solicitud ya ingresada,<br>\n".
                  "informamos ademas que resibirá un resumen diario de todas las solicitudes aún pendientes<br>\n". 
                  "<br>\n".
                  "Datos de Solicitud: <br>\n".
                    "<br>\n".
                    "Fecha Ingreso: $fechainicio<br>\n".
                    "Organización: $orga<br>\n".
                    "Sector: $sector<br>\n".
                    "Dirección: $direccion<br>\n".
                    "Descripción: $descripcion<br>\n".
                    "Tipo de Solicitud: $tipo<br>\n".
                    "Estado de Solicitud: $est<br>\n".
                    "Fecha Desde: $fecha<br>\n".
                    "Fecha Limite: $fecha2<br>\n".
                    "Observación: No hay observación<br>\n".
                    "<br>\n".
                  "Recuerda, para acceder dirígete a nuestro sitio web muniperalillo.cl, pestaña Trámites y luego Sistema<br>\n".
                  "<br>\n".
                  "--NO RESPONDER A ESTE MENSAJE AUTOMATICO--<br>\n".
                    "<br>\n".
                  "Atte:<br>\n".
                  "Departamento Social <br>\n".
                  "Ilustre Municipalidad de Peralillo <br>\n".
                "<br>\n".
                  "<img src='systemchile.com/MuniSocial/Imagenes/logomuni.png' width='100' height='140'>";
                $headers = "MIME-Version: 1.0\r\n".		//En el envio de cabeceras se usa el \r\n como salto de linea.
                   "Content-type: text/html;charset=charset=UTF-8\r\n".
                   "From: $from\r\n".				//Nota. Dirección del remitente. 
                   "Reply-To: $from\r\n".			//Nota. Dirección de respuesta. //Creo que sobra.
                   "Return-path: $from\r\n".		//Nota. Ruta del mensaje desde origen a destino.  //Creo que sobra.
                   "\r\n";
                mail($to,$asunto,$message, $headers);
                }
                }
            }
		echo "<script>alert('Datos ingresados correctamente')</script>";
        }else{
        ejecutarSQLCommand("Call Ingresar_Solicitud ('$suma','$fechainicio','$orga','$direccion','$sector','$descripcion','$tipo','$latitud','$longitud','$est','$fecha','$fecha2','$obse')");
            if ($resultset = getSQLResultSet("Call Buscar_Correos_Solicitud")) {
                while ($row = $resultset->fetch_array(MYSQLI_NUM)) {
            $var = $row['0'];
            ini_set( 'display_errors', 1 );
            error_reporting( E_ALL );
            $from = "sysdideco@systemchile.com";
            $to = $var;
            $asunto = "Nueva Solicitud Comunitaria - Registro de Org. Comunitarias";
            $message = "Estimado Usuario: <br>\n".
              "Se hace envio de una nueva solicitud ya ingresada,<br>\n".
              "informamos ademas que resibirá un resumen diario de todas las solicitudes aún pendientes<br>\n". 
              "<br>\n".
              "Datos de Solicitud: <br>\n".
                "<br>\n".
                "Fecha Ingreso: $fechainicio<br>\n".
                "Organización: $orga<br>\n".
                "Sector: $sector<br>\n".
                "Dirección: $direccion<br>\n".
                "Descripción: $descripcion<br>\n".
                "Tipo de Solicitud: $tipo<br>\n".
                "Estado de Solicitud: $est<br>\n".
                "Fecha Desde: $fecha<br>\n".
                "Fecha Limite: $fecha2<br>\n".
                "Observación: $obse<br>\n".
                "<br>\n".
              "Recuerda, para acceder dirígete a nuestro sitio web muniperalillo.cl, pestaña Trámites y luego Sistema<br>\n".
              "<br>\n".
              "--NO RESPONDER A ESTE MENSAJE AUTOMATICO--<br>\n".
                "<br>\n".
              "Atte:<br>\n".
              "Departamento Social <br>\n".
              "Ilustre Municipalidad de Peralillo";
            $headers = "MIME-Version: 1.0\r\n".		//En el envio de cabeceras se usa el \r\n como salto de linea.
               "Content-type: text/html;charset=charset=UTF-8\r\n".
               "From: $from\r\n".				//Nota. Dirección del remitente. 
               "Reply-To: $from\r\n".			//Nota. Dirección de respuesta. //Creo que sobra.
               "Return-path: $from\r\n".		//Nota. Ruta del mensaje desde origen a destino.  //Creo que sobra.
               "\r\n";
            mail($to,$asunto,$message, $headers);
                	}
             }
             if ($cor_email == ""){
             }
             else{
                    foreach ($_POST['email_correo'] as $correo){
                        if($correo == ""){
                        }else{
                        $correo1 = str_replace(' ', '', $correo);
                        $correodefi = trim($correo1);
                        ejecutarSQLCommand("Call Insertar_Correos_Externos ('$correodefi','$suma')");
                        ini_set( 'display_errors', 1 );
                        error_reporting( E_ALL );
                        $from = "sysdideco@systemchile.com";
                        $to = $correo;
                        $asunto = "Nueva Solicitud Comunitaria - Registro de Org. Comunitarias";
                        $message = "Estimado Usuario: <br>\n".
                          "Se hace envio de una nueva solicitud ya ingresada,<br>\n".
                          "informamos ademas que resibirá un resumen diario de todas las solicitudes aún pendientes<br>\n". 
                          "<br>\n".
                          "Datos de Solicitud: <br>\n".
                            "<br>\n".
                            "Fecha Ingreso: $fechainicio<br>\n".
                            "Organización: $orga<br>\n".
                            "Sector: $sector<br>\n".
                            "Dirección: $direccion<br>\n".
                            "Descripción: $descripcion<br>\n".
                            "Tipo de Solicitud: $tipo<br>\n".
                            "Estado de Solicitud: $est<br>\n".
                            "Fecha Desde: $fecha<br>\n".
                            "Fecha Limite: $fecha2<br>\n".
                            "Observación: $obse<br>\n".
                            "<br>\n".
                          "Recuerda, para acceder dirígete a nuestro sitio web muniperalillo.cl, pestaña Trámites y luego Sistema<br>\n".
                          "<br>\n".
                          "--NO RESPONDER A ESTE MENSAJE AUTOMATICO--<br>\n".
                            "<br>\n".
                          "Atte:<br>\n".
                          "Departamento Social <br>\n".
                          "Ilustre Municipalidad de Peralillo <br>\n".
                        "<br>\n".
                          "<img src='systemchile.com/MuniSocial/Imagenes/logomuni.png' width='100' height='140'>";
                        $headers = "MIME-Version: 1.0\r\n".		//En el envio de cabeceras se usa el \r\n como salto de linea.
                           "Content-type: text/html;charset=charset=UTF-8\r\n".
                           "From: $from\r\n".				//Nota. Dirección del remitente. 
                           "Reply-To: $from\r\n".			//Nota. Dirección de respuesta. //Creo que sobra.
                           "Return-path: $from\r\n".		//Nota. Ruta del mensaje desde origen a destino.  //Creo que sobra.
                           "\r\n";
                        mail($to,$asunto,$message, $headers);
                        }
                    }
                }
		echo "<script>alert('Datos ingresados correctamente')</script>";    
        }
            
}
?>
</section>
<!--<div id="openModal" class="modalDialog">
	<div>
		<a href="#close" title="Close" class="close">X</a>
		<h2>Mi modal</h2>
		<p>Este es un ejemplo de modal, creado gracias al poder de CSS3.</p>
		<p>Puedes hacer un montón de cosas aquí, como alertas o incluso crear un formulario de registro aquí mismo.</p>
	</div>
</div>-->
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