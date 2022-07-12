<h1>Dashboard do Vendedor</h1>
<div class="row">
    <div class="card" style="width:280px">
        <img class="card-img-top" style="height:280px" src="<?php echo URL_IMG ?>img_avatar1.png" alt="imagem do funcionário">
        <div class="card-body">
            <h4 class="card-title"><?= htmlentities(utf8_encode($_SESSION['nome_usuario'])) ?></h4>
            <p class="card-text">Bem vindo!</p>    
        </div>
    </div>
    <div class="card mt-3 border-0">
        <div class="card-body px-2">
            <a href="<?= URL_BASE . "/Cliente" ?>" class="btn btn-primary">Clientes</a>
            <a href="<?= URL_BASE . "/Venda" ?>" class="btn btn-primary">Vendas</a>
            <a href="<?= URL_BASE . "/Cadastrar_venda" ?>" class="btn btn-success">Cadastrar Venda</a>
        </div>
    </div>
</div>
