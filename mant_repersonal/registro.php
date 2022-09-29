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
<script src="../Imagenes/jquery-1.9.1.min.js"></script>
<script src="func_admin.js"> </script>
<button type="button" src="../Imagenes/help_negro.png" id="ayuda" class="ayuda" onclick="Mostrar_Ocultar();"><span class="tooltipayuda"></span></button>
<?php
header( "Content-Type: text/html;charset=utf-8" );
SESSION_START();
$n = $_SESSION['usua'];
$c = $_SESSION['cla'];
$h = $_SESSION['t'];
if($n == "" && $c == "" && $h == ""){
SESSION_START();
SESSION_UNSET();
SESSION_DESTROY();
header("Location:../login.php");
}
else{
    if ($h=="Administrador"){
    }else{
        SESSION_START();
		SESSION_UNSET();
		SESSION_DESTROY();
        header("Location:../login.php");
    }
}
?>
<p></p>
<img class="dis" src="../Imagenes/logomuni.png">
<p class="titulo75">MUNICIPALIDAD DE PERALILLO</p>
<p class="copy">Copyright © 2019 | Diseñado por N.A.B para Muniperalillo</p>
<ul class="nav nav-pills nav-stacked">
<ul class="dropdown">
  <li><a class="active" onclick="location.href = '#home'">Mantenedor Registro Personal</a></li>
  <li class="dropdown-content">
    <a onclick="location.href = '../mant_sectores/sectores.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['t1']=$h;?>'">Mantenedor Sectores</a>
    
    <a onclick="location.href = '../mant_tiporganizacion/organizacion.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['t2']=$h;?>'">Mantenedor Tipos Organizaciones</a>
    
    <a onclick="location.href = '../registro_admin/registro.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['t5']=$h;?>'">Registro Organizaciones Comunitarias</a>
    
    <a onclick="location.href = '../historial_registro_org/historial_org.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['t3']=$h;?>'">Historial Organizaciones Comunitarias</a>
    
    <a onclick="location.href = '../solicitud_admin/registro_solicitud.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['t6']=$h;?>'">Solicitudes Comunitarias</a>
    
    <a onclick="location.href = '../historial_solicitudes/historial_sol.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['t4']=$h;?>'">Historial Solicitudes</a>
    
    <a onclick="location.href = '../solicitud_admin_anterior/registro_solicitud.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['t7']=$h;?>'">Solicitudes Comunitarias Anteriores</a>
    
    <a onclick="location.href = '../historial_solicitudes_anterior/historial_sol.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['t8']=$h;?>'">Historial Solicitudes Anteriores</a>
    
    <a onclick="location.href = '../historial_sesiones/historial_org.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['t9']=$h;?>'">Historial Inicio Sesión</a>
    
  </li>
  </ul>
  <li><a onclick="location.href = '../menu_admin.php'">Volver al Menu</a></li>
</ul>
</div>
<section>
<form id="form1" name="form1" action="registro.php" method="POST" onSubmit="return validar(this)">
<p class= "titulo2" align="center"> Mantenedor Registro Personal</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p class= "titulo3">Nombre: <input type="text" class="nombre" id="nombre" name="nombre" style="text-align:center" placeholder="Ingrese Nombre Usuario..." size="30"  onkeypress="return valida_letras_numeros(event)" maxlength="45" autocomplete="off" value="" onkeyup="verificar();" onblur="buscar();"/></p>

<p class= "titulo3">Clave: <input type="text" class="clave" id="clave" name="clave" style="text-align:center" placeholder="Ingrese Clave de acceso..." size="30" onkeypress="return valida_letras_numeros(event)" maxlength="90"  autocomplete="off" value="" onkeyup="verificar();" onblur="buscar2();"/>  </p>

<p class= "titulo3">Cargo Usuario: <select class="cargo" id="cargo" name="cargo">
  <option value="">Seleccione Cargo de Usuario...</option>
  <option value="Administrador">Administrador</option>
  <option value="Operario">Operario</option>
</select> </p>

<p class= "titulo3">Email: <input type="text" class="rut" id="rut" name="rut" style="text-align:center" placeholder="Ingrese Email..." size="30" maxlength="75" autocomplete="off" pattern="^[\w._%-]+@[\w.-]+\.[a-zA-Z]{2,4}$" value="" onkeyup="verificar();" onblur="buscar3();"/> <input type="submit" onclick="" id="gu" class="g" name="gu" value="Guardar"/>
</p>
<p>&nbsp;</p>
</form>
<aside class="resultadoBusqueda" id="resultadoBusqueda"></aside>
<aside class="resultadoBusqueda2" id="resultadoBusqueda2"></aside>
<aside class="resultadoBusqueda3" id="resultadoBusqueda3"></aside>
<div class="tablascroll">
<form action="registro.php" method="POST">
<table id="tabla" class="tabla" border="2" style="background-color: #F9F9F9;">
    <thead>
    <tr>
        <th><button type="submit" id="boton_eliminar" class="boton_eliminar" name="elres" value=""><span class="tooltipeliminar">Eliminar Registros Marcados</span></button></th>
      <th>Nombre</th>
      <th>Clave</th>
      <th>Cargo</th>
      <th>Email</th>
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
        $consulta = "Call Buscar_Registro_Personal('".$dato."%')";
        $ejecutar = mysqli_query($conexion,$consulta);
        $i = 0;
    	while ($row = mysqli_fetch_array($ejecutar)) 
    	{
            $a1 = $row[0];
            $b2 = $row[1];
    	    $c3 = "•••••";
	        $d4 = $row[3];
    	    $e5 = $row[4];
            $i++;
       ?>
       <tr class="objetos">
           <td><input type="checkbox" class="checkbox" name="marca_eliminacion[]" style="text-align:center" value="<?php echo $a1; ?>"/></td>
            <td><?php echo $b2; ?></td>
            <td><?php echo $c3; ?></td>
            <td><?php echo $d4; ?></td>
            <td><?php echo $e5; ?></td>
            <td><a class="modificar_usuario" onclick="location.href = 'modificar_usuario.php?modificar=<?php echo $a1; ?>'">Modificar</a></td>
            <td><a class="eliminar_usuario" onclick="eliminar_user('<?php echo $a1; ?>');">Eliminar</a></td>
       </tr>
   <?php } } ?>
