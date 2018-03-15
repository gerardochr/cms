
<div class="contenedor_principal">

<div class="contenedor_secundario">
    <div class="noticias">
        <h2>Noticias destacadas</h2>
        <hr>

            <div class="noticia">
                <?php foreach ($datos as $dato){ ?>
                <div class="titulo">
                    <h2><a href="<?php echo $_SESSION['home'] ?>noticia/<?php echo $dato->slug?>"><?php echo $dato->titulo ?></a></h2>
                </div>
                    <div class="foto-entradilla">
                        <div><a href="<?php echo $_SESSION['home'] ?>noticia/<?php echo $dato->slug?>"><img src="<?php echo $dato->imagen ?>" class="foto-noticia"></a></div>
                        <div><span class="entradilla"><?php echo $dato->entradilla ?>
                                <a href="<?php echo $_SESSION['home'] ?>noticia/<?php echo $dato->slug?>"> Ver más</a></span></div>
                    </div>
                <div class="footer-noticia">
                    <div class="hecho-por">por: <?php echo $dato->autor ?></div>
                    <div class="fecha_alta">fecha de publicación: <?php echo $dato->fecha_alta ?></div>
                </div>

                <?php }?>
            </div>

    </div>



</div>
