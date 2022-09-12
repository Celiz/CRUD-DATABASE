<?php
   $mysql=new mysqli($host,$user,$password,$database);
	if ($mysql->connect_error)
	  die("Problemas con la conexion a la base de datos");

    $foto = $_FILES['foto_vivienda']['name'];
    $foto_temporal = $_FILES['foto_vivienda']['tmp_name'];
    $destino = "image/".$foto;
    move_uploaded_file($foto_temporal,$destino . $foto);
    copy($foto_temporal,$destino);
  
    $mysql->query("insert into viviendas (tipo_vivienda, zona_vivienda, direccion_vivieda, ndormitorios_vivienda, precio_vivienda, tamano_vivienda, extras_vivienda, foto_vivienda, observaciones_vivienda)
        values ('$_REQUEST[tipo_vivienda]', '$_REQUEST[zona_vivienda]', '$_REQUEST[direccion_vivieda]', '$_REQUEST[ndormitorios_vivienda]', '$_REQUEST[precio_vivienda]', '$_REQUEST[tamano_vivienda]', '$_REQUEST[extras_vivienda]', '$destino', '$_REQUEST[observaciones_vivienda]')") 
        or
        die($mysql->error);

    $mysql->close();

    header('Location:index.php');    
?>  