<h1>Lista de categorias</h1>
<button id="btn-incluir" class="btn btn-success">Novo</button>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Nome</th>
        </tr>
    </thead>
    <tbody name="conteudo-tabela" id="conteudo-tabela">
        
    </tbody>
    <!--MODAL-->
    <div id="modal-categoria" class="modal fade" tabindex="-1" role="dialog" data-bs-backdrop="static" aria-labelledby="modal-fornecedor-title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modal-fornecedor-title">Dados do Fornecedor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
            </div>
            <div class="modal-body">
                <form action="#" id="form-categoria" method="GET">
                    <div class="form-group">
                        <label for="razao-social">Nome da Categoria</label>
                        <input type="text" class="form-control" id="nome-categoria" name="nome-categoria"> 
                    </div>

                    <input type="hidden" id="token-csrf" name="token-csrf" value="">
                    <input type="hidden" id="id-categoria" name="id-categoria" value="">                
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <!--A aparição dos botões é alternada dinamicamente pelo JavaScript -->
                <button type="button" class="btn btn-success" id="btn-salvar-incluir">Incluir</button>
                <button type="button" class="btn btn-success" id="btn-salvar-atualizar" style="display:none">Atualizar</button>
            </div>
        </div>

    </div>
</div>  

</table>