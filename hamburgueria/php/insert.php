<?php 
require_once "banco.php";
$produto_codigo = filter_input(INPUT_POST,'produto_codigo',FILTER_DEFAULT);
$produto_nome   = filter_input(INPUT_POST,'produto_nome',FILTER_DEFAULT);
$produto_preco  = filter_input(INPUT_POST,'produto_preco',FILTER_DEFAULT);
$produto_descricao  = filter_input(INPUT_POST,'produto_descricao',FILTER_DEFAULT);

if($_POST){
    $imagem_name = $_FILES['imagem']['name'];
    $imagem_tmp = $_FILES['imagem']['tmp_name'];
    $path = '../images/'.$imagem_name;
    move_uploaded_file($imagem_tmp, $path);
}

$sql = "INSERT INTO produtos (produto_codigo,produto_nome,produto_preco,produto_descricao,produto_imagem) VALUES (?,?,?,?,?)";
$rs = mysqli_prepare($database,$sql);
mysqli_stmt_bind_param($rs,'isdss',$produto_codigo,$produto_nome,$produto_preco,$produto_descricao,$path);
mysqli_stmt_execute($rs);


?>