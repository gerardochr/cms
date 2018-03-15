<div class="contenedor_principal">
    <div class="contenedor_secundario">
        <div class="noticiaIndividual">
            <?php foreach ($datos as $dato){ ?>
                <div class="titulo">
                    <h1><?php echo $dato->titulo ?></h1>
                </div>
                <hr>
                <div><span class="entradilla-individual"><?php echo $dato->entradilla ?></span></div>
                <div class="footer-noticia">
                    <div class="hecho-por">Por: <?php echo $dato->autor ?></div>
                    <div class="fecha_alta">fecha de publicación: <?php echo $dato->fecha_alta ?></div><br>
                </div>

                    <div><img src="<?php echo $dato->imagen ?>" class="foto-noticia-individual"></div><br>

                <div class="texto"><?php echo $dato->texto ?></div>


            <?php }?>
        </div>
    </div>
</div>