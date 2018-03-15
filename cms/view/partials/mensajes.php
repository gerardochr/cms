<?php
if(isset($_SESSION['mensajes']) AND count($_SESSION['mensajes']) > 0){ ?>
    <?php foreach ($_SESSION['mensajes'] as $mensaje){?>
        <div class="alert alert-<?php echo $mensaje['tipo'] ?> alert-dismissible fade show" role="alert">
            <?php echo $mensaje['texto'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
<?php } ?>

<?php $_SESSION['mensajes'] = []; ?>
