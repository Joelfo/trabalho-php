<?php

    


    //Função  que  lista  todos  os  produtos
   function ListarProdutos(){
    $mysqli = new mysqli("localhost","eunota10@gmail.com","594021","loja");
   $sql= "Select * from  produtos";
   $result= $mysqli->query($sql);

  echo (" <table>
       <tr>
           <td>ID</td>
           <td>Nome</td>
           <td>Preço</td> 
       </tr>");
       
           while($dado = $result->fetch_array(MYSQLI_ASSOC) ){ // coloca o  resultado da  query  em um array com  nome  da  coluna

               // O  if  verifica  se o produto esta  liberado para compra.
               if($dado["liberado_venda"] == "S"){  
                
                // caso liberado a  linha  e acrescentada  com as devidas  colunas
                echo( "<tr>
                    <td>".$dado["id"]." </td>
                    <td>'".  $dado["nome_produto"]." </td>
                    <td>". $dado["preco_venda"]." </td>                    
                </tr> ");
               }                   
            }
        }
     
    //Cadastrar funcionario
     
     function CadastrarFuncionario($id,$nome,$cpf,$senha,$papel){
        $mysqli = new mysqli("localhost","eunota10@gmail.com","594021","loja");
       $sql= "INSERT INTO funcionarios (id, nome, cpf, senha, papel) VALUES ($id,'$nome',$cpf,$senha,$papel)";
      

       if ($mysqli->query($sql) === TRUE) {
        echo "Funcionario adicionado";
      } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
      }
    }

    CadastrarFuncionario(10,"fabio", 658787, 5955, 03);

     //Excluir funcionario
     
     function ExcluirFuncionario($id){
        $mysqli = new mysqli("localhost","eunota10@gmail.com","594021","loja");
       $sql= "Delete from  funcionarios  where id = $id";
      

       if ($mysqli->query($sql) === TRUE) {
        echo "Funcionario excluido";
      } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
      }
    }

    

    function AtualizarFuncionario($id,$nome,$cpf,$senha,$papel){
        $mysqli = new mysqli("localhost","eunota10@gmail.com","594021","loja");
       $sql= "UPDATE funcionarios SET nome = $nome, cpf = $cpf, senha = $senha, papel = $papel WHERE funcionarios.id = $id ";
      

       if ($mysqli->query($sql) === TRUE) {
        echo "Dados de  funcionario atualizado";
      } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;    
      }
    }

    

    //Cadastrar Cliente
     
    function CadastrarCliente($nome, $cpf, $endereco, $bairro, $cidade, $uf, $cep, $telefone, $email){
        $mysqli = new mysqli("localhost","eunota10@gmail.com","594021","loja");
       $sql= "INSERT INTO clientes (nome, cpf, endereco, bairro, cidade, uf, cep, telefone, email) 
       VALUES ('$nome', $cpf, '$endereco', '$bairro', '$cidade', '$uf', $cep, $telefone, '$email')";
      

       if ($mysqli->query($sql) === TRUE) {
        echo "Cliente adicionado";
      } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
      }
    }

    CadastrarCliente("Maria", 7627687987, "hhh", "goigyg", "fiufiut", "gg", 12345678, "77676", "gygoyg");
   
?>