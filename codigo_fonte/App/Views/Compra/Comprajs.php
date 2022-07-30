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

    //Gravando inclusão
    $('#btn-salvar-incluir').on('click', function(){
        $.ajax({
            url: '<?= URL_BASE ?>/Compras/Incluir/Salvar',
            type: 'POST',
            data: $('#form-compra').serialize(),
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
    
        var id = $(this).attr('id-compra');
        $('#quantidade-compra').val('');
        $('#cnpj-fornecedor').val('');
        $('#nome-produto').val('');
        $('#cpf-funcionario').val('');
        $.ajax({
            url: '<?= URL_BASE ?>/Compras/Atualizar/' + id,
            type: 'GET',
            dataType: 'json',
            success:function(dados){
                //Preenche campos do formulário
                $('#quantidade-compra').val(dados.quantidade_compra);
                $('#cnpj-fornecedor').val(dados.cnpj_fornecedor);
                $('#nome-produto').val(dados.nome_produto);
                $('#cpf-funcionario').val(dados.cpf_funcionario);
                //Campos escondidos
                $('#token-csrf').val(dados.token_CSRF);
                $('#id-compra').val(dados.id);
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
            url: '<?= URL_BASE ?>/Compras/Atualizar/Salvar',
            type: 'POST',
            data: $('#form-compra').serialize(),
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
        var id = $(this).attr("id-compra");
        opcao = confirm(`Realmente deseja apagar a compra?`);
        if(opcao){
            $.ajax({
                url: '<?= URL_BASE ?>/Compras/Apagar/' + id,
                type: 'GET',
                dataType: 'json',
                success: function(dados){
                    if(dados.status){
                        alert("Exclusão realizada com sucesso!")
                    } else {
                        alert("Ocorreu um erro:\n" + dados.erro);
                    }

                },
                error: function(){
                    alert("Não foi possível contactar o servidor");
                }
            })
        }
    })
})
</script>