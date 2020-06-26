<!-- Tem outro tipo de conexão com banco nessa página, sem ser a conexão usada no banco.php -->

<?php
session_start();
require_once 'header.php';
$pedido = "";
$total = 0;
$nomedocara = 'Joao';
$pedidos = "Olá {$nomedocara}, seu pedido no Bife Real Burguer (vulgo BRB) é: ";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<style>
    .totalzinho{
        display: flex;
        flex-direction: row-reverse;
        font-family: Arial, Helvetica, sans-serif;
    }
</style>

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
    echo '<meta HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php">';
}
if(count($_SESSION['itens']) == 0){
    echo '<center>Carrinho vazio<br><a href="index.php">Adicionar itens</a><center/>';
}else{
    $conexao = new PDO('mysql:host=localhost;dbname=hamburguer',"root","");
    
    echo('
    <div class="container">
        <div>
            <table class="table table-bordered table-striped">
                    <tr>
                        <th>Nome</th>
                        <th>Preco</th>
                        <th>Descricao</th>
                        <th>Quantidade</th>
                        <th></th>
    ');

    foreach($_SESSION['itens'] as $idProduto => $quantidade){    
        $select = $conexao->prepare("SELECT * FROM produtos WHERE produto_codigo=?");
        $select->bindParam(1,$idProduto);
        $select->execute();
        $produtos = $select->fetchAll();
        $total += $quantidade * $produtos[0]["produto_preco"];
        $pedido = "{$produtos[0]["produto_nome"]}  (x{$quantidade}) - R$ {$produtos[0]["produto_preco"]}"; 
        $pedidos .= "%0a {$pedido}";
        echo
            '
        <tr>
        
            <td width="70px">'.$produtos[0]["produto_nome"].' </td>
            <td width="50px">'.number_format($produtos[0]["produto_preco"],2,",",".").' </td>
            <td width="100px">'.$produtos[0]["produto_descricao"].'</td>
            <td width="50px">'.$quantidade.'</td>
            <td width="30px"><a type="button" href="remover.php?remover=carrinho&id=' .$idProduto.'"  class="btn btn-danger">X</a></td>
            
            
        </tr>
        '
        ;
    }
        
}
    if(!isset($total)){
        $total = 0;
        echo 
        '</table>
            <div class="totalzinho">
                <center><h1>Carrinho Vazio</h1></center>
            </div>
        <div/>
    <div/>';
    }?>
            </table>
                <div class="totalzinho">
                    <h1><?php echo number_format($total,2,",",".")?></h1>
                </div>
                <div class="totalzinho">
                <?php $pedidos .= "%0a Valor total a pagar: R$ {$total}";?>
                <a type="button" class="btn btn-success" href="https://api.whatsapp.com/send?phone=+5516999999999&text=<?php echo $pedidos?>">Comprar</a>
                </div>
        </div>           
    </div>
</body>