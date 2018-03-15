<div class="contenedor_principal">
    <div class="menu">
        <div class="links">
            <ul class="menu_link">
                <a href="<?php echo $_SESSION['home'] ?>panel"><li>Inicio</li></a>
                <a href="<?php echo $_SESSION['home'] ?>panel/noticias"><li>Noticias</li></a>
                <?php if($_SESSION['usuarios']){ ?>
                    <a href="<?php echo $_SESSION['home'] ?>panel/usuarios"><li>Usuarios</li></a>
                <?php } ?>
                <a href="<?php echo $_SESSION['home'] ?>panel/salir"><li>Salir</li></a>
            </ul>
        </div>
    </div>
    <span class="titulo">
        <h1><?php echo "Bienvenido al panel de admin"?><br><br><?php echo "Hola ".$datos->usuario ?></h1><br>
    </span>
    <div class="circulos">
        <div class="circ"><a href="<?php echo $_SESSION['home'] ?>panel/noticias" title="Noticias"><i class="fas fa-newspaper"></i></a></div>
        <?php if($_SESSION['usuarios']){ ?>
        <div class="circ"><a href="<?php echo $_SESSION['home'] ?>panel/usuarios" title="Usuarios"><i class="fas fa-users"></i></a></div>
        <?php } ?>
        <div class="circ"><a href="<?php echo $_SESSION['home'] ?>panel/salir" title="Salir"><i class="fas fa-sign-out-alt"></i></a></div>
    </div>
</div>