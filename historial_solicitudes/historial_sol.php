<!DOCTYPE html>
<html>
<head>
<noscript>
  <META HTTP-EQUIV="Refresh" CONTENT="0;URL=java.html">
</noscript>
<article id="contenedor_carga">
	<article id="carga"></article>
</article>
<script src="../Imagenes/jquery_fade.min.js"></script>
<script src="func.js"> </script>
<script>
	window.onload = function(){
	var contenedor = document.getElementById('contenedor_carga');
	contenedor.style.visibility = 'hidden';
	contenedor.style.opacity = '0';
	var carg = document.getElementById('carga');
    carg.style.animationPlayState = "paused"; 
	}
</script>
<script>
$(document).ready(function(){
$("#check").click(function(){
    $("#ex").fadeToggle("fast");
    $("#el").fadeToggle("fast");
    if($("#check").prop('checked') ) {
        $("#boton_eliminar").fadeIn("fast");
        $("#boton_exportacion").fadeIn("fast");
        $("#boton_eliminar").animate({left: '27px'});
        $("#boton_exportacion").animate({left: '27px'});
        
    }
    else{
        $("#boton_eliminar").fadeOut("fast");
        $("#boton_exportacion").fadeOut("fast");
        $("#boton_eliminar").animate({left: '-65px'});
        $("#boton_exportacion").animate({left: '-52px'});
    }
});
});
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1"/> 
<style type="text/css">
@import url("historial_sol.css");
</style>
<link href="historial_sol.css" rel="stylesheet" type="text/css">
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
$lñ= $_SESSION['t4'];
if($n == "" && $c == "" && $lñ == ""){
SESSION_START();
SESSION_UNSET();
SESSION_DESTROY();
header("Location:../login.php");
}
else{
    if ($lñ=="Administrador"){
    }else{
        SESSION_START();
		SESSION_UNSET();
		SESSION_DESTROY();
        header("Location:../login.php");
    }
}
?>
<p></p>
<input type="checkbox" class="checkbox" id="check">
    <label class="menu" for="check">|||</label>
    <div class="left-panel" id="left_panel">
        <div class="ex" id="ex">
        </div>
        <div class="el" id="el">
        </div>
    </div>
<img class="dis" src="../Imagenes/logomuni.png">
<p class="titulo75">MUNICIPALIDAD DE PERALILLO</p>
<p class="copy">Copyright © 2019 | Diseñado por N.A.B para Muniperalillo</p>
<ul class="nav nav-pills nav-stacked">
    <ul class="dropdown">
  <li><a class="active" onclick="location.href = '#home'">Historial Solicitudes</a></li>
 <li class="dropdown-content">
    <a onclick="location.href = '../mant_repersonal/registro.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['t']=$lñ;?>'">Mantenedor Registro Personal</a>
    
    <a onclick="location.href = '../mant_sectores/sectores.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['t1']=$lñ;?>'">Mantenedor Sectores</a>
    
    <a onclick="location.href = '../mant_tiporganizacion/organizacion.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['t2']=$lñ;?>'">Mantenedor Tipos Organizaciones</a>
    
    <a onclick="location.href = '../registro_admin/registro.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['t5']=$lñ;?>'">Registro Organizaciones Comunitarias</a>
    
    <a onclick="location.href = '../historial_registro_org/historial_org.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['t3']=$lñ;?>'">Historial Organizaciones Comunitarias</a>
    
    <a onclick="location.href = '../solicitud_admin/registro_solicitud.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['t6']=$lñ;?>'">Solicitudes Comunitarias</a>
    
    <a onclick="location.href = '../solicitud_admin_anterior/registro_solicitud.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['t7']=$lñ;?>'">Solicitudes Comunitarias Anteriores</a>
    
    <a onclick="location.href = '../historial_solicitudes_anterior/historial_sol.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['t8']=$lñ;?>'">Historial Solicitudes Anteriores</a>
    
    <a onclick="location.href = '../historial_sesiones/historial_org.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['t9']=$lñ;?>'">Historial Inicio Sesión</a>
    
  </li>
  </ul>
  <li><a onclick="location.href = '../menu_admin.php'">Volver al Menu</a></li>
