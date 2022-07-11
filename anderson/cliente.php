<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
   <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> 

</head>
<body>
 <h1>Lista de Clientes</h1>

    <?php
        /* Codificação UTF-8 */
        ini_set('default_charset', "utf-8");

        include "clientesFunctions";

        ListarClientes();  
          
    ?> 

   
      <form action="cadastrarFuncionario.php" method="post">
        <fieldset>
            <legend>Cadastro de Cliente</legend>
            <table>
            <tr>
                <td> <label for="">Nome</label>            </td>
                <td><input type="text" name="nome" id=""></td>
            </tr>
            <tr>
                <td><label for="">CPF</label></td>
                <td><input type="text" name="cpf"></td>
                <td></td>
            </tr>
            <tr>
                <td><label for="">Endereço</label></td>
                <td><input type="text" name="endereco"></td>
                <td></td>
            </tr>
            <tr>
                <td><label for="">Bairro</label></td>
                <td><input type="text" name="bairro"></td>
                <td></td>
            </tr>
            <tr>
                <td><label for="">Cidade</label></td>
                <td><input type="text" name="cidade"></td>
                <td></td>
            </tr>
            <tr>
                <td><label for="">UF</label></td>
                <td><input type="text" name="uf"></td>
                <td></td>
            </tr>
            <tr>
                <td><label for="">CEP</label></td>
                <td><input type="text" name="cep"></td>
                <td></td>
            </tr>
            <tr>
                <td><label for="">Telefone</label></td>
                <td><input type="text" name="telefone"></td>
                <td></td>
            </tr>
            <tr>
                <td><label for="">Email</label></td>
                <td><input type="text" name="email"></td>
                <td></td>
            </tr>
            <tr><td><button type="submit">Enviar</button></td></tr>
    

        </table>
        </fieldset>
    </form>
</body>
</html>