<h1>Lista de produtos</h1>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço de Compra</th>
            <th>Preço de Venda</th>
            <th>Quantidade Disponível</th>
            <th>Liberado Para Venda</th>
            <th>Categoria</th>
        </tr>
    </thead>
    <tbody name="conteudo-tabela" id="conteudo-tabela">
        
    </tbody>
</table>

<!-- MODAL -->
<div id="modal-opcoes" class="modal fade" tabindex="-1" role="dialog" data-bs-backdrop="static" aria-labelledby="modal-fornecedor-title" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="modal-fornecedor-title">Dados do Fornecedor</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
        </div>
        <div class="modal-body">
            <form action="#" id="form-produto" method="GET">
                <input type="hidden" id="token-csrf" name="token-csrf" value="">
                <input type="hidden" id="id-produto" name="id-produto" value="">                
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            <!-- A aparição dos botões é alternada dinamicamente pelo JavaScript(JQuery) -->
            <button type="button" class="btn btn-success" id="btn-liberar-venda">Liberar Venda</button>
            <button type="button" class="btn btn-success" id="btn-bloquear-venda">Bloquear Venda</button>
        </div>
    </div>

</div>
</div>  