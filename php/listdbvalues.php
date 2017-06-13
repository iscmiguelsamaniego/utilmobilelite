<?php

// Includs database connection
include "db_connection.php";

// Makes query with rowid
$query = "SELECT * FROM GeoPuntosPoligono";

// Run the query and set query result in $result
// Here $db comes from "db_connection.php"
$result = $db->query($query);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Data List</title>
</head>
<body>

<?php

//$array = array();

while($row = $result->fetchArray()){
$values = array(
//'type' => 'Feature',
//'geometry' => array( 
//'type' => 'Polygon',
//'coordinates' => array(array(array(
$row['latitud'], $row['longitud']);

echo json_encode($values);
}

//echo json_encode($array);

?>


</body>
</html>

<!--
TAREAS PENDIENTES

1.- Obtener el ultimo id de poligonos
2.- Obtener latitudes y longitudes de la tabla GeoPuntosPoligono y vaciarlas en un geojson
3.- Manejar el archivo geojson y editarlo para sacar uno nuevo con los valores actualizados en latitud y longitud
4.- Escribir los nuevos valores en bd 
5.- Exportar la bd

INSTALL MAMP 
https://www.mamp.info/en/

CRUD PHP
http://www.w3programmers.com/simple-crud-php-sqlite-database/

OUTPUT JSON
https://gist.github.com/wboykinm/5730504

JAVASCRIPT MAP SHAPER
https://github.com/mbloch/mapshaper?files=1


DUMP SQLITE DATABASE
https://stackoverflow.com/questions/22197690/sqlite3-dump-database-through-php


REFERENCIAS AJAX MEJORAR INTERACCION Y DISEÑO
https://www.formget.com/submit-form-using-ajax-php-and-jquery/
http://phppot.com/jquery/php-contact-form-with-jquery-ajax/

-->
