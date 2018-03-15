
<div class="contenedor_principal">
    <div class="cabecera">
        <img src="<?php echo $_SESSION['home'].'../img/cms-logo.png'?>" id="logo">
    </div>
    <?php require ("partials/menu.php")?>

    <?php require ("partials/mensajes.php")?>

    <div class="tabla">
        <h1>Usuarios </h1>

        <table id="usuarios">
            <tr id="titulo_prin">
                <th>Usuario <a href="<?php echo $_SESSION['home'] ?>panel/usuarios/crear">añadir</a></th>
                <th id="titulo_prin2">Acciones</th>
            </tr>
            <?php foreach ($datos as $dato){ ?>
                <tr>
                    <td id="user">
                        <?php $ruta1 = $_SESSION['home']."panel/usuarios/editar/".$dato->id; ?>
                        <a href="<?php echo $ruta1 ?>" ><?php echo $dato->usuario ?></a>
                    </td>
                    <td>
                        <?php $ruta1 = $_SESSION['home']."panel/usuarios/editar/".$dato->id; ?>
                        <a href="<?php echo $ruta1 ?>" title="editar"><i class="fas fa-pencil-alt"></i></a>

                        <?php $color = ($dato->activo == 1) ? 'activo' : 'inactivo'; ?>
                        <?php $texto = ($dato->activo == 1) ? 'desactivar' : 'activar'; ?>
                        <?php $ruta = $_SESSION['home']."panel/usuarios/".$texto."/".$dato->id;?>
                        <a class="<?php echo $color?>" href="<?php echo $ruta ?>" title="<?php echo $texto?>"><i class="far fa-smile"></i></a>

                        <?php $ruta2 = $_SESSION['home']."panel/usuarios/borrar/".$dato->id;?>
                        <a title="borrar" href="<?php echo $ruta2 ?>" ><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php }?>
        </table>
    </div>


</div>
