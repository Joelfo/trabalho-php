<h1>Atualizar fornecedor</h1>
<form action="" id="form-fornecedor" method="POST">
    <div class="form-group">
        <label for="razao-social">Razão Social</label>
        <input type="text" class="form-control" id="razao-social" name="razao_social"> 
    </div>
    <div class="form-group">
        <label for="cnpj">Cnpj</label>
        <input type="text" class="form-control" id="cnpj" name="cnpj"> 
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
    <button type="submit" class="btn btn-primary">Enviar</button>             
</form> 