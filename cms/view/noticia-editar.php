
<div class="contenedor_principal">
    <div class="cabecera">
        <img src="<?php echo $_SESSION['home'].'../img/cms-logo.png'?>" id="logo">
    </div>
    <?php require ("partials/menu.php")?>

    <?php require ("partials/mensajes.php")?>

    <div class="editarNoticia">

        <form method="post" enctype="multipart/form-data">
            <fieldset>
                <legend><b>Editar noticia</b></legend>
                <div>
                    <div class="edito">
                        <label>Título</label>
                        <input type="text" name="titulo" value="<?php echo $datos->titulo ?>"/>
                    </div>

                    <div class="edito">
                        <label>Entradilla</label>
                        <textarea name="entradilla" ><?php echo $datos->entradilla ?></textarea>

                    </div>

                    <div class="edito">
                        <label>Texto</label>
                        <textarea name="editor1"><?php echo $datos->texto ?></textarea>
                        <input type="hidden" id="texto" name="texto">


                    </div>

                    <div class="editFecha">
                        <div>
                            <label>Fecha de Alta</label>
                            <input  name="fecha_alta" type="date" value="<?php echo $datos->fecha_alta ?>">

                        </div>
                        <div class="editFecha2">
                            <label>Fecha de Modificación</label>
                            <input type="date" name="fecha_mod" value="<?php echo $datos->fecha_mod ?>">
                        </div>

                    </div>

                    <div class="edito">
                        <label>Autor</label>
                        <input type="text" name="autor" value="<?php echo $datos->autor ?>"/>
                    </div>

                    <div class="edito">
                        <label>Añadir imagen</label>
                        <input name="imagenes" type="file" value="<?php echo $datos->imagen ?>">

                    </div>


                </div>
                <div class="editFecha">
                    <div>
                        <a class="btn-vol" type="submit" href="<?php echo $_SESSION['home'] ?>panel/noticias" >Volver</a>
                    </div>
                    <div>
                        <input class="btn" type="submit" id="guardar" value="guardar" name="guardar"/>
                    </div>
                </div>


            </fieldset>
        </form>


    </div>

</div>

