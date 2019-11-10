<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Portada</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="public/css/main.css" />
</head>

<body>
    <div id="content">
        <div class="row">
            <div class="col-xl-4"></div>
            <img src="<?= $config['site']['root'] ?>/public/images/escudo.jpg" height="400px" />
        </div>
            <div class="row">
            <div class="col-xl-4"></div>
                <?php
                $texto = null;
                $redirige = "------";
                // header('Location: ' . $GLOBALS['config']['site']['root'] . "/mensaje/" . $mensaje);
                switch ($mensaje['mensaje']) {
                    case '1':
                        //viene de input::check
                        $texto = "Te has registrado correctamente";
                        $redirige = '/';
                        break;
                    case '2':
                        //viene de input::check
                        $texto = 'ALGO HA FALLADO';
                        $redirige = '/registro';
                        break;
                    case '3':
                        $texto = 'Debes rellenar todos los campos';
                        $redirige = '/registro';
                        break;
                    case '4':
                        $texto = 'El Comentario no puede estar vacio';
                        $redirige = "/jugadores";
                        break;
                    case '5':
                        $texto = 'Te has logeado correctamente';
                        $redirige = "/";
                        break;
                    case '6':
                        $texto = ' Usuario o password incorrectos';
                        $redirige = "/login";
                        break;
                    case '7':
                        $texto = '"Ha guardado el comentario"';
                        $redirige = "/jugador/" . $_SESSION['idjugador'];
                        break;
                    case '8':
                        $texto = 'ALGO HA FALLADO';
                        $redirige = "/jugador/" . $_SESSION['idjugador'];
                        break;
                    case '9':
                        $texto = 'Tienes que Loguearte';
                        $redirige = "/login";
                        break;
                }
                echo "<h1>" . $texto . "</h1>";
                ?>
            </div>
            <div class="row">
            <div class="col-xl-4"></div>
            <form enctype="multipart/form-data" name="confirmar" action="<?= $config['site']['root'] ?>/mensaje/0" method="post">
                <input type="hidden" name="nombre" value=<?= $redirige ?>>
                <button class="btn btn-primary btn-block" id="authButton" type="submit" name="confirmar" valor=<?php $mensaje ?>>OK</button>
            </form>
        </div>
</body>

</html>