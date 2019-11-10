<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Portada</title>
    <link rel="stylesheet" type="text/css" media="screen" href="public/css/main.css" />
</head>
<body>
<?php
    include "menu.php";
?>
<div id="content">
    <img src="public/images/escudo.jpg" />  
</div> 


<?php
if ($data){//este código se ejecuta tan solo si se detecta una matriz de datos que e le envia
  //  $nombre = $_POST['nombre'];//recoge la variable nombre y la guarda para trabajar con ella
    echo '<br><br><br>hola' . $data;
 
}

?>   
</body>
</html>
