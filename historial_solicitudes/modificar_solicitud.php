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
<button type="button" src="../Imagenes/help_negro.png" id="ayuda" class="ayuda" onclick="Mostrar_Ocultar();"><span class="tooltipayuda"></span></button>
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
  <li><a onclick="location.href = 'historial_sol.php'">Historial Solicitudes</a></li>
  <li><a onclick="location.href = '../menu_admin.php'">Volver al Menu</a></li>
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
    	$c = $fila[3];
    }
?>
<form id="form1" name="form1" action="modificar_solicitud.php" method="POST" onSubmit="return validar(this)">
<p class= "titulo2" align="center"> Modificar Solicitud</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p class= "titulo3">ID: <input type="text" class="id" id="id" name="id" style="text-align:center" placeholder="Ingrese ID..." size="30"  onkeypress="return valida_letras_numeros(event)" maxlength="45" autocomplete="off" value="<?php echo $doctorwho; ?>" readonly=”readonly”/> </p>

<p class= "titulo3">Estado: <select class="estado" id="estado" name="estado">
    
     <?php
        if (strpos($a, 'Pendiente') !== false)
    	{
           echo '<option value="">Seleccione Estado Solicitud...</option>
                <option value="Pendiente" selected>Pendiente</option>
                <option value="Ejecucion">Ejecucion</option>
                <option value="Evaluacion">Evaluacion</option>
                <option value="Realizado">Realizado</option>';
        }
        elseif(strpos($a, 'Ejecucion') !== false)
        {
             echo '<option value="">Seleccione Estado Solicitud...</option>
                <option value="Pendiente">Pendiente</option>
                <option value="Ejecucion" selected>Ejecucion</option>
                <option value="Evaluacion">Evaluacion</option>
                <option value="Realizado">Realizado</option>';
        }
        elseif(strpos($a, 'Evaluacion') !== false)
        {
             echo '<option value="">Seleccione Estado Solicitud...</option>
                <option value="Pendiente">Pendiente</option>
                <option value="Ejecucion">Ejecucion</option>
                <option value="Evaluacion" selected>Evaluacion</option>
                <option value="Realizado">Realizado</option>';
        }
        elseif(strpos($a, 'Realizado') !== false)
        {
             echo '<option value="">Seleccione Estado Solicitud...</option>
                <option value="Pendiente">Pendiente</option>
                <option value="Ejecucion">Ejecucion</option>
                <option value="Evaluacion">Evaluacion</option>
                <option value="Realizado" selected>Realizado</option>';
        }
    ?>
</select> </p>

