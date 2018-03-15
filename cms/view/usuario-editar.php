
<div class="contenedor_principal">
    <div class="cabecera">
        <img src="<?php echo $_SESSION['home'].'../img/cms-logo.png'?>" id="logo">
    </div>
    <?php require ("partials/menu.php")?>

    <?php require ("partials/mensajes.php")?>

    <div class="editar">

        <form method="post" >
            <fieldset>
                <legend><b>Editar Usuario</b></legend>
                <div class="centr">
                    <div class="edit">
                        <label>Nombre de usuario</label>
                        <input type="text" name="usuario" value="<?php echo $datos->usuario ?>"/>
                    </div>

                    <div class="edit">
                        <label>Contraseña</label><input type="checkbox" id="check"> Marca para cambiar contraseña
                        <input type="password" name="cambiar_clave" id="clave2"/>
                    </div>

                    <div class="edit">
                        <label>Permisos:</label>
                        <?php $usuarios = ($datos->usuarios == 1) ? 'checked' : '' ?>
                        <?php $noticias = ($datos->noticias == 1) ? 'checked' : '' ?>
                        <input type="checkbox" name="usuarios" <?php echo $usuarios ?>>&nbsp;Usuarios&nbsp;&nbsp;
                        <input type="checkbox" name="noticias" <?php echo $noticias ?>>&nbsp;Noticias
                    </div>
                </div>
                <div class="editFecha">
                    <div>
                        <a class="btn-vol" type="submit" href="<?php echo $_SESSION['home'] ?>panel/usuarios" >Volver</a>
                    </div>
                    <div>
                        <input class="btn" type="submit" value="guardar" name="guardar"/>
                    </div>
                </div>
            </fieldset>
        </form>


    </div>

</div>
