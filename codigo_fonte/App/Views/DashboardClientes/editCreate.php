<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/css/index.css">
    <title>Clientes</title>
</head>
<body>
    <a class="button btn-back" href="index.php">Back</a>
    <h1>Clients config</h1>
    <div class="content">
        <form action="index.php" method="POST">

            <div class="input-box">
                <label for="nome">Nome:</label>
                <input class="input" type="text" placeholder="Escreva o nome aqui" value="<?= isset($resultData[0]['nome']) ? $resultData[0]['nome'] : '' ?>" name="nome" required>
            </div>

            <br><br>
            <div class="input-box">
            <label for="cpf">CPF:</label>
                <input class="input" type="text" placeholder="Digite CPF" value="<?= isset($resultData[0]['cpf']) ? $resultData[0]['cpf'] : '' ?>" name="cpf" required>
            </div>

            <br><br>
            <div class="input-box">
            <label for="endereco">endereço:</label>
                <input class="input" type="text" placeholder="Digite o endereço" value="<?= isset($resultData[0]['endereco']) ? $resultData[0]['endereco'] : '' ?>" name="endereco" required>
            </div>

            <br><br>
            <div class="input-box">
            <label for="bairro">Bairro:</label>
                <input class="input" type="text" placeholder="Digite o bairro" value="<?= isset($resultData[0]['bairro']) ? $resultData[0]['bairro'] : '' ?>" name="bairro" required>
            </div>

            <br><br>
            <div class="input-box">
            <label for="cidade">Cidade:</label>
                <input class="input" type="text" placeholder="Digite a cidade" value="<?= isset($resultData[0]['Cidade']) ? $resultData[0]['Cidade'] : '' ?>" name="Cidade" required>
            </div>

            <br><br>
            <div class="input-box">
            <label for="cep">CEP:</label>
                <input class="input" type="text" placeholder="Digite CEP" value="<?= isset($resultData[0]['cep']) ? $resultData[0]['cep'] : '' ?>" name="cep" required>
            </div>

            <br><br>
            <div class="input-box">
            <label for="uf">UF:</label>
                <input class="input" type="text" placeholder="Digite CPF" value="<?= isset($resultData[0]['uf']) ? $resultData[0]['uf'] : '' ?>" name="uf" required>
            </div>


            <br><br>
            <div class="input-box">
                <label for="telefone">telefone:</label>
                <input class="input" type="number" placeholder="Digite o telefone" value="<?= isset($resultData[0]['telefone']) ? $resultData[0]['telefone'] : '' ?>" name="telefone" required>
            </div>

            <br><br>
            <div class="input-box">
                <label for="email">Email:</label>
                <input class="input" type="email" placeholder="Digite o email" value="<?= isset($resultData[0]['email']) ? $resultData[0]['email'] : '' ?>" name="email" required>
            </div>

            <br><br>
            


            
            
                
            

            <br><br>
            <input type="hidden" name="a" value="<?= isset($resultData[0]['id']) ? 'edit' : 'new' ?>">
            <input type="hidden" name="id" value="<?= isset($resultData[0]['id']) ? $resultData[0]['id'] : '' ?>">
            <input class="button btn-search" type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>
</html>