</ul>
</div>
<section>
<p class= "titulo2" align="center"> Historial Solicitudes</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<div class="tablascroll">
<form action="historial_sol.php" method="POST">
<table class="tabla" border="2" style="background-color: #F9F9F9;">
    <thead>
    <tr>
        <th><button type="submit" id="boton_eliminar" class="boton_eliminar" name="elres" value=""><span class="tooltipeliminar"></span></button></th>
        <th>Fecha Ingreso</th>
        <th>Nombre Organizacion</th>
        <th>Direccion</th>
        <th>Sector</th>
        <th>Descripcion</th>
        <th>Tipo Solicitud</th>
        <th>Latitud</th>
        <th>Longitud</th>
        <th>Estado</th>
        <th>Fecha Desde</th>
        <th>Fecha Hasta</th>
        <th>Observacion</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
     <?php
     header("Content-Type: text/html;charset=utf-8");
     if(isset($_POST["buscar"])){
     $dato = $_POST['bus'];
        $conexion = mysqli_connect("localhost","cre37351_root","lacomunagana","cre37351_deptosocial") or die ("Error");
        mysqli_set_charset($conexion,"utf8");
        $consulta = "Call Buscar_Solicitudes('".$dato."%')";
        $ejecutar = mysqli_query($conexion,$consulta);
        $i = 0;
    	while ($row = mysqli_fetch_array($ejecutar)) 
    	{
            $c1 = $row[0];
            $c2 = $row[1];
    	    $c3 = $row[2];
    	    $c4 = $row[3];
    	    $c5 = $row[4];
    	    $c6 = $row[5];
    	    $c7 = $row[6];
    	    $c8 = $row[7];
    	    $c9 = $row[8];
    	    $c10 = $row[9];
    	    $c11 = $row[10];
    	    $c12 = $row[11];
    	    $c13 = $row[12];
	        $i++;
       ?>
           <tr class="objetos">
            <td><input type="checkbox" class="checkbox2" name="marca_eliminacion[]" style="text-align:center" value="<?php echo $c1; ?>"/></td>
            <td><?php echo $c2; ?></td>
            <td><?php echo $c3; ?></td>
            <td><?php echo $c4; ?></td>
            <td><?php echo $c5; ?></td>
            <td><?php echo $c6; ?></td>
            <td><?php echo $c7; ?></td>
            <td><?php echo $c8; ?></td>
            <td><?php echo $c9; ?></td>
            <td><?php echo $c10; ?></td>
            <td><?php echo $c11; ?></td>
            <td><?php echo $c12; ?></td>
            <td><?php echo $c13; ?></td>
            <td><a class="modificar_usuario" onclick="location.href = 'modificar_solicitud.php?modificar=<?php echo $c1; ?>'"></a></td>
            <td><a class="eliminar_usuario" onclick="eliminar_user('<?php echo $c1; ?>');"></a></td>
            </tr>
   <?php } }?>