</table>
</form>
</div>
<form action="registro.php" method="POST">
<input type="text" class="bus" id="bus" name="bus" style="text-align:center" placeholder="Ingrese Dato a Buscar..." size="30" autocomplete="off"/> <input type="submit" class="buscar" name="buscar" value="Buscar"> </p>
</form>
</p>
<p>
<?php
$var = "";
if(isset($_POST["gu"])){
    include('functions.php');
    header("Content-Type: application/json; charset=UTF-8");
    header("Content-Type: text/html;charset=utf-8");
	$nombre = ucwords($_POST["nombre"]);
	$nombre = ucwords(strtolower($nombre));
	$nombre = ucwords($_POST["nombre"]);
 	if (ctype_upper($nombre)) {
		$nombre = ucwords($_POST["nombre"]);
		$nombre = ucwords(strtolower($nombre));
    	} 
    	else {
		$nombre = ucwords($_POST["nombre"]);
		$nombre = ucwords(strtolower($nombre));
    	}
	$clave = $_POST["clave"];
	$cargo = $_POST["cargo"];
    $rut = $_POST["rut"];
    $pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
    for($i = 0; $i < 15; $i++) {
        $patron .= $pattern{rand(0, 35)};
    }
	    ejecutarSQLCommand("Call Ingresar_Usuario('$patron','$nombre','$clave','$cargo','$rut')");
	    if($cargo == "Operario")
	    {
	        echo "<script>alert('Datos ingresados correctamente')</script>";
    	    ini_set( 'display_errors', 1 );
            error_reporting( E_ALL );
            $from = "sysdideco@systemchile.com";
            $to = $rut;
            $asunto = "Bienvenido Operario - Registro de Org. Comunitarias";
            $message = "Estimado Usuario: <br>\n".
              "Hola, bienvenido al sistema de organizaciones comunitarias, <br>\n".
              "tu usuario y contraseña se describira a continuación <br>\n". 
              "<br>\n".
              "NOMBRE: $nombre<br>\n".
              "CLAVE: $clave<br>\n".
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
	    elseif($cargo == "Administrador"){
	        echo "<script>alert('Datos ingresados correctamente')</script>";
    	    ini_set( 'display_errors', 1 );
            error_reporting( E_ALL );
            $from = "sysdideco@systemchile.com";
            $to = $rut;
            $asunto = "Bienvenido Administrador - Registro de Org. Comunitarias";
            $message = "Estimado Usuario: <br>\n".
              "Hola, bienvenido al sistema de organizaciones comunitarias, <br>\n".
              "tu usuario y contraseña se describira a continuacion <br>\n". 
              "<br>\n".
              "NOMBRE: $nombre<br>\n".
              "CLAVE: $clave<br>\n".
              "<br>\n".
              "Recuerda, para acceder dirigete a nuestro sitio web muniperalillo.cl, pestaña Tramites y luego Sistema<br>\n".
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
	         echo "<script language=Javascript> location.href=\"registro.php\"; </script>"; 
}
?>
<?php 
header( "Content-Type: text/html;charset=utf-8" );
$conexion = mysqli_connect("localhost","cre37351_root","lacomunagana","cre37351_deptosocial") or die ("Error");
 mysqli_set_charset($conexion,"utf8");
    if(isset($_GET["eliminar"])){
        $recuperacion_id = $_GET["eliminar"];
	    $ejecutar = mysqli_query($conexion, "Call Borrar_Usuario ('".$recuperacion_id."')");
        if($ejecutar){
		echo "<script>alert('Datos eliminado correctamente')</script>"; 
        }
     echo "<script language=Javascript> location.href=\"registro.php\"; </script>"; 
    }
?>
<?php 
header( "Content-Type: text/html;charset=utf-8" );
$conexion = mysqli_connect("localhost","cre37351_root","lacomunagana","cre37351_deptosocial") or die ("Error");
 mysqli_set_charset($conexion,"utf8");
    if(isset($_POST["elres"])){
	    foreach ($_POST['marca_eliminacion'] as $marcador){
            $ejecutar = mysqli_query($conexion, "Call Borrar_Usuario ('".$marcador."')");
        }
        if($ejecutar){
		echo "<script>alert('Datos eliminado correctamente')</script>"; 
        }
     echo "<script language=Javascript> location.href=\"registro.php\"; </script>"; 
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