<p class= "titulo3">Fecha Hasta: <input type="date" class="fecha" id="fecha" name="fecha" style="text-align:center" placeholder="Ingrese Fecha Hasta..." size="30" maxlength="10" step="1" min="1900-01-01" max="2100-12-31" autocomplete="off" value="<?php echo $b; ?>"/> </p>
<p class= "titulo3">Observacion: <input type="text" class="obse" id="obse" name="obse" style="text-align:center" placeholder="Ingrese Observacion..." size="30" maxlength="90" autocomplete="off" onkeypress="return valida_letras_numeros(event)" value="<?php echo $c; ?>"/> </p>
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
    $conexion = mysqli_connect("localhost","cre37351_root","lacomunagana","cre37351_deptosocial") or die ("Error");
    mysqli_set_charset($conexion,"utf8");
    $ejecutar = mysqli_query($conexion, "Call Buscar_Solo_ID_Solicitud('".$doc."')");
    $fila = mysqli_fetch_array($ejecutar);
    $a = $fila[1];
    $b = $fila[2];
    $c = $fila[3];
    $d = $fila[4];
    $e = $fila[5];
    $f = $fila[6];
    $g = $fila[10];
    $conversion1 = base64_decode($n);
    if ($resultset = getSQLResultSet("Call Buscar_Correos_Solicitud")) {
        while ($row = $resultset->fetch_array(MYSQLI_NUM)) {
            $var = $row['0'];
            ini_set( 'display_errors', 1 );
            error_reporting( E_ALL );
            $from = "sysdideco@systemchile.com";
            $to = $var;
            $asunto = "Modificación Solicitud Comunitaria - Registro de Org. Comunitarias";
            $message = "Estimado Usuario: <br>\n".
            "Se hace envio de una modificación de solicitud,<br>\n".
            "recuerde que ademas resibirá un resumen diario de todas las solicitudes aún pendientes<br>\n". 
            "<br>\n".
            "Datos de Solicitud: <br>\n".
            "<br>\n".
            "Fecha Ingreso: $a<br>\n".
            "Organización: $b<br>\n".
            "Sector: $d<br>\n".
            "Dirección: $c<br>\n".
            "Descripción: $e<br>\n".
            "Tipo de Solicitud: $f<br>\n".
            "Estado de Solicitud: $estado<br>\n".
            "Fecha Desde: $g<br>\n".
            "Fecha Limite: $fecha<br>\n".
            "Observación: $obse<br>\n".
            "<br>\n".
            "Modificado por: $conversion1<br>\n".
            "<br>\n".
            "Para acceder dirígete a nuestro sitio web muniperalillo.cl, pestaña Trámites y luego Sistema<br>\n".
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
    
    if ($resultset = getSQLResultSet("Call Buscar_Correos_Externos")) {
        while ($row = $resultset->fetch_array(MYSQLI_NUM)) {
            $var2 = $row['0'];
            $var3 = $row['1'];
            if ($var3 == $doc){
            ini_set( 'display_errors', 1 );
            error_reporting( E_ALL );
            $from = "sysdideco@systemchile.com";
            $to = $var2;
            $asunto = "Modificación Solicitud Comunitaria - Registro de Org. Comunitarias";
            $message = "Estimado Usuario: <br>\n".
            "Se hace envio de una modificación de solicitud,<br>\n".
            "recuerde que ademas resibirá un resumen diario de todas las solicitudes aún pendientes<br>\n". 
            "<br>\n".
            "Datos de Solicitud: <br>\n".
            "<br>\n".
            "Fecha Ingreso: $a<br>\n".
            "Organización: $b<br>\n".
            "Sector: $d<br>\n".
            "Dirección: $c<br>\n".
            "Descripción: $e<br>\n".
            "Tipo de Solicitud: $f<br>\n".
            "Estado de Solicitud: $estado<br>\n".
            "Fecha Desde: $g<br>\n".
            "Fecha Limite: $fecha<br>\n".
            "Observación: $obse<br>\n".
            "<br>\n".
            "Para acceder dirígete a nuestro sitio web muniperalillo.cl, pestaña Trámites y luego Sistema<br>\n".
            "<br>\n".
            "--NO RESPONDER A ESTE MENSAJE AUTOMATICO--<br>\n".
            "<br>\n".
            "Modificado por: $conversion1<br>\n".
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
            }else{
            }
        }
    }
	echo "<script>alert('Datos modificados correctamente')</script>";
	echo "<script language=Javascript> location.href=\"historial_sol.php\"; </script>"; 
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
     <article class="div_info_oculto" id="textow">
    <iframe class="traeayuda" src="../ayuda/mant_personal.html"></iframe>
    </article>
    <article class="div_info_oculto" id="textox">
    <iframe class="traeayuda" src="../ayuda/mant_sector.html"></iframe>
    </article>
    <article class="div_info_oculto" id="textoy">
    <iframe class="traeayuda2" src="../ayuda/mant_organiza.html"></iframe>
    </article>
    <article class="div_info_oculto" id="textoz">
    <iframe class="traeayuda" src="../ayuda/historial_sesion.html"></iframe>
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
				<li>
                    <a class="item10" onclick="Mostrarw('10');"><img class="icono2" src="../Imagenes/icono_ayuda.png" alt=""></img><span class="letras">Mantenedor Registro de Personal</span></a>
				</li>
				<li>
                    <a class="item11" onclick="Mostrarx('11');"><img class="icono" src="../Imagenes/icono_ayuda.png" alt=""></img><span class="letras">Mantenedor de Sectores</span></a>
				</li>
				<li>
                    <a class="item12" onclick="Mostrary('12');"><img class="icono3" src="../Imagenes/icono_ayuda.png" alt=""></img><span class="letras">Mantenedor Tipos de Organización</span></a>
				</li>
				<li>
                    <a class="item13" onclick="Mostrarz('13');"><img class="icono" src="../Imagenes/icono_ayuda.png" alt=""></img><span class="letras">Historial de Inicio Sesión</span></a>
				</li>
			</ul>
   <p>&nbsp;</p>
</article>
</article>
</body>
</head>
</html>