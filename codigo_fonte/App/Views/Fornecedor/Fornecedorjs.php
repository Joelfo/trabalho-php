<script>
function listaFornecedores(){
    $.ajax({
        url: '<?= URL_BASE ?>/Fornecedores/Listar',
        type: 'GET',
        dataType: 'json',
        success:function(respostaJson){
            $('#conteudo-tabela').append(respostaJson.corpo_tabela);
        }
    })
}

$(document).ready(function(){
    listaFornecedores();

    /*Inclusão de novo fornecedor*/
    /* O botão de incluir por padrão já é visivel no formulário, enquanto o de atualizar está
    invisível */
    $(document).on('click', '#btn-incluir', function(){
        /* O mesmo modal é reaproveitado tanto para inclusão quanto atualização */
        //Limpa formulario do modal
        $('#razao-social').val("");
        $('#cnpj').val("")
        $('#endereco').val("");
        $('#bairro').val("");
        $('#cidade').val("");
        $('#uf').val("");
        $('#cep').val("");
        $('#telefone').val("");
        $('#email').val("");
        $('#id-fornecedor').val("");

        url_ajax = '<?= URL_BASE ?>/Fornecedores/Incluir';
        $.ajax({
            url: url_ajax,
            type: 'GET',
            dataType: 'json',
            success:function(dados){
                
                $('[name="token-csrf"]').val(dados.Token_CSRF);
                $('#btn-salvar-incluir').show();
                $('#btn-salvar-atualizar').hide();
                $('#modal-fornecedor').modal('show');
            },
            error:function(){
                alert('Ocorreu um erro');
            }
        })
    })

    //Gravando inclusão
    $('#btn-salvar-incluir').on('click', function(){
        var url_ajax = '<?= URL_BASE ?>/Fornecedores/Incluir/Gravar';
        $.ajax({
            url: url_ajax,
            type: 'POST',
            data: $('#form-fornecedor').serialize(),
            dataType: 'json',
            success: function(dados){
                //Update CSRF hash
                $('[name="CSRF_token"]').val(dados.token);
                if(dados.status){
                    alert('Usuário incluido com sucesso');
                } else {
                    alert('Erro:' + dados.erro);

                }
            },
            error:function(){
            alert('Ocorreu um erro com o AJAX');
            }
        })
    })
    

    /*Atualização de fornecedor */
    /*Abrindo o modal de atualização e pré-preenchendo os campos do formulário*/
    $(document).on("click", "#btAlterar", function(){
        //Limpa formulario do modal
        $('#razao-social').val("");
        $('#cnpj').val("")
        $('#endereco').val("");
        $('#bairro').val("");
        $('#cidade').val("");
        $('#uf').val("");
        $('#cep').val("");
        $('#telefone').val("");
        $('#email').val("");
        $('#id-fornecedor').val("");
    
        var id = $(this).attr('id-fornecedor');
        url_ajax = '<?= URL_BASE ?>/Fornecedores/Atualizar/' + id;
        $.ajax({
            url: url_ajax,
            type: 'GET',
            dataType: 'json',
            success:function(dados){
                
                $('#razao-social').val(dados.razao_social);
                $('#cnpj').val(dados.cnpj);
                $('#endereco').val(dados.endereco);
                $('#bairro').val(dados.bairro);
                $('#cidade').val(dados.cidade);
                $('#uf').val(dados.uf);
                $('#cep').val(dados.cep);
                $('#telefone').val(dados.telefone);
                $('#email').val(dados.email);
                $('#token-csrf').val(dados.Token_CSRF);
                $('#id-fornecedor').val(dados.id);
                //Esconde o botão de incluir e mostra o de atualizar
                $('#btn-salvar-incluir').hide();
                $('#btn-salvar-atualizar').show();
                $('#modal-fornecedor').modal('show');
            }
        });
    })

    //Gravando alteração
    $('#btn-salvar-atualizar').on('click', function(){
        var url_ajax = '<?= URL_BASE ?>/Fornecedores/Atualizar/Gravar';
        $.ajax({
            url: url_ajax,
            type: 'POST',
            data: $('#form-fornecedor').serialize(),
            dataType: 'json',
            success: function(dados){
                // Update CSRF hash
                $('[name="CSRF_token"]').val(dados.token);
                if(dados.status){
                    alert('Usuário alterado com sucesso');
                } else {
                    alert('Erro:' + dados.erro);

                }
            },
            error:function(){
            alert('Ocorreu um erro');
        }
            

        })
    })
    
})

</script>