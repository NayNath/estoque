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
        if(!is_numeric($quantidade) || $quantidade<=0){
            return false;
        }
    }
    return true; 
}
function validarProduto($produtos){
    foreach($produtos as $produto){
        if(preg_match('/\d/', $produto)|| strlen($produto) < 2){
            return false;
        }
    }
    return true; 
}
function somaEstoque($quantidades, $produtos){
    $totais = [];
    for ($i = 0; $i < count($produtos); $i++) {
        $produtoMinusculo = mb_strtolower($produtos[$i]);
        $soma = 0;

        if (is_array($quantidades[$i])) {
            foreach ($quantidades[$i] as $quantidade) {
                $soma += $quantidade;
            }
        } else {
            if ($quantidades[$i]) {
                $soma = $quantidades[$i];
            }
        }
        if (!isset($totais[$produtoMinusculo])) {
            $totais[$produtoMinusculo] = ['nome_original' => $produtos[$i], 'totalQuant' => 0];
        }
        $totais[$produtoMinusculo]['totalQuant'] += $soma;
    }
    foreach ($totais as $info) {
        $produto = $info['nome_original'];
        echo "<p>Produto: ".$produto."<p/>".
                "<p>Quantidade em estoque: ". $info['totalQuant']."<p/>";
    }
    return $totais;
}

$estoque = [
    'produto' => $_GET["produto"],
    'filial' => $_GET["filial"],
    'quantidade' => $_GET["quantidade"],
];
if(validarEntradas($estoque)==true){
    if(validarQuantidade($estoque['quantidade']) == true && validarProduto($estoque['produto'])==true){
        echo somaEstoque($estoque['quantidade'], $estoque['produto']);
        
    }else{
        header("Location:../index.html");
    }
}
else{
    header("Location:../index.html");
}



?>