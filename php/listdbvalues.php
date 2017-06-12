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
	<div style="width: 500px; margin: 20px auto;">
		<!--<a href="insert.php">Add New</a>-->
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<tr>
				<td>Id</td>
				<td>Latitud</td>
				<td>Longitud</td>
			</tr>
			<?php while($row = $result->fetchArray()) {?>
			<tr>
				<td><?php echo $row['id'];?></td>
				<td><?php echo $row['latitud'];?></td>
                <td><?php echo $row['longitud'];?></td>
				<!--<td>
					<a href="update.php?id=//<?php echo $row['rowid'];?>">Edit</a> | 
					<a href="delete.php?id=//<?php echo $row['rowid'];?>"  confirm('Are you sure?');">Delete</a>
				</td>-->
			</tr>
			<?php } ?>
		</table>
	</div>
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


-->