<?php
    $mysql=new mysqli("localhost","457327","lunaylaky2017","457327");
	if ($mysql->connect_error)
	  die("Problemas con la conexion a la base de datos");

 
    $target_dir = "./image/";
    $target_file = $target_dir . basename($_FILES["foto_vivienda"]["name"]);

   if (move_uploaded_file($_FILES["foto_vivienda"]["tmp_name"], $target_dir.$_FILES['foto_vivienda']['name'])) {
   $status = 1;
   }
    
  
    $mysql->query("insert into viviendas (tipo_vivienda, zona_vivienda, direccion_vivieda, ndormitorios_vivienda, precio_vivienda, tamano_vivienda, extras_vivienda, foto_vivienda, observaciones_vivienda)
        values ('$_REQUEST[tipo_vivienda]', '$_REQUEST[zona_vivienda]', '$_REQUEST[direccion_vivieda]', '$_REQUEST[ndormitorios_vivienda]', '$_REQUEST[precio_vivienda]', '$_REQUEST[tamano_vivienda]', '$_REQUEST[extras_vivienda]', '$target_file', '$_REQUEST[observaciones_vivienda]')") 
        or
        die($mysql->error);
        
     $mysql->close();    

   header('Location:index.php');     
?>  
