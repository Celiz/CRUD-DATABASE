<?php
     $mysql =new mysqli($HOST,$USER,$PASSWORD,$DATABASE);
	if ($mysql->connect_error)
	  die("Problemas con la conexion a la base de datos");

    $mysql->query("delete from viviendas where id_vivienda='$_REQUEST[id_vivienda]'") or
        die($mysql->error);

    $mysql->close();

    header('Location:index.php');

?>

