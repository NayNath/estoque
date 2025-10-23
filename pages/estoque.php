<?php
function validarEntradas($estoque){
    foreach($estoque as $valor){
        if(empty($valor)){
            return false;
        }
    }
    return true;
}
function validarQuantidade($estoque,$quantidade){
    if(!is_int($quantidade) && $quantidade<=0){
        return false;
    }
    elseif(validarEntradas($estoque)){
        return true; 
    }
}

$estoque = [
    "produto" => [$_GET["produto"]],
    "filial"=> [$_GET["filial"]],
    "quantidade" => [$_GET["quantidade"]],
];



if(validarQuantidade($estoque,$estoque["quantidade"]) == true){
    echo "campos certos";
}
else{
    header("Location:../index.html");
}
?>