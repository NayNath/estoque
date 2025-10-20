<?php
function validarEntradas($estoque){
    foreach($estoque as $valor){
        if(!empty($valor)){
            return true;
        }
    }
}

$estoque = [
    "produto" => [$_GET["produto"]],
    "filial"=> [$_GET["filial"]],
    "quantidade" => [$_GET["quantidade"]],
];

if(validarEntradas($estoque)== true){
    echo "campos certos";
}else{
    header("Location:../index.html");
}
?>