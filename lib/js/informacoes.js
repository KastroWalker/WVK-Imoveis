$(document).ready(function(){
    $(".btn-editar").on('click', function(){
        console.log("teste");
        $("#informacao_imovel").fadeOut();
        $("#edita_imovel").fadeIn();
    });
    $(".btn_close_edit").on('click', function(){
        console.log("teste");
        $("#informacao_imovel").fadeIn();
        $("#edita_imovel").fadeOut();
    });
});