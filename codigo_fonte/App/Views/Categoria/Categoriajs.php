<script>
function listaCategorias(){
    $.ajax({
        url: '<?= URL_BASE ?>/Categorias/Listar',
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
    listaCategorias();

    //Chamando form de inclusão
    $(document).on('click', '#btn-incluir', function(){

        $('#nome-categoria').val('');
        $.ajax({
            url: '<?= URL_BASE ?>/Categorias/Incluir',
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
    //Gravando inclusão
    $('#btn-salvar-incluir').on('click', function(){
        $.ajax({
            url: '<?= URL_BASE ?>/Categorias/Incluir/Salvar',
            type: 'POST',
            data: $('#form-categoria').serialize(),
            dataType: 'json',
            success:function(dados){
                // Update CSRF hash
                $('[name="token-csrf"]').val(dados.token);
                if(dados.status == true){
                    alert('Inclusão realizada com sucesso');
                } else{
                    alert('Ocorreu um erro: ' + dados.erro);
                }
            },
            error:function(){
                alert('Não foi possível contactar o servidor')
            }
        });  
    });
    
    $(document).on("click", "#btn-alterar", function(){
        //Limpa formulario do modal
        $('#nome-categoria').val("");
    
        var id = $(this).attr('id-categoria');
        $.ajax({
            url: '<?= URL_BASE ?>/Categorias/Atualizar/' + id,
            type: 'GET',
            dataType: 'json',
            success:function(dados){
                
                $('#nome-categoria').val(dados.nome_categoria);
                $('#token-csrf').val(dados.token_CSRF);
                $('#id-categoria').val(dados.id);
                //Esconde o botão de incluir e mostra o de atualizar
                $('#btn-salvar-incluir').hide();
                $('#btn-salvar-atualizar').show();
                $('#modal-categoria').modal('show');
            },
            error:function(){
                alert('Não foi possível contactar o servidor');
            }
        });
    })

    $('#btn-salvar-atualizar').on("click", function(){
        $.ajax({
            url: '<?= URL_BASE ?>/Categorias/Atualizar/Salvar',
            type: 'POST',
            data: $('#form-categoria').serialize(),
            dataType: 'json',
            success:function(dados){
                // Update CSRF hash
                $('[name="token-csrf"]').val(dados.token);
                if(dados.status == true){
                    alert('Atualização realizada com sucesso');
                } else{
                    alert('Ocorreu um erro: ' + dados.erro);
                }
            },
            error:function(){
                alert('Não foi possível contactar o servidor')
            }
        });  
    })
    
    $(document).on('click', '#btn-apagar', function(){
        //alert('flag');
        var id = $(this).attr('id-categoria');
        var nomeCategoria = $(this).attr("nome-categoria");
        opcao = confirm(`Realmente deseja apagar a categoria ${nomeCategoria}?`);
        if(opcao){
            $.ajax({
                url: '<?= URL_BASE ?>/Categorias/Apagar/' + id,
                type: 'GET',
                dataType: 'json',
                success:function(dados){
                    if(dados.status){
                        alert("Item excluído com sucesso!");
                    } else {
                        alert("Ocorreu um erro: \n" + dados.erro);
                    }
                },
                error:function(){
                    alert("Não foi possível contactar o servidor");
                }
            })
        }
    })    
});

</script>