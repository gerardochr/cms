
<div class="contenedor_principal">
    <?php require ("partials/menu.php")?>

    <?php require ("partials/mensajes.php")?>

    <div class="tabla">
        <h1>Noticias </h1>

        <table id="usuarios">
            <tr id="titulo_prin">
                <th>Noticia <a href="<?php echo $_SESSION['home'] ?>panel/noticias/crear">añadir</a></th>
                <th id="titulo_prin2">Acciones</th>
            </tr>
            <?php foreach ($datos as $dato){ ?>
                <tr>
                    <td id="user">
                        <?php $ruta1 = $_SESSION['home']."panel/noticias/editar/".$dato->id; ?>
                        <a href="<?php echo $ruta1 ?>" ><?php echo $dato->titulo ?></a>
                        <p><?php echo $dato->entradilla ?></p>

                    </td>

                    <td>
                        <?php $texto2 = ($dato->destacado == 1) ? 'nodestacar' : 'destacar'; ?>
                        <?php $ruta3 = $_SESSION['home']."panel/noticias/".$texto2."/".$dato->id;?>
                        <?php $accion2 = ($dato->destacado == 1) ? 'destacar' : 'no-destacar'; ?>
                        <?php if($accion2 == 'destacar'){
                            $clase2 = "fas fa-star";
                        }else{
                            $clase2 = "far fa-star";
                        } ?>
                        <a href="<?php echo $ruta3 ?>" title="<?php echo $texto2 ?>"><i class="<?php echo $clase2 ?>"></i></a>

                        <?php $ruta1 = $_SESSION['home']."panel/noticias/editar/".$dato->id; ?>
                        <a href="<?php echo $ruta1 ?>" title="editar"><i class="fas fa-pencil-alt"></i></a>

                        <?php $accion = ($dato->activo == 1) ? 'mostrar' : 'no-mostrar'; ?>
                        <?php if($accion == 'mostrar'){
                            $clase = "fas fa-check";
                        }else{
                            $clase = "fas fa-times";
                        } ?>
                        <?php $texto = ($dato->activo == 1) ? 'desactivar' : 'activar'; ?>
                        <?php $ruta = $_SESSION['home']."panel/noticias/".$texto."/".$dato->id;?>
                        <a id="<?php echo $accion?>" href="<?php echo $ruta ?>" title="<?php echo $texto?>"><i class="<?php echo $clase ?>"></i></a>

                        <?php $ruta2 = $_SESSION['home']."panel/noticias/borrar/".$dato->id;?>
                        <a title="borrar" href="<?php echo $ruta2 ?>" ><i class="fas fa-trash-alt"></i></a>

                    </td>
                </tr>
            <?php }?>
        </table>
    </div>

</div>
