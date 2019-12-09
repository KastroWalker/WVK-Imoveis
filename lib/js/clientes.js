$(document).ready(function(){
    $('.cliente').on('click', function(){     
        $(".edit_cliente").fadeOut();
        $("#info_cliente").fadeIn();     
        
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        console.log(data);
        
        document.getElementById("nome_cliente").innerHTML = data[1];
        document.getElementById("contato_cliente").innerHTML = data[4];
        document.getElementById("cpf_cliente").innerHTML = data[2];
        document.getElementById("email_cliente").innerHTML = data[5];
        document.getElementById("user_cliente").innerHTML = data[6];
        document.getElementById("senha_cliente").innerHTML = data[7];
        document.getElementById("perfil_cliente").src = "../../../img/perfil_clientes/" + data[8];
    });
    
    $('.btn-edit').on('click', function(){
        $("#info_cliente").fadeOut();
        $(".edit_cliente").fadeIn();

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        console.log(data);
        
        document.getElementById("cliente_id").value = data[3];
        document.getElementById("campo_nome").value = data[1];
        document.getElementById("campo_contato").value = data[4];
        document.getElementById("campo_cpf").value = data[2];
        document.getElementById("campo_email").value = data[5];
        document.getElementById("campo_user").value = data[6];
        document.getElementById("campo_senha").value = data[7];
        document.getElementById("img_perfil_atual").value = data[8];
        document.getElementById("img_perfil_cliente").src = "../../../img/perfil_clientes/" + data[8];
    });

    $('.btn-delete').on('click', function(){
        $('#deletemodal').modal('show');  
        
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        console.log(data);  
        document.getElementById("delete_id").value = data[3];
        document.getElementById("img_perfil").value = data[8];
    });

    $('.btn_close').on('click', function(){
        $("#info_cliente").fadeOut();
    });

    $('.btn_close_edit').on('click', function(){
        $(".edit_cliente").fadeOut();
    });
});