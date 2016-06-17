<?php
require_once 'model/produtoDao.php';

$idCarrinho = (!isset($_GET['carrinho'])) ? 8 : $_GET['carrinho'];

$produtos = $objProdutoDao->listaProdutosResumoCarrinho($idCarrinho);
//$produtos = json_decode($_GET['produtos']);

foreach ($produtos as $produto) {
    echo '
        <tr>
            <td>' . $produto["nome"] . '</td>
            <td>' . $produto["quantidade"] . '</td>
            <td>R$ '.number_format($produto["preco"],2,',','.').'</td>
        </tr>
    ';
}