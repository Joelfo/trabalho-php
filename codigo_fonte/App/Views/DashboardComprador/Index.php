<h1>Dashboard do Comprador</h1>
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
            <a href="<?= URL_BASE . "/Fornecedor" ?>" class="btn btn-primary">Fornecedores</a>
            <a href="<?= URL_BASE . "/Categorias_de_produto" ?>" class="btn btn-primary">Categorias de produto</a>
            <a href="<?= URL_BASE . "/Compra" ?>" class="btn btn-primary">Compras</a>
            <a href="<?= URL_BASE . "/Produto" ?>" class="btn btn-primary">Gerenciar rodutos</a>
            <a href="<?= URL_BASE . "/Cadastrar_compra" ?>" class="btn btn-success">Realizar compra</a>
            
        </div>
    </div>
</div>
