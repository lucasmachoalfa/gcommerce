<?php

require_once 'model/produtoDao.php';

$idCarrinho = (!isset($_GET['carrinho'])) ? 8 : $_GET['carrinho'];

$produtos = $objProdutoDao->listaProdutosResumoCarrinho($idCarrinho);
//$produtos = json_decode($_GET['produtos']);
$total = 0;

echo '
<table class="tabela">
    <thead>
        <tr style="font-weight: bold; font-style: normal;">
            <td>Itens do pedido</td>
            <td>Qtde</td>
            <td>Preço</td>
        </tr>
    </thead>
    <tbody>

';
foreach ($produtos as $produto) {
    $total += $produto["preco"];

    echo '
        <tr>
            <td>' . $produto["nome"] . '</td>
            <td>' . $produto["quantidade"] . '</td>
            <td>R$ ' . number_format($produto["preco"], 2, ',', '.') . '</td>
        </tr>
    ';
}

echo '
        </tbody>
    </table>
    <div class="i-resumo-pedido" style="display: none">
        Frete <span id="resumoFrete">Grátis</span>
    </div>

    <div class="i-resumo-pedido">
        <strong><p>TOTAL <span>R$ ' . number_format($total, 2, ',', '.') . '</span></p></strong>
    </div>
';
