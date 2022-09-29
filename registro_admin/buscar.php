<?php
//Archivo de conexión a la base de datos
header("Content-Type: text/html;charset=utf-8");
//Variable de búsqueda
$consultaBusqueda = $_POST['valorBusqueda'];

//Filtro anti-XSS
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);

//Variable vacía (para evitar los E_NOTICE)
$mensaje = "";


//Comprueba si $consultaBusqueda está seteado
if (isset($consultaBusqueda)) {

	//Selecciona todo de la tabla mmv001 
	//donde el nombre sea igual a $consultaBusqueda, 
	//o el apellido sea igual a $consultaBusqueda, 
	//o $consultaBusqueda sea igual a nombre + (espacio) + apellido
$conexion = mysqli_connect('localhost','cre37351_root','lacomunagana','cre37351_deptosocial');
mysqli_set_charset($conexion,"utf8");
	$consulta = mysqli_query($conexion, "Call Consulta_Rut('$consultaBusqueda')");
	mysqli_set_charset($consulta,"utf8");

	//Obtiene la cantidad de filas que hay en la consulta
	$filas = mysqli_num_rows($consulta);
    if ($consultaBusqueda === 0){
        $mensaje = "<p></p>";
    }
	//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
	if ($filas === 0) {
		$mensaje = "<p><img src='../Imagenes/verde.png' width='42' height='42'>
					
</p>";

	} else {
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		//echo 'Resultados para <strong>'.$consultaBusqueda.'</strong>';

		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
		while($resultados = mysqli_fetch_array($consulta)) {
			$nombre = $resultados[0];
			//Output
			

		};//Fin while $resultados
        $mensaje .= '
			<p>
			<img src="../Imagenes/rojo.png" width="42" height="42">
			<script> rut.setCustomValidity("Rut ya se encuentra registrado");</script>
			</p>';
	}; //Fin else $filas

};//Fin isset $consultaBusqueda

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;

?>
