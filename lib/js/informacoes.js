$(document).ready(function(){
    $(".btn-editar").on('click', function(){
        $("#informacao_imovel").fadeOut();
        $("#edita_imovel").fadeIn();
    });
    $(".btn-warning").on('click', function(){
        $("#informacao_imovel").fadeOut();
        $("#imagem_imovel").fadeIn();
    });
    $(".btn_close_edit").on('click', function(){
        $("#informacao_imovel").fadeIn();
        $("#edita_imovel").fadeOut();
        $("#imagem_imovel").fadeOut();
    });
});