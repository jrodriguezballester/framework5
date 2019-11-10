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
    <div id="players">        
        <?php
            foreach ($jugadores as $jugador) {
                echo "<a href='".$config['site']['root']."/jugador/".$jugador->codigo."'>";
                echo "<figure class='playersTeam'>";       
                echo '<img src="'.$config['site']['root']."/public/images/".$jugador->foto.'" width="100" height="100"/>';        
                echo "<figcaption>".$jugador->Nombre."</figcaption></figure></a>";
              

            }
        ?>          
    </div>
</div>    
</body>
</html>