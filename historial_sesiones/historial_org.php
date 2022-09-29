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
<script src="func_admin.js"> </script>
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
    if($("#check").prop('checked') ) {
        $("#boton_exportacion").fadeIn("fast");
        $("#boton_exportacion").animate({left: '27px'});
    }
    else{
        $("#boton_exportacion").fadeOut("fast");
        $("#boton_exportacion").animate({left: '-52px'});
    }
});
});
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1"/> 
<style type="text/css">
@import url("historial_org.css");
</style>
<link href="historial_org.css" rel="stylesheet" type="text/css">
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
$lñ= $_SESSION['t9'];
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
    </div>
<img class="dis" src="../Imagenes/logomuni.png">
<p class="titulo75">MUNICIPALIDAD DE PERALILLO</p>
<p class="copy">Copyright © 2019 | Diseñado por N.A.B para Muniperalillo</p>
<ul class="nav nav-pills nav-stacked">
   <ul class="dropdown">
 <li><a class="active" onclick="location.href = '#home'">Historial Inicio Sesión</a></li>
 <li class="dropdown-content">
    <a onclick="location.href = '../mant_repersonal/registro.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['t']=$lñ;?>'">Mantenedor Registro Personal</a>
    
    <a onclick="location.href = '../mant_sectores/sectores.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['t1']=$lñ;?>'">Mantenedor Sectores</a>
    
    <a onclick="location.href = '../mant_tiporganizacion/organizacion.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['t2']=$lñ;?>'">Mantenedor Tipos Organizaciones</a>
    
    <a onclick="location.href = '../registro_admin/registro.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['t5']=$lñ;?>'">Registro Organizaciones Comunitarias</a>
    
    <a onclick="location.href = '../historial_registro_org/historial_org.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['t3']=$lñ;?>'">Historial Organizaciones Comunitarias</a>
    
    <a onclick="location.href = '../solicitud_admin/registro_solicitud.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['t6']=$lñ;?>'">Solicitudes Comunitarias</a>
    
    <a onclick="location.href = '../historial_solicitudes/historial_sol.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['t4']=$lñ;?>'">Historial Solicitudes</a>
    
    <a onclick="location.href = '../solicitud_admin_anterior/registro_solicitud.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['t7']=$lñ;?>'">Solicitudes Comunitarias Anteriores</a>
        
    <a onclick="location.href = '../historial_solicitudes_anterior/historial_sol.php<?php SESSION_START(); $_SESSION['usua']=$n; $_SESSION['cla']=$c; $_SESSION['t8']=$lñ;?>'">Historial Solicitudes Anteriores</a>
  </li>
  </ul>
  <li><a onclick="location.href = '../menu_admin.php'">Volver al Menu</a></li>
</ul>
</div>
<section>
    <p class= "titulo2" align="center">Historial Inicio Sesión</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div class="tablascroll">
<table class="tabla" border="2" style="background-color: #F9F9F9;">
    <thead>
    <tr>
        <th>Usuario</th>
        <th>Hora Inicio Sesión</th>
        <th>Fecha Inicio Sesión</th>
    </tr>
    </thead>
     <?php
     header("Content-Type: text/html;charset=utf-8");
     if(isset($_POST["buscar"])){
     $dato = $_POST['bus'];
     
        $conexion = mysqli_connect("localhost","cre37351_root","lacomunagana","cre37351_deptosocial") or die ("Error");
        mysqli_set_charset($conexion,"utf8");
        $consulta = "Call Buscar_Inicio_Sesion('".$dato."%')";
        $ejecutar = mysqli_query($conexion,$consulta);
        $i = 0;
    	while ($row = mysqli_fetch_array($ejecutar)) 
    	{
            $c1 = $row[0];
            $c2 = $row[1];
    	    $c3 = $row[2];
    	    $c4 = $row[3];
	        $i++;
       ?>
       <tr class="objetos">
            <td><?php echo $c2; ?></td>
            <td><?php echo $c3; ?></td>
            <td><?php echo $c4; ?></td>
       </tr>
   <?php } }?>
</table>
</div>

<form action="historial_org.php" method="POST">
<input type="text" class="bus" id="bus" name="bus" style="text-align:center" placeholder="Ingrese Dato a Buscar..." size="30" autocomplete="off"/> <input type="submit" class="buscar" name="buscar" value="Buscar"/> </p>
</form>
</p>
<p>
<?php
header( "Content-Type: text/html;charset=utf-8" );
$conexion = mysqli_connect("localhost","cre37351_root","lacomunagana","cre37351_deptosocial") or die ("Error");
 mysqli_set_charset($conexion,"utf8");
    if($_POST["elr"]){
        foreach ($_POST['marca_eliminacion'] as $marcador){
            $ejecutar2 = mysqli_query($conexion, "Call Borrar_Sesion('".$marcador."')");
        }
        echo "<script>alert('Datos eliminado correctamente')</script>";
         echo "<script language=Javascript> location.href=\"historial_org.php\"; </script>"; 
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
	fileName: "Historial Sesion",    //Nombre del archivo 
});
</script>
</head>
</html>