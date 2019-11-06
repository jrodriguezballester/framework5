<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Portada</title>
    <link rel="stylesheet" type="text/css" media="screen" href="../public/css/main.css" />
</head>

<body>
    <?php
    include "menu.php";
    ?>
    <div id="content">
        <?php
        echo "<table border='1'>";
        echo '<tr><th>Nombre</th><td>' . $jugador->Nombre . '</td></tr>';
        echo '<tr><th>Procedencia</th><td>' . $jugador->Procedencia . '</td></tr>';
        echo '<tr><th>Altura</th><td>' . $jugador->Altura . '</td></tr>';
        echo '<tr><th>Peso</th><td>' . $jugador->Peso . '</td></tr>';
        echo '<tr><th>Posición</th><td>' . $jugador->Posicion . '</td></tr>';
        echo "</table>";
        ?>
        <form name="formulario" method="post" action="<?= $config['site']['root'] ?>/app/models/ComentarioModel.php">
            <!-- Area de texto extensa -->
            <textarea placeholder="Escribe aquí tu comentario..." name="texto" cols="80" rows="5"></textarea>
            <input type="submit" name="guardar" value="Guardar">
        </form>

    </div>
</body>

</html>