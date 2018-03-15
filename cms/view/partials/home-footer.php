
<footer>
    <hr>
    <div class="pie">
        <div class="copyright">
            <span>©HipHopNews2018</span>
        </div>
        <div class="politicas">
            <ul>
                <li><a>Privacidad</a></li>
                <li><a>Términos y condiciones</a></li>
                <li><a>Ayuda</a></li>
            </ul>

        </div>
        <div class="redes-sociales">
            <img src="<?php echo $_SESSION['home'].'../img/iconos/insta.png'?>" class="red-social">
            <img src="<?php echo $_SESSION['home'].'../img/iconos/twit.png'?>" class="red-social">
            <img src="<?php echo $_SESSION['home'].'../img/iconos/face.png'?>" class="red-social">
        </div>

    </div>

</footer>
<script type="text/javascript">
    $("#guardar").click(function () {
        var content = CKEDITOR.instances.editor1.getData();
        document.getElementById("texto").value = content;
        document.querySelector("form").submit();
    });
</script>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<script src="./js/script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
