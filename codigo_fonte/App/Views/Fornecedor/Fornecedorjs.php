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
                $('#modal-fornecedor').modal('show');
            }
        });
        
        $('#btn-salvar').on('click', function(){
            var url_ajax = '<?= URL_BASE ?>/Fornecedores/Gravar/Atualizacao';
            $.ajax({
                url: url_ajax,
                type: 'POST',
                data: $('#form-fornecedor').serialize(),
                dataType: 'JSON',
                success: function(dados){
                    // Update CSRF hash
                    //$('[name="CSRF_token"]').val(dados.token);
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
    });
})

</script>