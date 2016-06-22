<?php

require_once 'model/produtoDao.php';

$idCarrinho = (!isset($_GET['carrinho'])) ? 8 : $_GET['carrinho'];
$referencia = rtrim($_GET['referencia'], ',');

$produtos = $objProdutoDao->listaProdutosDetalheCarrinho($idCarrinho, $referencia);
//$produtos = json_decode($_GET['produtos']);

foreach ($produtos as $produto) {
    $caminhoFotos = '../back/images/produto/' . $produto['idProduto'];
    $fotos = array();
    $opcoes = explode(',', $produto['opcoes']);
    $variacoes = explode(',', $produto['variacoes']);

    if (is_dir($caminhoFotos) > 0) {

        $ponteiro = scandir($caminhoFotos);
        foreach ($ponteiro as $listar) {
            if ($listar != "." && $listar != "..") {
                $fotos[] = $listar;
            }
        }
    }

    echo '
        <div class="i-produto">
            <div class="img-produto">
                <img src="' . $caminhoFotos . '/' . $fotos[0] . '" alt="" />
            </div>
            <p>' . $produto["nome"] . '</p>';


    for ($i = 0; $i < count($opcoes); $i++) {
        echo '<strong>' . $opcoes[$i] . ':</strong>';

        echo ' ' . $variacoes[$i].'<br />';
    }
    
    echo '</div>';
}