<?php

//Função  que  lista  todos  os  produtos
function ListarProdutos(){
    $mysqli = new mysqli("localhost","root","","estoque");
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
     




?>