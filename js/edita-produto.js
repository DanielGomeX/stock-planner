var frm = $('.formulario-produto');
var nome = $('#nome');
var catmat = $('#catmat');
var identificacao = $('#identificacao');
var estoque_ideal = $('#estoque_ideal');
var quantidade = $('#quantidade');
var categoria = $('#categoria');
var posicao = $('#posicao');
var descricao = $('#descricao');

$('#formato-botao-mais').on('click',function(){
    //e.preventDefault();

    alertify.prompt().set('resizable',true).resizeTo(500,250);
    alertify.prompt( 'Cadastrar nova categoria', 'Nome', '', function(evt, value) {

          let url = "processa-categoria.php?nome=" + value;

          //alertify.success('Cadastrado com sucesso');

          var request = $.ajax({
                url: url,
                cache: false
         });

           request.done(function(msg) {
               if(msg == -1){
                alertify.error("Falha ao cadastrar categoria");
               }
               else{
                   $('#categoria').add("<option> " +value+ "</option>").prependTo("#categoria");
                   $("#categoria").val( $('option:contains('+value+')').val() );
                   alertify.success('Cadastrado com sucesso');
               }
               
           });

           request.fail(function(jqXHR, textStatus) {
               alert("Falha ao cadastrar categoria");
           });


    }, function() {
          alertify.error('Cancelado')
    }).setting({'labels':{ok:'Sim',cancel:'Não'},
                    'transition':'zoom'
        });

});

function ehNumerico(campo)
{
    let string = campo.val();
    let size = string.length;

    for(let i = 0; i < size; i++)
    {
        if(!(string[i] >= '0' && string[i] <= '9'))
        {
            return false;
        }
    }
    return true;
}


