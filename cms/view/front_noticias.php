
<div class="contenedor_principal">
    <div class="contenedor_secundario">
        <div class="lista-noticias">
            <h2>Noticias</h2>
            <hr>


                <?php foreach ($datos as $dato){ ?>
                <div class="contenedorNoticia">

                        <div class="cont"><b><a href="<?php echo $_SESSION['home'] ?>noticia/<?php echo $dato->slug?>"><?php echo $dato->titulo ?></a></b><br><a href="<?php echo $_SESSION['home'] ?>noticia/<?php echo $dato->slug?>">Ver más</a></div>
                  
                        <div class="contEntr"><?php echo $dato->entradilla ?></div>


                </div>
                 <?php }?>


        </div>

    </div>
</div>

