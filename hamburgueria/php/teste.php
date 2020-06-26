<?php
$nome = "Angelo";
$sobrenome = "Ferreira";
$idade = 90;
$texto = "Meu nome é {$nome}%0a {$sobrenome} e tenho {$idade} anos.";
$texto .= "%0a {$nome} %0a";
$texto .= "%0a {$idade} %0a";
echo $texto;
?>

<a href="https://api.whatsapp.com/send?phone=+5516981047847&text=<?php echo $texto?>">LINK</a>
