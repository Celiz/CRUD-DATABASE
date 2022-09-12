<!doctype html>
<html>
<head>
  <title>Modificacion de articulo.</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Mulish:wght@300&display=swap');

   body{
    font-family: 'Mulish', sans-serif;
   }
   
   </style>
</head>  
<body>

  
  <?php
    $mysql=new mysqli($host,$user,$password,$database);

	if ($mysql->connect_error)
	  die("Problemas con la conexion a la base de datos");

    $registro=$mysql->query("select * from viviendas where id_vivienda='$_REQUEST[id_vivienda]'") or
      die($mysql->error); 
  
	 
    if ($reg=$registro->fetch_array(MYSQLI_ASSOC)) 
    {  
  ?>
  
<form method="post" action="mod2.php" enctype="multipart/form-data">
      Tipo de vivienda:
      <?php 
      //get enum values from database and create a select list
      $result = $mysql->query("SHOW COLUMNS FROM viviendas LIKE 'tipo_vivienda'");
      $row = $result->fetch_array(MYSQLI_ASSOC);
      $enumList = explode("','",preg_replace("/(enum|set)\('(.+?)'\)/","\\2", $row['Type']));
      echo '<select name="tipo_vivienda">';
      foreach($enumList as $value)
        if ($value == $reg['tipo_vivienda'])
          echo '<option value="'.$value.'" selected>'.$value.'</option>';//define default value
        else
          echo '<option value="'.$value.'">'.$value.'</option>';
      echo '</select>';

      ?>
      <br>
      
      Zona de la vivienda:
      <?php
      //get enum values from database and create a select list
      $result = $mysql->query("SHOW COLUMNS FROM viviendas LIKE 'zona_vivienda'");
      $row = $result->fetch_array(MYSQLI_ASSOC);
      $enumList = explode("','",preg_replace("/(enum|set)\('(.+?)'\)/","\\2", $row['Type']));
      echo '<select name="zona_vivienda">';
      foreach($enumList as $value)
        if ($value == $reg['zona_vivienda'])
          echo '<option value="'.$value.'" selected>'.$value.'</option>';//define default value
        else
          echo '<option value="'.$value.'">'.$value.'</option>';
      echo '</select>';
      ?>

      <br>      
      Direccion de la vivienda:
      <input type="text" name="direccion_vivieda" size="10" value="<?php echo $reg['direccion_vivieda']; ?>">
      <br>
      Dormitorios:
      <?php
      function enum_values($table, $field)
      {
        $mysql=new mysqli($host,$user,$password,$database);
        if ($mysql->connect_error)
          die("Problemas con la conexion a la base de datos");
        $type = $mysql->query("SHOW COLUMNS FROM viviendas LIKE 'ndormitorios_vivienda'")->fetch_object()->Type;
        preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
        $enum = explode("','", $matches[1]);
        return $enum;
      }
      $enum = enum_values('viviendas', 'ndormitorios_vivienda');
      echo '<select name="ndormitorios_vivienda">';
      foreach($enum as $value)
        if ($value == $reg['ndormitorios_vivienda'])
          echo '<option value="'.$value.'"selected>'.$value.'</option>';//define default value
        else
          echo '<option value="'.$value.'">'.$value.'</option>';
      echo '</select>';
      ?>
      <br>  
      Precio:
      <input type="text" name="precio_vivienda" size="100" value="<?php echo $reg['precio_vivienda']; ?>">
      <br>
      TamaÃ±o de la vivienda:
      <input type="text" name="tamano_vivienda" size="100" value="<?php echo $reg['tamano_vivienda']; ?>">
      <br>
      Extras:
      <?php
      $result = $mysql->query("SHOW COLUMNS FROM viviendas LIKE 'extras_vivienda'");
      $row = $result->fetch_array(MYSQLI_ASSOC);
      $enumList = explode("','",preg_replace("/(enum|set)\('(.+?)'\)/","\\2", $row['Type']));
      echo '<select name="extras_vivienda">';
      foreach($enumList as $value)
        if ($value == $reg['extras_vivienda'])
          echo '<option value="'.$value.'" selected>'.$value.'</option>';//define default value
        else
          echo '<option value="'.$value.'">'.$value.'</option>';
      echo '</select>';
      ?>
      <br>
      Foto de la vivienda:
      <input type="file" name="foto_vivienda">
      <br>

      Observaciones:
      <input type="text" name="observaciones_vivienda" size="100" value="<?php echo $reg['observaciones_vivienda']; ?>">
      <br>
      <input type="hidden" name="id_vivienda" value="<?php echo $_REQUEST['id_vivienda']; ?>">
      <br>
      <input type="submit" value="Confirmar">
    </form>
  <?php
    }else
      echo 'No existe un articulo con dicho codigo.';
  ?>
   
</body>
</html>	