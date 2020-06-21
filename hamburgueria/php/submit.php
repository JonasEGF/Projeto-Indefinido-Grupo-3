<?php
    require_once "adm_header.php";
    require_once "insert.php";
    require_once "banco.php";


?>
<style>
    .carta{
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
</style>
<div class="container">
    <br>
    <div class="card">
        <div class="container">        
        <div >
            
            <br>
            <form action="insert.php"   method="post" enctype="multipart/form-data" >
                <div class="form-group row" >
                <label for="Nome" class="col-sm-2 col-form-label">CODIGO</label>
                <input type="text"  name="produto_codigo" id="produto_codigo">
                </div>

                <div class="form-group row">
                <label for="Nome" class="col-sm-2 col-form-label">NOME</label>
                <input type="text"  name="produto_nome" id="produto_nome">
                </div>

                <div class="form-group row">
                <label for="Nome" class="col-sm-2 col-form-label">PRECO</label>
                <input type="text"  name="produto_preco" id="produto_preco">
                </div>

                <div class="form-group row">
                <label for="Nome" class="col-sm-2 col-form-label">DESCRICAO</label>
                <input type="text"  name="produto_descricao" id="produto_descricao">
                </div>

                <div class="form-group row">
                <label for="imagem" class="col-sm-2 col-form-label">IMAGEM</label>
                <input type="file"  class="form-control-file" name="imagem" id="imagem">
                </div>

                <div class="form-group row">
                <button type="submit" class="btn btn-primary">ENVIAR</button>   
                </div>
            </form>
        </div>
        </div>
    
    </div>
    
</div>