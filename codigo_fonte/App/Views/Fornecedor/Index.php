<h2>Lista de fornecedores</h2>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Razão Social</th>
            <th>Cnpj</th>
            <th>Endereço</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>UF</th>
            <th>CEP</th>
            <th>Telefone</th>
            <th>E-Mail</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody name="conteudo-tabela" id="conteudo-tabela">
        
    </tbody>
</table>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-fornecedor">Open modal</button>
<div id="modal-fornecedor" class="modal fade" tabindex="-1" role="dialog" data-bs-backdrop="static" aria-labelledby="modal-fornecedor-title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modal-fornecedor-title">Dados do Fornecedor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= URL_BASE ?>/Fornecedores/Gravar/Atualizacao" id="form-fornecedor" method="POST">
                    <div class="form-group">
                        <label for="razao-social">Razão Social</label>
                        <input type="text" class="form-control" id="razao-social" name="razao-social"> 
                    </div>
                    <div class="form-group">
                        <label for="cnpj">Cnpj</label>
                        <input type="text" class="form-control" id="cnpj" name="cnpj"> 
                    </div>
                    <div class="form-group">
                        <label for="cnpj">Endereço</label>
                        <input type="text" class="form-control" id="endereco" name="endereco"> 
                    </div>
                    <div class="form-group">
                        <label for="bairro">Bairro</label>
                        <input type="text" class="form-control" id="bairro" name="bairro"> 
                    </div>
                    <div class="form-group">
                        <label for="cidade">Cidade</label>
                        <input type="text" class="form-control" id="cidade" name="cidade"> 
                    </div>
                    <div class="form-group">
                        <label for="uf">UF</label>
                        <input type="text" class="form-control" id="uf" name="uf"> 
                    </div>
                    <div class="form-group">
                        <label for="cep">CEP</label>
                        <input type="text" class="form-control" id="cep" name="cep"> 
                    </div>
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control" id="telefone" name="telefone"> 
                    </div>
                    <div class="form-group">
                        <label for="email">E-Mail</label>
                        <input type="text" class="form-control" id="email" name="email"> 
                    </div>

                    <input type="hidden" id="token-csrf" name="token-csrf" value="">
                    <input type="hidden" id="id-fornecedor" name="id-fornecedor" value="">                
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" id="btn-salvar">Salvar</button>
            </div>
        </div>

    </div>
</div>  

</body>
</html>
