<!doctype html>
<html>
<head>
  <title>Listado de articulos</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Mulish:wght@300&display=swap');

   body{
    font-family: 'Mulish', sans-serif;
   } 
  .tablalistado {
    
    border-collapse: collapse;
    box-shadow: 0px 0px 8px #000;
    margin:20px;
  }
  .tablalistado th{  
    border: 1px solid #000;
    padding: 5px;
    background-color:#ffd040;	  
  }  
  .tablalistado td{  
    border: 1px solid #000;
    padding: 5px;
    background-color:#ffdd73;	  
  }
  </style>
</head>  
<body>
  
  <?php
	$mysql=new mysqli("localhost","457327","lunaylaky2017","457327");
	if ($mysql->connect_error)
	  die("Problemas con la conexion a la base de datos");
  
    $registros=$mysql->query("select * from viviendas") or

      die($mysql->error);
	 
    echo '<table class="tablalistado">';
    echo '<tr><th>ID vivienda</th><th>Tipo vivienda</th><th>Zona vivienda</th><th>Direccion vivienda</th><th>Dormitorios</th><th>Precio</th><th>Tamaño</th><th>Extras</th><th>Foto</th><th>Observaciones</th><th></th><th></th></tr>';
    while ($reg=$registros->fetch_array())
    {
      echo '<tr>';
      echo '<td>';
      echo $reg['id_vivienda'];
      echo '</td>';	  
      echo '<td>';
      echo $reg['tipo_vivienda'];	  
      echo '</td>';	  
      echo '<td>';
      echo $reg['zona_vivienda'];	  
      echo '</td>';	  
      echo '<td>';
      echo $reg['direccion_vivieda'];	  
      echo '</td>';
      echo '<td>';
      echo $reg['ndormitorios_vivienda'];
      echo '</td>';
      echo '<td>';
      echo $reg['precio_vivienda'];
      echo '</td>';
      echo '<td>';
      echo $reg['tamano_vivienda'];
      echo '</td>';
      echo '<td>';
      echo $reg['extras_vivienda'];
      echo '</td>';
      echo '<td>';
      //show the image in another tab
      echo '<a href="foto.php?id_vivienda='.$reg['id_vivienda'].'" target="_blank">Ver foto</a>';
      echo '</td>';
      echo '<td>';
      echo $reg['observaciones_vivienda'];
      echo '</td>';
      echo '<td>';
      echo '<a href="delete.php?id_vivienda='.$reg['id_vivienda'].'">Borra?</a>';
      echo '</td>';
      echo '<td>';
      echo '<a href="mod1.php?id_vivienda='.$reg['id_vivienda'].'">Modifica?</a>';
      echo '</td>';      
      echo '</tr>';	  
    }	
    echo '<tr><td colspan="12">';
    echo '<a href="add1.php">Agrega un nuevo articulo?</a>';
    echo '</td></tr>';
    echo '<table>';
	
    $mysql->close();

    
	
  
  ?>  
</body>
</html>