</table>
</form>
</div>
<object type="text/html" id="c" class="c" oncopy="return false" onpaste="return false" oncontextmenu="return false" data="index.php?valor_busqueda=<?php echo $dato = $_POST['bus']; ?>" frameborder="0" style="border:0" allowfullscreen></object>
<form action="historial_sol.php" method="POST">
<input type="text" class="bus" id="bus" name="bus" style="text-align:center" placeholder="Ingrese Dato a Buscar..." size="30" autocomplete="off"/> <input type="submit" class="buscar" name="buscar" value="Buscar" /> </p>
</form>
</p>
<p>
<?php 
header( "Content-Type: text/html;charset=utf-8" );
$conexion = mysqli_connect("localhost","cre37351_root","lacomunagana","cre37351_deptosocial") or die ("Error");
 mysqli_set_charset($conexion,"utf8");
    if(isset($_GET["eliminar"])){
        include('functions.php');
        $conversion1 = base64_decode($n);
        $recuperacion_id = $_GET["eliminar"];
        $conexion = mysqli_connect("localhost","cre37351_root","lacomunagana","cre37351_deptosocial") or die ("Error");
        mysqli_set_charset($conexion,"utf8");
        $ejecutar = mysqli_query($conexion, "Call Buscar_Solo_ID_Solicitud('".$recuperacion_id."')");
        $fila = mysqli_fetch_array($ejecutar);
        $a = $fila[1];
        $b = $fila[2];
        $c = $fila[3];
        $d = $fila[4];
        $e = $fila[5];
        $f = $fila[6];
        $g = $fila[9];
        $h = $fila[10];
        $i = $fila[11];
        $j = $fila[12];
        if ($resultset = getSQLResultSet("Call Buscar_Correos_Solicitud")) {
        while ($row = $resultset->fetch_array(MYSQLI_NUM)) {
            $var = $row['0'];
            ini_set( 'display_errors', 1 );
            error_reporting( E_ALL );
            $from = "sysdideco@systemchile.com";
            $to = $var;
            $asunto = "Solicitud Comunitaria Eliminada- Registro de Org. Comunitarias";
            $message = "Estimado Usuario: <br>\n".
            "Se informa que se ha eliminado la siguiente solicitud,<br>\n".
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
            "Estado de Solicitud: $g<br>\n".
            "Fecha Desde: $h<br>\n".
            "Fecha Limite: $i<br>\n".
            "Observación: $j<br>\n".
            "<br>\n".
            "Eliminado por: $conversion1<br>\n".
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
            if ($var3 == $recuperacion_id){
            ini_set( 'display_errors', 1 );
            error_reporting( E_ALL );
            $from = "sysdideco@systemchile.com";
            $to = $var2;
            $asunto = "Solicitud Comunitaria Eliminada - Registro de Org. Comunitarias";
            $message = "Estimado Usuario: <br>\n".
            "Se informa que se ha eliminado la siguiente solicitud,<br>\n".
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
            "Estado de Solicitud: $g<br>\n".
            "Fecha Desde: $h<br>\n".
            "Fecha Limite: $i<br>\n".
            "Observación: $j<br>\n".
            "<br>\n".
            "Eliminado por: $conversion1<br>\n".
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
            else{
            }
        }
    }
        date_default_timezone_set('America/Santiago');
		$fechainicio=strftime("%Y-%m-%d", time());
		ejecutarSQLCommand("Call Borrar_Solicitud ('".$recuperacion_id."','".$fechainicio."')");
        echo "<script>alert('Datos eliminado correctamente')</script>";
        echo "<script language=Javascript> location.href=\"historial_sol.php\"; </script>"; 
    }
?>
<?php
header( "Content-Type: text/html;charset=utf-8" );
     $conexion = mysqli_connect("localhost","cre37351_root","lacomunagana","cre37351_deptosocial") or die ("Error");
         mysqli_set_charset($conexion,"utf8");
    if(isset($_POST["elres"])){
            include('functions.php');
            $conversion1 = base64_decode($n);
           date_default_timezone_set('America/Santiago');
		    $fechainicio=strftime("%Y-%m-%d", time());
		    $ejec = 0;
        foreach ($_POST['marca_eliminacion'] as $marcador){
            $a=""; $b=""; $c=""; $d=""; $e=""; $f=""; $g=""; $h=""; $i=""; $j="";
            if ($resultset = getSQLResultSet("Call Buscar_Solo_ID_Solicitud('".$marcador."')")) {
                while ($row = $resultset->fetch_array(MYSQLI_NUM)) {
                    $a = $row['1'];
                    $b = $row['2'];
                    $c = $row['3'];
                    $d = $row['4'];
                    $e = $row['5'];
                    $f = $row['6'];
                    $g = $row['9'];
                    $h = $row['10'];
                    $i = $row['11'];
                    $j = $row['12'];
                }
            }
            if ($resultset = getSQLResultSet("Call Buscar_Correos_Solicitud")) {
            while ($row = $resultset->fetch_array(MYSQLI_NUM)) {
                $var = $row['0'];
                ini_set( 'display_errors', 1 );
                error_reporting( E_ALL );
                $from = "sysdideco@systemchile.com";
                $to = $var;
                $asunto = "Solicitud Comunitaria Eliminada- Registro de Org. Comunitarias";
                $message = "Estimado Usuario: <br>\n".
                "Se informa que se ha eliminado la siguiente solicitud,<br>\n".
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
                "Estado de Solicitud: $g<br>\n".
                "Fecha Desde: $h<br>\n".
                "Fecha Limite: $i<br>\n".
                "Observación: $j<br>\n".
                "<br>\n".
                "Eliminado por: $conversion1<br>\n".
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
                if($var3 == $marcador)
                {
                ini_set( 'display_errors', 1 );
                error_reporting( E_ALL );
                $from = "sysdideco@systemchile.com";
                $to = $var2;
                $asunto = "Solicitud Comunitaria Eliminada - Registro de Org. Comunitarias";
                $message = "Estimado Usuario: <br>\n".
                "Se informa que se ha eliminado la siguiente solicitud,<br>\n".
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
                "Estado de Solicitud: $g<br>\n".
                "Fecha Desde: $h<br>\n".
                "Fecha Limite: $i<br>\n".
                "Observación: $j<br>\n".
                "<br>\n".
                "Eliminado por: $conversion1<br>\n".
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
                else{
                }
            }
        }
            ejecutarSQLCommand("Call Borrar_Solicitud('".$marcador."','".$fechainicio."')");
            $ejec++;
        }
        if($ejec > 0){
            echo "<script>alert('Datos eliminado correctamente')</script>";
        }
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
<script src="exportar_documentos/jquery-1.12.4.min.js"></script>
<script src="exportar_documentos/FileSaver.min.js"></script>
<script src="exportar_documentos/Blob.min.js"></script>
<script src="exportar_documentos/xls.core.min.js"></script>
<script src="exportar_documentos/tableexport.js"></script>
<script>
$("table").tableExport({
	formats: ["xlsx"], //Tipo de archivos a exportar ("xlsx","txt", "csv", "xls")
	position: 'button',  // Posicion que se muestran los botones puedes ser: (top, bottom)
	bootstrap: false,//Usar lo estilos de css de bootstrap para los botones (true, false)
	fileName: "Registro Organizaciones Comunitarias",    //Nombre del archivo 
});
</script>
</head>
</html>