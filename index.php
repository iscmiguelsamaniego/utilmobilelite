<html>
    <head>
    </head>

    <body>

        <h1 align="center"> Utilerias para BD moviles</h1>

        <table  align="center">
            <tr>
                <th><h3 align="right">- Version Beta 1.0 -</h3></th>
                <td><img src="images/alphalogo.png" alt="Alpha logo" style="width:130px;height:40px;" align="left" hspace="50"></td>
            </tr>
        </table>
      <br/>
	  
	  <?php 
	  $database_name = "uploads/pesca_db.sqlite";
	  $db = new SQLite3($database_name);

      $querypolygons = "SELECT * FROM Poligonos";
      $resultpolygons = $db->query($querypolygons);

      $file = 'temps/generatedfile.GeoJson';

if(file_exists($file)){
 unlink($file);
}
	  ?>
   <table  align="center">
           <!--<form method="post" action="php/upload.php" enctype="multipart/form-data">
                <tr>
                    <th><input type="file" name="pesca_db" id="pesca_db" accept=".sqlite"></th>                    											
					<td><input type="submit" value="Cargar BD"  name="submit"></td>
                </tr>
                
                </form>-->
				<?php 
				echo '<tr><th><form action="#" method="post">';
echo 'Seleccionar Poligono : <select name="polygonselect">';
while($rowpolygon = $resultpolygons->fetchArray()){
  echo "<option value=\"{$rowpolygon['id']}\">";
        echo $rowpolygon['id'];
        echo "</option>";
}
echo '</select><br/><br/>';
echo '<input type="submit" name="submit" value="Generar Archivo" /><br/><br/></th></tr>';

$option = isset($_POST['polygonselect']) ? $_POST['polygonselect'] : false;
if($option){
	$selected_val = $_POST['polygonselect']; 
	
	$query = "SELECT * FROM GeoPuntosPoligono where id_poligono = ".$selected_val."";
	$result = $db->query($query);

	$listvalues = array();	
	while($row = $result->fetchArray()){
		$listvalues[] = array($row['latitud'], $row['longitud']);
	}
	
	$values = array(
	'type' => 'Feature',
	'geometry' => array(
	'type' => 'Polygon',
	'coordinates' => array($listvalues)));

	//$var = var_export(json_encode($values), true);
	file_put_contents('temps/generatedfile.GeoJson', json_encode($values));
	
	echo '<tr><th><a href="temps/generatedfile.GeoJson" download="Poligono'.$selected_val.'.json">Descargar Archivo</a></th></tr>';	
	
}else{
echo '<tr><th>Debes seleccionar un poligono a consultar</th></tr>';
}

//echo '<tr><th></th></tr>';
$jsonfile = file_get_contents('uploads/Poligonox.json');
$json_data = json_decode($jsonfile, true);

//S$items = array();


foreach ($json_data['geometries'] as $gvalues) {
foreach ($gvalues['coordinates'] as $coordinates){	 		  
	  while($jvalue = $coordinates){
		  echo "{$coordinates[0][0]}"." , "."{$coordinates[0][1]}";
	  }
/*
while($rowpolygon = $resultpolygons->fetchArray()){
  echo "<option value=\"{$rowpolygon['id']}\">";
        echo $rowpolygon['id'];
        echo "</option>";
}
*/
	  //echo "{$coordinates[0][0]}"." , "."{$coordinates[0][1]}";
  }
}
//print_r($items);

				?>      
         
				
<!--
TAREAS PENDIENTES

1.- Obtener el ultimo id de poligonos
2.- Obtener latitudes y longitudes de la tabla GeoPuntosPoligono y vaciarlas en un geojson
3.- Manejar el archivo geojson y editarlo para sacar uno nuevo con los valores actualizados en latitud y longitud
4.- Escribir los nuevos valores en bd 
5.- Exportar la bd

CRUD PHP
http://www.w3programmers.com/simple-crud-php-sqlite-database/

JAVASCRIPT MAP SHAPER
https://github.com/mbloch/mapshaper?files=1

DUMP SQLITE DATABASE
https://stackoverflow.com/questions/22197690/sqlite3-dump-database-through-php


REFERENCIAS AJAX MEJORAR INTERACCION Y DISEÑO
https://www.formget.com/submit-form-using-ajax-php-and-jquery/
http://phppot.com/jquery/php-contact-form-with-jquery-ajax/

-->
            
</table>

    </body>
</html
