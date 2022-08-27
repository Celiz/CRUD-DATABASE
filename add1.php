<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Alta de artículo</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Mulish:wght@300&display=swap');

   body{
    font-family: 'Mulish', sans-serif;
   }
   </style>
</head>

<body>
  <form method="post" action="add2.php" enctype="multipart/form-data">
    Tipo vivienda:
    <?php
     $mysql =new mysqli($HOST,$USER,$PASSWORD,$DATABASE);
      if ($mysql->connect_error)
        die("Problemas con la conexion a la base de datos");
      $registros=$mysql->query("select COLUMN_TYPE from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='viviendas' and COLUMN_NAME='tipo_vivienda'") or
        die($mysql->error);
      $reg=$registros->fetch_array();
      $enumList = explode(",", str_replace("'", "", substr($reg['COLUMN_TYPE'], 5, (strlen($reg['COLUMN_TYPE'])-6))));
      echo '<select name="tipo_vivienda">';
      foreach($enumList as $value)
        echo '<option value="'.$value.'">'.$value.'</option>';
      echo '</select>';

    ?>
    <br>
  
    Zona vivienda:
    <?php
      //get enum value from database
       $mysql =new mysqli($HOST,$USER,$PASSWORD,$DATABASE);
      if ($mysql->connect_error)
        die("Problemas con la conexion a la base de datos");
      $registros=$mysql->query("select COLUMN_TYPE from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='viviendas' and COLUMN_NAME='zona_vivienda'") or
        die($mysql->error);
      $reg=$registros->fetch_array();
      $enumList = explode(",", str_replace("'", "", substr($reg['COLUMN_TYPE'], 5, (strlen($reg['COLUMN_TYPE'])-6))));
      echo '<select name="zona_vivienda">';
      foreach($enumList as $value)
        echo '<option value="'.$value.'">'.$value.'</option>';
      echo '</select>';

    ?>

    <br>
    Direccion vivienda:
    <input type="text" name="direccion_vivieda" required>
    <br>

    Numero de dormitorios:
    <?php
    //get enum value from database with number 3 like default value
     $mysql =new mysqli($HOST,$USER,$PASSWORD,$DATABASE);
    if ($mysql->connect_error)
      die("Problemas con la conexion a la base de datos");
    $registros=$mysql->query("select COLUMN_TYPE from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='viviendas' and COLUMN_NAME='ndormitorios_vivienda'") or
      die($mysql->error);
    $reg=$registros->fetch_array();
    $enumList = explode(",", str_replace("'", "", substr($reg['COLUMN_TYPE'], 5, (strlen($reg['COLUMN_TYPE'])-6))));
    echo '<select name="ndormitorios_vivienda">';
    foreach($enumList as $value)
      if ($value == 3)
        echo '<option value="'.$value.'" selected>'.$value.'</option>';//define default value
      else
        echo '<option value="'.$value.'">'.$value.'</option>';
    echo '</select>';
    ?>
    <br>

    Precio vivienda:
    <input type="text" name="precio_vivienda" required>
    <br>

    Tamaño vivienda:
    <input type="text" name="tamano_vivienda" required>
    <br>

    Extras vivienda:
    <?php
    //get enum value from database
    $mysql =new mysqli($HOST,$USER,$PASSWORD,$DATABASE);
    if ($mysql->connect_error)
      die("Problemas con la conexion a la base de datos");
    $registros=$mysql->query("select COLUMN_TYPE from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='viviendas' and COLUMN_NAME='extras_vivienda'") or
      die($mysql->error);
    $reg=$registros->fetch_array();
    $enumList = explode(",", str_replace("'", "", substr($reg['COLUMN_TYPE'], 5, (strlen($reg['COLUMN_TYPE'])-6))));
    echo '<select name="extras_vivienda">';
    foreach($enumList as $value)
      echo '<option value="'.$value.'">'.$value.'</option>';
    echo '</select>';
    ?>
    <br>

    Foto de la vivienda:
    <input type="file" name="foto_vivienda" required>
    <br>

    Observaciones vivienda:
    <input type="text" name="observaciones_vivienda" required>
    <br>
    
    <input type="submit" value="Confirmar">
  </form>
</body>
</html>
