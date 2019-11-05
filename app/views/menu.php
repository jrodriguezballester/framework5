<div id="header">
    <a href="<?= $config['site']['root'] ?>">
        <div class="option">Inicio</div>
    </a>
    <a href="<?= $config['site']['root'] ?>/historia">
        <div class="option">Historia</div>
    </a>
    <a href="<?= $config['site']['root'] ?>/jugadores">
        <div class="option">Jugadores</div>
    </a>
    <?php

    use core\auth\Auth;
    use core\MVC\imprimir;

    
    if (!auth::check()) {
      //  imprimir::frase("check..false");
        ?>
        <a href="<?= $config['site']['root'] ?>/registro">
            <div class="option right">Registro</div>
        </a>
        <a href="<?= $config['site']['root'] ?>/login">
            <div class="option right">Login</div>
        </a>
    <?php
    } else {
    //    imprimir::frase("check...true");
        ?>
        <a href="<?= $config['site']['root'] ?>/logout">
            <div class="option right">Logout</div>
        </a>
        <div class="option right"><?= $_SESSION['userName'] ?>    
        <?php
            // if(file_exists ( $config['site']['root']."/public/images/avatares/avatar".$_SESSION['foto'].".jpg")){
                if(true){
               echo "true" ?>
                <img src="<?= $config['site']['root'] ?>/public/images/avatares/avatar<?php echo $_SESSION['foto'] ?>.png" height="50px">
                <?php
            }else{
               echo "false" ?>
                <img src="<?= $config['site']['root'] ?>/public/images/avatares/avatar<?php echo $_SESSION['foto'] ?>.jpg" height="50px">
                <?php
            }
        ?>
     
    </div>
    <?php
    }
    ?>
</div>
 