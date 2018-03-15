


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

