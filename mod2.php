<?php
  $mysql=new mysqli($host,$user,$password,$database);
	if ($mysql->connect_error)
	  die("Problemas con la conexion a la base de datos");


    $foto = $_FILES['foto_vivienda']['name'];
    $foto_temporal = $_FILES['foto_vivienda']['tmp_name'];
    $destino = "image/".$foto;
    copy($foto_temporal,$destino);

    //update image in the database
    $mysql->query("update viviendas set foto_vivienda='$destino' where id_vivienda=$_REQUEST[id_vivienda]") or
      die($mysql->error);


    $mysql->query("update viviendas set 
    tipo_vivienda='$_REQUEST[tipo_vivienda]',
    zona_vivienda='$_REQUEST[zona_vivienda]',
    direccion_vivieda='$_REQUEST[direccion_vivieda]',
    ndormitorios_vivienda='$_REQUEST[ndormitorios_vivienda]',
    precio_vivienda='$_REQUEST[precio_vivienda]',
    tamano_vivienda='$_REQUEST[tamano_vivienda]',
    extras_vivienda='$_REQUEST[extras_vivienda]',
    foto_vivienda='$destino',
    observaciones_vivienda='$_REQUEST[observaciones_vivienda]'
    where id_vivienda='$_REQUEST[id_vivienda]'") or

    die($mysql->error());

    $mysql->close();

    header('Location:index.php');
  ?>  
