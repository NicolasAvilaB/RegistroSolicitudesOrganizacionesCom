<?php
header("Content-Type: application/json; charset=UTF-8");
header("Content-Type: text/html;charset=utf-8");
include('registro/functions.php'); 
if ($resultset = getSQLResultSet("Call MostrarAdmin")) {
    	while ($row = $resultset->fetch_array(MYSQLI_NUM)) {
    	//utf8_decode($row);
    	echo json_encode($row, JSON_UNESCAPED_UNICODE);
      // var_dump($row);
    	}	
   }
?>
