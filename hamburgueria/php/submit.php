<?php
    require_once "insert.php";
    require_once "banco.php";

?>
<form action="insert.php"   method="post" enctype="multipart/form-data" >
    <label for="Nome">CODIGO</label>
    <input type="text"  name="produto_codigo" id="produto_codigo">
    <br>
    <label for="Nome">NOME</label>
    <input type="text"  name="produto_nome" id="produto_nome">
    <br>
    <label for="Nome">PRECO</label>
    <input type="text"  name="produto_preco" id="produto_preco">
    <br>
    <label for="Nome">DESCRICAO</label>
    <input type="text"  name="produto_descricao" id="produto_descricao">
    <br>
    <label for="imagem">Imagem</label><br>
    <input type="file"  name="imagem" id="imagem"><br>
    <br>
    <input type="submit" value="save">
</form>