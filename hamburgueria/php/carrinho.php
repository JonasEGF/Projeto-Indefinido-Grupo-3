<?php
session_start();
require_once 'header.php';

    

if(!isset($_SESSION['itens'])){

}
    $_SESSION['itens'] = array();


if(isset($_GET['add']) && $_GET['add'] == "carrinho")
{
    $idProduto = $_GET['id'];
    if(!isset($_SESSION['itens'][$idProduto]))
    {
        $_SESSION['itens'][$idProduto] = 1;
    }else{
        $_SESSION['itens'][$idProduto] += 1;
    }
}
if(count($_SESSION['itens']) == 0){
    echo 'Carrinho vazio<br><a href="index.php">Adicionar itens</a>';
}else{
    $conexao = new PDO('mysql:host=localhost;dbname=hamburguer',"JONAS","123456");
    
    foreach($_SESSION['itens'] as $idProduto => $quantidade){    
        $select = $conexao->prepare("SELECT * FROM produtos WHERE produto_codigo=?");
        $select->bindParam(1,$idProduto);
        $select->execute();
        $produtos = $select->fetchAll();

        echo
        $produtos[0]["produto_nome"].'<br/>';
            '
            <tr>
            <td width="70">'.$produtos[0]["produto_codigo"].' </td>
            <td width="200">'.$produtos[0]["produto_nome"].' </td>
            <td>'.$produtos[0]["produto_preco"].'</td>
            <td>' .$produtos[0]["produto_descricao"].'</td>
            
        </tr>';
        }

}




?>
