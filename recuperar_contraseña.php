<!DOCTYPE html>
<html>
<header>
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
<script src="./Imagenes/jquery-1.9.1.min.js"></script>
<script src="funci.js"> </script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1"/> 
<style type="text/css">
@import url("recup.css");
</style>
<link href="recup.css" rel="stylesheet" type="text/css">
<!-- <img class="dis" src="Imagenes/logo.jpg" width="318" height="160"> -->
<title>Registro y Solicitud Organizaciones Comunitarias - Municipalidad de Peralillo </title>
<body oncopy="return false" onpaste="return false" oncontextmenu="return false">
<img src="Imagenes/fondo_login_difuminado.jpg" id="fondo"/>
<button type="button" src="Imagenes/help_negro.png" id="ayuda" class="ayuda" onclick="Mostrar_Ocultar();"><span class="tooltipayuda"></span></button>
<p></p>
<img class="dis" src="./Imagenes/logomuni.png">
<button class="ver" id="ver" onclick="volver()">Volver</button>
<form id="form1" class="form1" name="form1" action="recuperar_contraseña.php" method="POST" onSubmit="return validar(this)">
<aside class="cuadrado">
<p></p>
<p class= "titulo2">Registro y Solicitud Organizaciones Comunitarias</p>
</aside>
<p>&nbsp;</p>
<p class= "titulo3">Nombre o Email:</p> <input type="text" class="nombre" id="nombre" name="nombre" style="text-align:center" placeholder="Ingrese Nombre de Usuario o Email..." size="30" maxlength="50" autocomplete="off" onkeypress="return valida_letras_numeros_correo(event)"  autofocus/>
<p>&nbsp;</p>
<input type="submit" onclick="" id="gu" class="g" name="gu" value="Recuperar Contraseña">
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
    	$conexion = mysqli_connect("localhost","cre37351_root","lacomunagana","cre37351_deptosocial") or die ("Error");
        mysqli_set_charset($conexion,"utf8");
        $consulta = "Call Recuperar_Usuario_Clave('".$nombre."')";
        $ejecutar = mysqli_query($conexion,$consulta);
        $i = 0;
    	while ($row = mysqli_fetch_array($ejecutar)) 
    	{
            $a = $row[0];
            $b = $row[1];
    	    $c = $row[2];
    	    $d = $row[3];
    	}
	        
			if($a == "" || $b == "" || $c == "" || $d == ""){
			    $message2 = utf8_encode("Advertencia: Usuario y/o Email no existe");
        		$mensaje3alert = utf8_decode($message2);
        		echo "<script type='text/javascript'>alert('$mensaje3alert');</script>";
			}
			else{
			     echo "<script>alert('Correo Enviado Exitosamente')</script>";
            	    ini_set( 'display_errors', 1 );
                    error_reporting( E_ALL );
                    $from = "sysdideco@systemchile.com";
                    $to = $d;
                    $asunto = "Recuperación Usuario y/o Contraseña - Registro de Org. Comunitarias";
                    $message = "Estimado Usuario: <br>\n".
                      "Se ha solicitado una recuperacion de usuario y contraseña de Registro Organizaciones Comunitarias, <br>\n".
                      "tu usuario y/o contraseña se describira a continuacion <br>\n". 
                      "<br>\n".
                      "NOMBRE: $a <br>\n".
                      "CLAVE: $b <br>\n".
                      "CARGO: $c <br>\n".
                      "EMAIL: $d <br>\n".

                      "<br>\n".
                      "Recuerda, para acceder dirigete a nuestro sitio web muniperalillo.cl, pestaña Tramites y luego Sistema<br>\n".
                      "<br>\n".
                      "Atte:<br>\n".
                      "Departamento Social <br>\n".
                      "Ilustre Municipalidad de Peralillo<br>\n".
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
			    echo "<script language=Javascript> location.href=\"login.php\"; </script>"; 
		}
	
?>
<p class="titulo75">MUNICIPALIDAD DE PERALILLO</p>
<p class="copy">Copyright © 2019 | Diseñado por N.A.B para Muniperalillo</p>
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
<!--<input type="submit" class="titulocontra" id="titulocontra" name="titulocontra" value="¿Olvidaste tu Contraseña?"></input> -->
</body>
</header>
</html>
