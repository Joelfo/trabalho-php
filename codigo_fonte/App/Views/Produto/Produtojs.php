<script>

function listaProdutos(){
    $.ajax({
        url: '<?= URL_BASE ?>/Produtos/Listar',
        type: 'GET',
        dataType: 'json',
        success:function(resposta){
            if(resposta.status === true){
                $('#conteudo-tabela').append(resposta.corpo_tabela);
            } else {
                alert('Ocorreu um erro: ' . resposta.erro);
            }
        },
        error:function(resposta){
            alert('Ocorreu um erro na solicitação, impossível carregar conteúdo');
        }
    })
}

$(document).ready(function(){
    listaProdutos();
    $(document).on('click', '#btn-opcoes', function(){
        id = $(this).attr('id-produto');
        $.ajax({
            url: '<?= URL_BASE ?>/Produtos/Token',
            type: 'GET',
            dataType: 'json',
            success: function(dados){
                $('[name="token-csrf"]').val(dados.token_CSRF);
                $('#id-produto').val(id);
                $('#modal-opcoes').modal('show');
            },
            error: function(){
                alert('Não foi possível contactar o servidor');
            }
        })

    })

    $('#btn-liberar-venda').on('click', function(){
        $.ajax({
            url: '<?= URL_BASE ?>/Produtos/Liberar',
            type: 'POST',
            data: $('#form-produto').serialize(),
            dataType: 'json',
            success: function(dados){
                nomeProduto = $(this).attr('nome-produto');
                alert(`Produto ${nomeProduto} liberado com sucesso`);
            }, error: function(){
                alert('Não foi possível contactar o servidor');
            }
        })
    })

    $('#btn-bloquear-venda').on('click', function(){
        $.ajax({
            url: '<?= URL_BASE ?>/Produtos/Bloquear',
            type: 'POST',
            data: $('#form-produto').serialize(),
            dataType: 'json',
            success: function(dados){
                nomeProduto = $(this).attr('nome-produto');
                alert(`Produto ${nomeProduto} liberado com sucesso`);
            }, error: function(){
                alert('Não foi possível contactar o servidor');
            }
        })
    })
})

</script>