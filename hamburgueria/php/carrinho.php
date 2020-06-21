<!-- Tem outro tipo de conexão com banco nessa página, sem ser a conexão usada no banco.php -->

<?php
session_start();
require_once 'header.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>
<?php
if(isset($_SESSION['itens'])==NULL){
    $_SESSION['itens'] = array();

}
    


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
    echo '<center>Carrinho vazio<br><a href="index.php">Adicionar itens</a><center/>';
}else{
    $conexao = new PDO('mysql:host=localhost;dbname=hamburguer',"JONAS","123456");
    
    echo('
    <div class="container">
        <div>
            <table class="table">
                    <tr>
                        <th>Nome</th>
                        <th>Preco</th>
                        <th>Descricao</th>
        <div/>           
    <div/>
    ');
    foreach($_SESSION['itens'] as $idProduto => $quantidade){    
        $select = $conexao->prepare("SELECT * FROM produtos WHERE produto_codigo=?");
        $select->bindParam(1,$idProduto);
        $select->execute();
        $produtos = $select->fetchAll();
        

        echo
        // $produtos[0]["produto_nome"].'<br/>';
            '
            <tr>
            <td width="70">'.$produtos[0]["produto_nome"].' </td>
            <td width="200">'.$produtos[0]["produto_preco"].' </td>
            <td>'.$produtos[0]["produto_descricao"].'</td>
            
            
        </tr>';
        }
        // <td>' .$produtos[0]["produto_descricao"].'</td>
}
    



?>
</body>