<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
 <meta name="mobile-web-app-capable" content="yes"> 
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
    function vent_registro_organizaciones(){
    window.location.href='./registro/registro.php'
    }   
</script>
<script src="./Imagenes/jquery-1.9.1.min.js"></script>
<script>
$(document).ready(function() {
    $("#m").html('');
});

function buscar() {
    var men = document.getElementById('ti1');
    men.value="Buscando Datos...";
	var textoBusqueda = $("input#sol").val();
	if (textoBusqueda != "") {
		$.post("buscar_sol.php", {valorBusqueda: textoBusqueda}, 		
		function(mensaje) {
			$("#m").html(mensaje);
        	men.style.visibility = 'hidden';
		}); 
	} 
	else 
	{ 
		$("#m").html('');
    };
};

function verificar(){
    if(document.getElementById("sol").value==0){
        $("#m").html('');
        var men = document.getElementById('ti1');
        men.style.visibility = 'visible';
    }
}
function cerrar(){
    var isChecked = document.getElementById("check").checked;
    if(isChecked){
        document.getElementById("check").checked = false;
    }
}
</script>
<style type="text/css">
@import url("menu.css");
</style>
<link href="menu.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<!-- <img class="dis" src="Imagenes/logo.jpg" width="318" height="160"> -->
<title>Registro y Solicitud Organizaciones Comunitarias - Municipalidad de Peralillo </title>
<body oncopy="return false" onpaste="return false" oncontextmenu="return false">
<img src="Imagenes/fondo_menu.jpg" id="fondo"/>
<script src="funci.js"> </script>
<p></p>

<?php
header( "Content-Type: text/html;charset=utf-8" );
SESSION_START();
$nom=$_SESSION['usuarios'];
$cla=$_SESSION['claves'];
$identificador=$_SESSION['i'];
if($nom == "" && $cla == "" && $identificador == ""){
SESSION_START();
SESSION_UNSET();
SESSION_DESTROY();
header("Location:login.php");
}
else{
    if ($identificador=="Operario"){
    }else{
        SESSION_START();
		SESSION_UNSET();
		SESSION_DESTROY();
        header("Location:login.php");
    }
}
?>
<div class="form1">
<aside class="cuadrado">
<p class= "titulo2"> Menu</p>
</aside>
<form id="form" class="form" name="form" method="POST">
<input type="submit" onclick="" id="gu" class="g" name="gu" value="Registro Organizaciones Comunitarias">

<input type="submit" onclick="" id="h" class="g" name="h" value="Historial Organizaciones Comunitarias">

<input type="submit" onclick="" id="s" class="g" name="s" value="Solicitudes Comunitarias">

<input type="submit" onclick="" id="hs" class="g" name="hs" value="Historial Solicitudes">

<input type="submit" onclick="" id="sa" class="g" name="sa" value="Solicitudes Comunitarias (ANTERIORES)">

<input type="submit" onclick="" id="hsa" class="g" name="hsa" value="Historial Solicitudes (ANTERIORES)">


<?php
	if(isset($_POST["gu"])){
		$_SESSION['usua']=$nom;
		$_SESSION['cla']=$cla;
		$_SESSION['is']=$identificador;
		header("Location:./registro/registro.php");
	}
	if(isset($_POST["h"])){
		$_SESSION['usua']=$nom;
		$_SESSION['cla']=$cla;
		$_SESSION['is1']=$identificador;
		header("Location:./historial_registro_org_operario/historial_org.php");
	}
	if(isset($_POST["s"])){
		$_SESSION['usua']=$nom;
		$_SESSION['cla']=$cla;
		$_SESSION['is2']=$identificador;
		header("Location:./solicitud/registro_solicitud.php");
	}
	if(isset($_POST["hs"])){
		$_SESSION['usua']=$nom;
		$_SESSION['cla']=$cla;
		$_SESSION['is3']=$identificador;
		header("Location:./historial_solicitudes_operario/historial_sol.php");
	}
	if(isset($_POST["sa"])){
		$_SESSION['usua']=$nom;
		$_SESSION['cla']=$cla;
		$_SESSION['is4']=$identificador;
		header("Location:./solicitud_anterior/registro_solicitud.php");
	}
	if(isset($_POST["hsa"])){
		$_SESSION['usua']=$nom;
		$_SESSION['cla']=$cla;
		$_SESSION['is5']=$identificador;
		header("Location:./historial_solicitudes_anterior_operario/historial_sol.php");
	}
    if(isset($_POST["ce"])){
		SESSION_START();
		SESSION_UNSET();
		SESSION_DESTROY();
		/*date_default_timezone_set('America/Santiago');
        	$horatermino=strftime("%H:%M:%S", time());
        	$fechatermino=strftime("%Y-%m-%d", time()); 
		include('./registro/functions.php');
		ejecutarSQLCommand("Call Cerrar_Sesion('".$horatermino."','".$fechatermino."','".base64_decode($nom)."','".base64_decode($identificador)."')");*/
		header("Location:login.php");
	}
