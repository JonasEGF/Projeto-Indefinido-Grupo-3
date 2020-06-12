<?php 
$produto_codigo = filter_input(INPUT_POST,'produto_codigo',FILTER_DEFAULT);
$produto_nome   = filter_input(INPUT_POST,'produto_nome',FILTER_DEFAULT);
$produto_preco  = filter_input(INPUT_POST,'produto_preco',FILTER_DEFAULT);
$produto_descricao  = filter_input(INPUT_POST,'produto_descricao',FILTER_DEFAULT);

$imagem = $_FILES['imagem']['name'];
move_uploaded_file($_FILES['imagem']['tmp_name'],'./images'.$imagem);

$sql = "INSERT INTO atividades (*) VALUES (?,?,?,?)";
$rs = mysqli_prepare($database,$sql);
mysqli_stmt_bind_param($rs,'isdss',$titulo,$data,$descricao,$imagem);

mysqli_stmt_execute($rs);

?>