<script>

function listaCompras(){
    $.ajax({
        url: '<?= URL_BASE ?>/Compras/Listar',
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
            alert('Ocorreu um erro na solicitação, impossível carregar categorias');
        }
    })
}

$(document).ready(function(){
    listaCompras();

    //Chamando form de inclusão
    $(document).on('click', '#btn-incluir', function(){
        $('#quantidade-compra').val('');
        
        
        $.ajax({
            url: '<?= URL_BASE ?>/Compras/Incluir',
            type: 'GET',
            dataType: 'json',
            success:function(resposta){
                $('[name="token-csrf"]').val(resposta.token_CSRF);
                $('#btn-salvar-incluir').show();
                $('#btn-salvar-atualizar').hide();
                $('#modal-categoria').modal('show');
            },
            error:function(){
                alert('Ocorreu um erro com a solicitação de inclusão');
            }
        
        })
    })
})
</script>