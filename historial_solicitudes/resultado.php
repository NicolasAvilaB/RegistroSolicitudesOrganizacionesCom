<?php
$conn = mysqli_connect("localhost", "cre37351_root", "lacomunagana", "cre37351_deptosocial");

function parseToXML($htmlStr){
	$xmlStr=str_replace('<','&lt;',$htmlStr);
	$xmlStr=str_replace('>','&gt;',$xmlStr);
	$xmlStr=str_replace('"','&quot;',$xmlStr);
	$xmlStr=str_replace("'",'&#39;',$xmlStr);
	$xmlStr=str_replace("&",'&amp;',$xmlStr);
	return $xmlStr;
}

// Select all the rows in the markers table
$busqueda = $_GET["valor"];
$result_markers = "Call Buscar_Solicitudes('".$busqueda."%')";
$resultado_markers = mysqli_query($conn, $result_markers);

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row_markers = mysqli_fetch_assoc($resultado_markers)){
  // Add to XML document node
  echo '<marker ';
  echo 'name="Organizacion: ' . parseToXML($row_markers['Nombre_Organizacion']) . ', Sector: ' . parseToXML($row_markers['Sector']) . ', Direccion: '. parseToXML($row_markers['Direccion']) . '" ';
  //echo 'address="' . parseToXML($row_markers['address']) . '" ';
  echo 'lat="' . $row_markers['Latitud'] . '" ';
  echo 'lng="' . $row_markers['Longitud'] . '" ';
  //echo 'type="' . $row_markers['type'] . '" ';
  echo '/>';
}

// End XML file
echo '</markers>';



