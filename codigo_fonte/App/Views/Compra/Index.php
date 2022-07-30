<h1>Lista de compras</h1>
<button id="btn-incluir" class="btn btn-success">Novo</button>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Quantidade da Compra</th>
            <th>Data da Compra</th>
            <th>Valor da Compra</th>
            <th>Nome do Fornecedor</th>
            <th>CNPJ</th>
            <th>Nome do Produto</th>
            <th>Valor Unitário</th>
            <th>Nome do Funcionario</th>
            <th>CPF</th>
        </tr>
    </thead>
    <tbody name="conteudo-tabela" id="conteudo-tabela">
        
    </tbody>
</table>


<!-- MODAL -->
<div id="modal-categoria" class="modal fade" tabindex="-1" role="dialog" data-bs-backdrop="static" aria-labelledby="modal-fornecedor-title" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="modal-fornecedor-title">Dados do Fornecedor</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
        </div>
        <div class="modal-body">
            <form action="#" id="form-compra" method="GET">
                <div class="form-group">
                    <label for="quantidade-compra">Quantidade da Compra</label>
                    <input type="text" class="form-control" id="quantidade-compra" name="quantidade-compra"> 
                </div>
                <div class="form-group">
                    <label for="cnpj-fornecedor">Fornecedor</label>
                    <input class="form-control" list="fornecedores" id="cnpj-fornecedor" name="cnpj-fornecedor">
                    <datalist id="fornecedores">
                        <?php
                        foreach($dados['fornecedores'] as $fornecedor){
                            echo "<option value=\"" . $fornecedor['cnpj'] . "\">";
                        } 
                        ?>
                    </datalist> 
                </div>
                <div class="form-group">
                    <label for="nome-produto">Produto</label>
                    <input class="form-control" list="produtos" id="nome-produto" name="nome-produto">
                    <datalist id="produtos">
                        <?php
                        foreach($dados['produtos'] as $produto){
                            echo "<option value=\"" . $produto['nome_produto'] . "\">";
                        } 
                        ?>
                    </datalist> 
                </div>
                <div class="form-group">
                    <label for="cpf-funcionario">Funcionario</label>
                    <input class="form-control" list="funcionarios" id="cpf-funcionario" name="cpf-funcionario">
                    <datalist id="funcionarios">
                        <?php
                        foreach($dados['funcionarios'] as $funcionario){
                            echo "<option value=\"" . $funcionario['cpf'] . "\">";
                        } 
                        ?>
                    </datalist> 
                </div>
                <input type="hidden" id="token-csrf" name="token-csrf" value="">
                <input type="hidden" id="id-compra" name="id-compra" value="">                
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            <!-- A aparição dos botões é alternada dinamicamente pelo JavaScript(JQuery) -->
            <button type="button" class="btn btn-success" id="btn-salvar-incluir">Incluir</button>
            <button type="button" class="btn btn-success" id="btn-salvar-atualizar" style="display:none">Atualizar</button>
        </div>
    </div>

</div>
</div>  
