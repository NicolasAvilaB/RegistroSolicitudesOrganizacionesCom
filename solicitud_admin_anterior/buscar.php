<?php
header("Content-Type: text/html;charset=utf-8");
$consultaBusqueda = $_POST['valorBusqueda'];
//Filtro anti-XSS
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);
$mensaje = "";
if (isset($consultaBusqueda)) {

$conexion = mysqli_connect('localhost','cre37351_root','lacomunagana','cre37351_deptosocial');
    mysqli_set_charset($conexion,"utf8");
	$consulta = mysqli_query($conexion, "Call Consulta_Sector('".$consultaBusqueda."')");
	    mysqli_set_charset($consulta,"utf8");
	$filas = mysqli_num_rows($consulta);
    if ($consultaBusqueda === 0){
        $mensaje = "";
    }
	if ($filas === 0) {
		$mensaje = "";
	} else {
		while($resultados = mysqli_fetch_array($consulta)) {
			$nombre = $resultados[0];
			//Output
		};
        $mensaje .= '<p class="tisec">Sector: <input type="text" class="sector" id="sector" name="sector" style="text-align:center" placeholder="Sector Localizado..." size="30" maxlength="100" autocomplete="off" value="'.$nombre.'" readonly="readonly"/> </p>';
	};

};
echo $mensaje;

?>