frm.submit(function (e) {
    e.preventDefault();

    let erros = false;

    if(identificacao.val() == "" || posicao.val() == "" || descricao.val() == "" || nome.val() == ""
        || catmat.val() == "" || !ehNumerico(catmat)|| estoque_ideal.val() == ""
        || !ehNumerico(estoque_ideal) || quantidade.val() == "" || !ehNumerico(quantidade) ){
        erros = true;
    }

    if(!erros){
        var request = $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            dataType: "html"
        });

        request.done(function(msg) {
            if(msg === '1')
            {
                quantidade.removeClass('is-valid is-invalid');
                $('#feedback-quantidade').remove('valid-feedback invalid-feedback').add('feedback');

                nome.removeClass('is-valid is-invalid');
                $('#feedback-nome').remove('valid-feedback invalid-feedback').add('feedback');

                identificacao.removeClass('is-valid is-invalid');
                $('#feedback-identificacao').remove('valid-feedback invalid-feedback').add('feedback');

                descricao.removeClass('is-valid is-invalid');
                $('#feedback-descricao').remove('valid-feedback invalid-feedback').add('feedback');

                catmat.removeClass('is-valid is-invalid');
                $('#feedback-catmat').remove('valid-feedback invalid-feedback').add('feedback');

                posicao.removeClass('is-valid is-invalid');
                $('#feedback-posicao').remove('valid-feedback invalid-feedback').add('feedback');

                estoque_ideal.removeClass('is-valid is-invalid');
                $('#feedback-estoque_ideal').remove('valid-feedback invalid-feedback').add('feedback');

                alertify.alert('Mensagem de sistema', 'Produto editado com Sucesso!', function() {
                    document.location.href = "lista-produtos.php";
                    console.log(msg);
                }).setting({'transition':'zoom','resizable':true}).resizeTo(500,250);
            }
            else
            {
                alertify.alert('Mensagem de sistema', 'Falha ao editar produto!', function() {
                    //document.location.href = "lista-produtos.php";
                    console.log(msg);
                }).setting({'transition':'zoom','resizable':true}).resizeTo(500,250);
            }

        });

        request.fail(function(jqXHR, textStatus) {
            let mensagem = "Falha ao editar produto: " + textStatus;
            alertify.alert('Mensagem de sistema', mensagem).setting({'transition':'zoom','resizable':true}).resizeTo(500,250);

        });
    }else{
        if(identificacao.val() == ""){
            identificacao.removeClass("is-valid").addClass("is-invalid");
            $('#feedback-identificacao').removeClass('feedback valid-feedback').addClass('invalid-feedback');
            $('#feedback-identificacao').text('Digite uma identificação');
        }
        else{
            identificacao.removeClass("is-invalid").addClass("is-valid");
            $('#feedback-identificacao').removeClass('feedback invalid-feedback').addClass('valid-feedback');
            $('#feedback-identificacao').text('Okay!');
        }

        if(posicao.val() == ""){
            posicao.removeClass("is-valid").addClass("is-invalid");
            $('#feedback-posicao').removeClass('feedback valid-feedback').addClass('invalid-feedback');
            $('#feedback-posicao').text('Digite uma posição');
        }
        else{
            posicao.removeClass("is-invalid").addClass("is-valid");
            $('#feedback-posicao').removeClass('feedback invalid-feedback').addClass('valid-feedback');
            $('#feedback-posicao').text('Okay!');
        }

        if(descricao.val() == ""){
            descricao.removeClass("is-valid").addClass("is-invalid");
            $('#feedback-descricao').removeClass('feedback valid-feedback').addClass('invalid-feedback');
            $('#feedback-descricao').text('Digite uma descrição');
        }
        else{
            descricao.removeClass("is-invalid").addClass("is-valid");
            $('#feedback-descricao').removeClass('feedback invalid-feedback').addClass('valid-feedback');
            $('#feedback-descricao').text('Okay!');
        }

        if(nome.val() == ""){
            nome.removeClass("is-valid").addClass("is-invalid");
            $('#feedback-nome').removeClass('feedback valid-feedback').addClass('invalid-feedback');
            $('#feedback-nome').text('Digite um nome');
        }
        else{
            nome.removeClass("is-invalid").addClass("is-valid");
            $('#feedback-nome').removeClass('feedback invalid-feedback').addClass('valid-feedback');
            $('#feedback-nome').text('Okay!');
        }

        if(catmat.val() == "" || !ehNumerico(catmat)){
            catmat.removeClass("is-valid").addClass("is-invalid");
            $('#feedback-catmat').removeClass('feedback valid-feedback').addClass('invalid-feedback');
            $('#feedback-catmat').text('Digite um número');
        }
        else{
            catmat.removeClass("is-invalid").addClass("is-valid");
            $('#feedback-catmat').removeClass('feedback invalid-feedback').addClass('valid-feedback');
            $('#feedback-catmat').text('Okay!');
        }

        if(estoque_ideal.val() == "" || !ehNumerico(estoque_ideal)){
            estoque_ideal.removeClass("is-valid").addClass("is-invalid");
            $('#feedback-estoque_ideal').removeClass('feedback valid-feedback').addClass('invalid-feedback');
            $('#feedback-estoque_ideal').text('Digite um número');
        }
        else{
            estoque_ideal.removeClass("is-invalid").addClass("is-valid");
            $('#feedback-estoque_ideal').removeClass('feedback invalid-feedback').addClass('valid-feedback');
            $('#feedback-estoque_ideal').text('Okay!');
        }

        if(quantidade.val() == "" || !ehNumerico(quantidade)){
            quantidade.removeClass("is-valid").addClass("is-invalid");
            $('#feedback-quantidade').removeClass('feedback valid-feedback').addClass('invalid-feedback');
            $('#feedback-quantidade').text('Digite um número');
        }
        else{
            quantidade.removeClass("is-invalid").addClass("is-valid");
            $('#feedback-quantidade').removeClass('feedback invalid-feedback').addClass('valid-feedback');
            $('#feedback-quantidade').text('Okay!');
        }

    }


});
