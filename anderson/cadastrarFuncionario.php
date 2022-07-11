
    <?php

    include ("clientesFunctions"); // arquivo que contem  as  operações referente ao  clientes
    
    // Pegando os  valores  provenientes do metodo POST
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $endereco = $_POST["endereco"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $uf = $_POST["uf"];
    $cep = $_POST["cep"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];   

    //Query para  cadastrar os  clientes
    CadastrarCliente($nome, $cpf, $endereco, $bairro, $cidade, $uf, $cep, $telefone, $email);
    
    ?>
