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
@import url("modificar_usuario.css");
</style>
<link href="modificar_usuario.css" rel="stylesheet" type="text/css">
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
  <li><a onclick="location.href = 'registro.php'">Mantenedor Registro Personal</a></li>
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
        $ejecutar = mysqli_query($conexion, "Call Buscar_ID('".$editar_id."')");
        $fila = mysqli_fetch_array($ejecutar);
        $doctorwho = $fila[0];
    	$a = $fila[1];
    	$b = $fila[2];
    	$c = $fila[3];
    	$d = $fila[4];
    }
    
?>
    
<form id="form1" class="form1" name="form1" action="modificar_usuario.php" method="POST" onSubmit="return validar(this)">
<p class= "titulo2" align="center"> Modificar Registro Personal</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p class= "titulo3">ID: <input type="text" class="id" id="id" name="id" style="text-align:center" placeholder="Ingrese ID..." size="30"  onkeypress="return valida_letras_numeros(event)" maxlength="45" autocomplete="off" value="<?php echo $doctorwho; ?>" readonly=”readonly”/> </p>
<p class= "titulo3">Nombre: <input type="text" class="nombre" id="nombre" name="nombre" style="text-align:center" placeholder="Ingrese Nombre Usuario..." size="30"  onkeypress="return valida_letras_numeros(event)" maxlength="45" autocomplete="off" value="<?php echo $a; ?>"/> </p>

<p class= "titulo3">Clave: <input type="password" class="clave" id="clave" name="clave" style="text-align:center" placeholder="Ingrese Clave de acceso..." size="30" onkeypress="return valida_letras_numeros(event)" maxlength="90"  autocomplete="off" value="<?php echo $b; ?>"/>  </p>

<p class= "titulo3">Cargo Usuario: <select class="cargo" id="cargo" name="cargo">
    <?php
        if (strpos($c, 'Operario') !== false)
    	{
            echo '<option value="">Seleccione Cargo de Usuario...</option>
                      <option value="Administrador">Administrador</option>
                      <option value="Operario" selected>Operario</option>';
        }
        elseif(strpos($c, 'Administrador') !== false)
        {
            echo '<option value="">Seleccione Cargo de Usuario...</option>
                      <option value="Administrador" selected>Administrador</option>
                      <option value="Operario">Operario</option>';
        }
    ?>
</select> </p>

<p class= "titulo3">Email: <input type="text" class="rut" id="rut" name="rut" style="text-align:center" placeholder="Ingrese Email..." size="30" maxlength="75" autocomplete="off" pattern="^[\w._%-]+@[\w.-]+\.[a-zA-Z]{2,4}$" value="<?php echo $d; ?>"/> </p>

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
    $va = $_POST["valid"];
    $doc = $_POST["id"];
	    ejecutarSQLCommand("Call Modificar_Usuario('$nombre','$clave','$cargo','$rut','$doc')");
	    if($cargo == "Operario")
	    {
	        echo "<script>alert('Datos modificados correctamente')</script>";
    	    ini_set( 'display_errors', 1 );
            error_reporting( E_ALL );
            $from = "sysdideco@systemchile.com";
            $to = $rut;
            $asunto = "Modificación Usuario Operario - Registro de Org. Comunitarias";
            $message = "Estimado Usuario: <br>\n".
              "Se ha modificado algunos datos del sistema de organizaciones comunitarias, <br>\n".
              "los datos se describiran a continuacion <br>\n". 
              "<br>\n".
              "NOMBRE: $nombre<br>\n".
              "CLAVE: $clave<br>\n".
              "EMAIL: $rut<br>\n".
              "CARGO: $cargo<br>\n".
              "<br>\n".
              "Recuerda, para acceder dirigete a nuestro sitio web muniperalillo.cl, pestaña Tramites y luego Sistema<br>\n".
             "<br>\n".
              "--NO RESPONDER A ESTE MENSAJE AUTOMATICO--<br>\n".
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
	    elseif($cargo == "Administrador"){
	        echo "<script>alert('Datos modificados correctamente')</script>";
    	    ini_set( 'display_errors', 1 );
            error_reporting( E_ALL );
            $from = "sysdideco@systemchile.com";
            $to = $rut;
            $asunto = "Modificación Usuario Administrador - Registro de Org. Comunitarias";
            $message = "Estimado Usuario: <br>\n".
               "Se ha modificado algunos datos del sistema de organizaciones comunitarias, <br>\n".
              "los datos se describiran a continuacion <br>\n". 
              "<br>\n".
             "NOMBRE: $nombre<br>\n".
              "CLAVE: $clave<br>\n".
              "EMAIL: $rut<br>\n".
              "CARGO: $cargo<br>\n".
              "<br>\n".
              "Recuerda, para acceder dirigete a nuestro sitio web muniperalillo.cl, pestaña Tramites y luego Sistema<br>\n".
              "<br>\n".
              "Atte:<br>\n".
              "Departamento Administración Social <br>\n".
              "Ilustre Municipalidad de Peralillo";
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