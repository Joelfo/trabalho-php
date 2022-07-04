<form method="post" action="<?= URL_BASE . "/logar" ?>">
    <div class="form-group">
        <label for="cpf">CPF</label>
    <input type="text" class="form-control" id="cpf" name="cpf" aria-describedby="emailHelp" placeholder="Digite seu email">
        <small id="emailHelp" class="form-text text-muted"> Já cadastrado: 249.252.810-38</small>
    </div>

    <div class="form-group">
        <label for="senha">Senha</label>
        <input type="password" class="form-control" id="senha" name="senha" aria-describedby="senhaHelp" placeholder="Digite sua senha">
        <small id="senhaHelp" class="form-text text-muted"> Já cadastrado: 111</small>
    </div>
    <button type="submit" class="btn btn-secondary">Login</button>
</form>