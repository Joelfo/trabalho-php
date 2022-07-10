<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php

   // função para  listar todos  os  funcionarios

function ListarFuncionarios(){
  $mysqli = new mysqli("localhost","root","","estoque");
 $sql= "Select * from  funcionarios";
 $result= $mysqli->query($sql);

echo (" <table>
     <tr>
         <td>ID</td>
         <td>Nome</td>
         <td>CPF</td> 
         <td>Senha</td>
         <td>Papel</td>
         <td></td>
         <td></td>
     </tr>");
     
         while($dado = $result->fetch_array(MYSQLI_ASSOC) ){ // coloca o  resultado da  query  em um array com  nome  da  coluna                         
              echo( "<tr>
                  <td>".$dado["id"]." </td>
                  <td>'".  $dado["nome"]." </td>
                  <td>". $dado["CPF"]." </td>
                  <td>". $dado["Senha"]." </td>
                  <td>". $dado["Papel"]." </td>                      
                  <td>Editar</td>
                  <td>Excluir</td>                  
              </tr> ");

             }                   
          
      } 



//Cadastrar funcionario
 
 function CadastrarFuncionario($id,$nome,$cpf,$senha,$papel){
    $mysqli = new mysqli("localhost","root","","estoque");
   $sql= "INSERT INTO funcionarios (id, nome, cpf, senha, papel) VALUES ($id,'$nome',$cpf,$senha,$papel)";
  

   if ($mysqli->query($sql) === TRUE) {
    echo "Funcionario adicionado";
  } else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
  }
}



 //Excluir funcionario
 
 function ExcluirFuncionario($id){
    $mysqli = new mysqli("localhost","root","","estoque");
   $sql= "Delete from  funcionarios  where id = $id";
  

   if ($mysqli->query($sql) === TRUE) {
    echo "Funcionario excluido";
  } else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
  }
}



function AtualizarFuncionario($id,$nome,$cpf,$senha,$papel){
    $mysqli = new mysqli("localhost","root","","estoque");
   $sql= "UPDATE funcionarios SET nome = $nome, cpf = $cpf, senha = $senha, papel = $papel WHERE funcionarios.id = $id ";
  

   if ($mysqli->query($sql) === TRUE) {
    echo "Dados de  funcionario atualizado";
  } else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;    
  }
}





?>
</body>
</html>