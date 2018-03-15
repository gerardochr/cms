$(function(){
    $("#clave2").hide();
    $('#check').on('change',function(){

        if (this.checked) {
            $("#clave2").show();
        } else {
            $("#clave2").hide();
        }
    })
});