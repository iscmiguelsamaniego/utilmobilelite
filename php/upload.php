<?php
$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["pesca_db"]["name"]);
$uploadOk = 1;
$databaseFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if file already exists
if (file_exists($target_file)) {
    echo "Lo siento el archivo ya existe.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["pesca_db"]["size"] > 4000000) {
    echo "Lo siento el archivo es muy grande.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<br/>Error, el archivo no pudo ser cargado.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["pesca_db"]["tmp_name"], $target_file)) {
        echo "El archivo ". basename( $_FILES["pesca_db"]["name"]). " ha sido cargado.";

include "listdbvalues.php";
        
    } else {
        echo "Lo siento hubo un error al cargar su archivo.";
    }
}
?>
