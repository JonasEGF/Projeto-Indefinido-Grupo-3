<?php
require_once 'banco.php';
require_once 'adm_header.php';
$sql = "SELECT * FROM produtos";
$resultado = mysqli_query($database,$sql);
?>
<style>
    .contente{
        height: 100%;
        width: 65.5%;
        display: flex;
        justify-content: center;
        flex-direction: row;
        background-color: transparent;
    }
    .amendoim{
        align-items: center;
        display: flex;
        justify-content: center;
        /* background-image: url("https://ctl.s6img.com/society6/img/f9SdQ5IGJf7zHnaTyE_YG9ELB9k/w_1500/coffee-mugs/swatch/~artwork,fw_4600,fh_2000,iw_4600,ih_2000/s6-0076/a/30487614_11407769/~~/graphic-seamless-pattern-bright-tasty-burgers-on-a-dark-background-mugs.jpg"); */
    }
</style>
<body>
    <div class="container">
        <div>
            <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th width="35px">Codigo</th>
                <th width="190px">Nome</th>
                <th width="150px">Preco</th>
                <th width="500px">Descricao</th>
                <th >Imagem</th>
            </tr>
            </thead>     
        <?php
        while($produtos = mysqli_fetch_assoc($resultado)):
        ?>
            <tr>
                <th width="35px"><?= $produtos['produto_codigo'] ?></th>
                <th width="190px"><?= $produtos['produto_nome'] ?></th>
                <th><?= $produtos['produto_preco'] ?></th>
                <th width="500px"><?= $produtos['produto_descricao'] ?></th>
                <th><img height="50px"src="<?php echo $produtos['produto_imagem']?>"></th>
            </tr>
        <?php endwhile; ?>
            </table>  
    </div>     
</body>