?>
</p>
<p>
<input type="submit" onclick="" id="ce" class="ce" name="ce" value="Cerrar Sesión">
<div class="container">
  <!-- Trigger the modal with a button -->
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Alerta de Solicitud</h4>
        </div>
        <div id="modal-body" class="modal-body">
            <div class ="div_solicitudes">
                 <p>    
                 <?php 
                    $conexion = mysqli_connect("localhost","cre37351_root","lacomunagana","cre37351_deptosocial") or die ("Error");
                    mysqli_set_charset($conexion,"utf8");
                    $consulta = "Call Buscar_LimiteFecha";
                    $ejecutar = mysqli_query($conexion,$consulta);
                    $i = 0;
                	while ($row = mysqli_fetch_array($ejecutar)) 
                	{
                        $a1 = $row[0];
                        $b2 = $row[1];
            	        $i++;
            	        $valor ="";
            	        date_default_timezone_set('America/Santiago');
            		    $fechainicio=strftime("%Y-%m-%d", time());
                        $date1 = new DateTime($fechainicio);
                        $date2 = new DateTime($b2);
                        $diff = $date1->diff($date2);
                        if($diff->days <= "5"){
                        	if($diff->days == "0"){
                        		echo $a1 . ' - Tiempo Limite Expirado';
                        	}
                        	else{
                        	    echo $a1 . ' - ALERTA QUEDA/N '.$diff->days . ' Dia/s ';
                        	}
                        }else{
                            echo $a1 .' - Quedan '. $diff->days . ' Dias '/*."<a class='eliminar_usuario' href='historial_sol.php?dato='$a1'>Ver Solicitud</a>*/;
                        }
                        echo '<p> </p>';
                	}
                	if ($a1 == "" || $b2 == ""){
                	    echo 'No hay solicitudes pendientes';
                	}
                ?>
             </p>    
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
</form>
<img class="dis" src="./Imagenes/logomuni.png" alt="">
</div>
<p class="titulo75">MUNICIPALIDAD DE PERALILLO</p>
<p class="copy">Copyright © 2019 | Diseñado por N.A.B para Muniperalillo</p>
<script>
    $("#myModal").modal();
</script>
<input type="checkbox" class="checkbox" id="check">
    <label class="menu" for="check">|||</label>
    <div class="left-panel" id="left_panel">
        <p class="titulos_chicos" id="ti1">Buscar Solicitudes</p>
            <input type="text" class="sol" id="sol" name="sol" style="text-align:center" placeholder="Ingrese Solicitud a Buscar..." maxlength="75" size="30" autocomplete="off" onkeyup="verificar();"/>
            <input type="submit" class="buscar" name="buscar" value="Buscar" onclick="buscar();" /> <input type="submit" class="volver" name="volver" value="Cerrar Panel" onclick="cerrar();"/>
             <aside class="solicitudes_comunitarias" id="solicitudes_comunitarias">
                 <aside id="m"></aside>
        </aside>
</div>
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
    <div class="div_info_oculto" id="texto22">
    <iframe class="traeayuda" src="ayuda/menu.html"></iframe>
    </div>
    <div class="div_info_oculto" id="texto3">
    <iframe class="traeayuda2" src="ayuda/registro_organizaciones_com.html"></iframe>
    </div>
     <div class="div_info_oculto" id="texto4">
    <iframe class="traeayuda2" src="ayuda/historial_org.html"></iframe>
    </div>
     <div class="div_info_oculto" id="texto5">
    <iframe class="traeayuda" src="ayuda/solicitud_com.html"></iframe>
    </div>
     <div class="div_info_oculto" id="texto6">
    <iframe class="traeayuda2" src="ayuda/historial_sol.html"></iframe>
    </div>
     <div class="div_info_oculto" id="texto7">
    <iframe class="traeayuda2" src="ayuda/solicitud_com_anterior.html"></iframe>
    </div>
     <div class="div_info_oculto" id="texto8">
    <iframe class="traeayuda2" src="ayuda/historial_solicitud_anterior.html"></iframe>
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
                    <a class="item2" onclick="Mostrar2('2');"><img class="icono" src="./Imagenes/icono_ayuda.png" alt=""></img><span class="letras">Menu</span></a>
				</li>
				<li>
                    <a class="item3" onclick="Mostrar3('3');"><img class="icono" src="./Imagenes/icono_ayuda.png" alt=""></img><span class="letras">Registros Organizaciones Com.</span></a>
				</li>
				<li>
                    <a class="item4" onclick="Mostrar4('4');"><img class="icono" src="./Imagenes/icono_ayuda.png" alt=""></img><span class="letras">Historial Organizaciones Com.</span></a>
				</li>
				<li>
                    <a class="item5" onclick="Mostrar5('5');"><img class="icono" src="./Imagenes/icono_ayuda.png" alt=""></img><span class="letras">Solicitudes Comunitarias</span></a>
				</li>
				<li>
                    <a class="item6" onclick="Mostrar6('6');"><img class="icono" src="./Imagenes/icono_ayuda.png" alt=""></img><span class="letras">Historial Solicitudes Com.</span></a>
				</li>
				<li>
                    <a class="item7" onclick="Mostrar7('7');"><img class="icono2" src="./Imagenes/icono_ayuda.png" alt=""></img><span class="letras">Solicitudes Com. (ANTERIORES)</span></a>
				</li>
				<li>
                    <a class="item8" onclick="Mostrar8('8');"><img class="icono3" src="./Imagenes/icono_ayuda.png" alt=""></img><span class="letras">Historial Solicitudes Com. (ANTERIORES)</span></a>
				</li>
				<li>
                    <a class="item9" onclick="Mostrar9('9');"><img class="icono" src="./Imagenes/icono_ayuda.png" alt=""></img><span class="letras">Modos de Trabajo</span></a>
				</li>
			</ul>
   <p>&nbsp;</p>
</aside>
</div>
<button type="button" src="Imagenes/help_negro.png" id="ayuda" class="ayuda" onclick="Mostrar_Ocultar();"><span class="tooltipayuda"></span></button>
</body>
</head>
</html>
