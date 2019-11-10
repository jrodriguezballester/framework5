<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Portada</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="../public/css/main.css" />

</head>

<body>
    <?php
    include "menu.php";
    ?>
    <div id="content">

        <?php
        echo '<img src="' . $config['site']['root'] . "/public/images/" . $jugador->foto . '" width="300" height="300"/>';
        echo '<table class="table table-striped row d-flex justify-content-center">';
        echo '<tr><th>Nombre</th><td>' . $jugador->Nombre . '</td></tr>';
        echo '<tr><th>Procedencia</th><td>' . $jugador->Procedencia . '</td></tr>';
        echo '<tr><th>Altura</th><td>' . $jugador->Altura . '</td></tr>';
        echo '<tr><th>Peso</th><td>' . $jugador->Peso . '</td></tr>';
        echo '<tr><th>Posición</th><td>' . $jugador->Posicion . '</td></tr>';
        echo "</table>";
        ?>

        <form name="formulario" method="post" action="<?= $config['site']['root'] ?>/registraComentario">
            <input type="hidden" name="idjugador" value="<?= $jugador->codigo ?>" />
            <textarea placeholder="Escribe aquí tu comentario..." name="comentario" cols="40" rows="5"></textarea>
            <input type="submit" name="guardar" value="Guardar">
        </form>
        <?php
        use core\MVC\KernelException;
        use app\models\UserModel ;
        for ($i = 0; $i < count($comentarios); $i++) {
            echo "<dl>";
            $datosUser=UserModel::BuscarCampoValor("usuario",$comentarios[$i]['idusuario']);
          //  echo "datos";
         //   print_r($datosUser); 
            echo '<dt><img src="'.$config['site']['root'] .'/public/images/avatares/'.$datosUser[$i]['foto'].'" height="50px">'.".". $comentarios[$i]['idusuario'] . "</dt>";
          //  echo '<li><img src="'.$config['site']['root'] .'/public/images/avatares/'.$datosUser[$i]['foto'].'" height="50px">';

           echo "<dd>" . $comentarios[$i]['Comentario'] . "</dd>

        </dl>";
        // <img src="'.$config['site']['root'] .'/public/images/avatares/'.$datosUser[$i]['foto'] .' height="50px">'
    }

        ?>

    </div>
</body>

</html>