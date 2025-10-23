<?php
function validarEntradas($estoque){
    foreach($estoque as $valor){
        if(empty($valor)){
            return false;
        }
    }
    return true;
}
function validarQuantidade($quantidades){
    foreach($quantidades as $quantidade){
        if(!is_int($quantidade) && $quantidade<=0){
            return false;
        }
    }
    return true; 

}
$estoque = [
    'produto' => $_GET["produto"],
    'filial' => $_GET["filial"],
    'quantidade' => $_GET["quantidade"],
];
if(validarEntradas($estoque)==true){
    if(validarQuantidade($estoque['quantidade']) == true /*&& validarProduto($estoque,$produto)==true*/){
        echo "campos certos";
    }else{
        header("Location:../index.html");
    }
}
else{
    header("Location:../index.html");
}
?>