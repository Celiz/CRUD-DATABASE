<?php

//show the image from the database 
 $mysql =new mysqli($HOST,$USER,$PASSWORD,$DATABASE);
if ($mysql->connect_error)
  die("Problemas con la conexion a la base de datos");
    
$result = $mysql->query("select foto_vivienda from viviendas where id_vivienda='$_REQUEST[id_vivienda]'") or
    die($mysql->error);
$row = $result->fetch_array();
$image = $row['foto_vivienda'];

header("Content-type: image/jpeg");
echo $image;
$mysql->close();    
?>
