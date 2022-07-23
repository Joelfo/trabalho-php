<script>
function listaCategorias(){
    $.ajax({
        url: '<?= URL_BASE ?>/Categorias/Listar',
        type: 'GET',
        dataType: 'json',
        success:function(respostaJson){
            $('#conteudo-tabela').append(respostaJson.corpo_tabela);
        }
    })
}

</script>