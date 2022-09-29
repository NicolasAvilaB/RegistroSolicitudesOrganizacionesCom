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
	$consulta = mysqli_query($conexion, "Call Consulta_Solicitud('".$consultaBusqueda."%')");
    mysqli_set_charset($consulta,"utf8");
	//Obtiene la cantidad de filas que hay en la consulta
	$filas = mysqli_num_rows($consulta);
    if ($consultaBusqueda === 0){
        $mensaje = "<p class='titulos_chicos'>No se han encontrado solicitudes</p>";
    }
	//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
	if ($filas === 0) {
		$mensaje = "<p class='titulos_chicos'>No se han encontrado solicitudes</p>";

	} else {
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		//echo 'Resultados para <strong>'.$consultaBusqueda.'</strong>';

		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
		while($resultados = mysqli_fetch_array($consulta)) {
		    $fecha = $resultados[0];
		    $nombre = $resultados[1];
		    $direccion = $resultados[2];
		    $sector = $resultados[3];
		    $descripcion = $resultados[4];
		    $tiposolicitud = $resultados[5];
		    $latitud = $resultados[6];
		    $longitud = $resultados[7];
		    $estado = $resultados[8];
		    $fechadesde = $resultados[9];
		    $fechahasta = $resultados[10];
		    $observacion = $resultados[11];
            $mensaje .= '<div class="tarjetas">&nbsp;<p class="titulos_chicos">Fecha Ingreso: '.$fecha.'<p class="titulos_chicos">Organización: '.$nombre.' <p class="titulos_chicos"> Direccion: '.$direccion.' <p class="titulos_chicos">Sector: '.$sector.' <p class="titulos_chicos">Descripcion: '.$descripcion.' <p class="titulos_chicos">Tipo Solicitud: '.$tiposolicitud.' <p class="titulos_chicos">Latitud: '.$latitud.' <p class="titulos_chicos">Longitud: '.$longitud.' <p class="titulos_chicos">Estado: '.$estado.' <p class="titulos_chicos">Fecha Desde: '.$fechadesde.' <p class="titulos_chicos">Fecha Hasta: '.$fechahasta.' <p class="titulos_chicos">Observación: '.$observacion.' <p></p> </p>&nbsp;</div><br></br>';
		}//Fin while $resultados
	}; //Fin else $filas
};//Fin isset $consultaBusqueda
//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>
